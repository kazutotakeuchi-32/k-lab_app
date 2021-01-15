<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
function validation($user){
   $errors = [];
   $name  = $user['name'];
   $email = $user['email'];
   $message = $user['message'];
   if( empty($name) ) {
    $errors[] = "「氏名」は必ず入力してください。";
   }elseif(strlen($name)>30){
    $errors[] = "「氏名」は30文字以内で入力をしてください";
   }
   if (empty($email) ) {
    $errors[] = "メールアドレスは必ず入力してください。";
   }elseif(!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $email)){
    $errors[] = "正しい形式でメールアドレスを入力をしてください。";
   }
   if (empty($message)) {
    $errors[] = "お問い合わせ内容は必ず入力をしてください。";
   }
   return $errors;
}
function get_csrf_token() {
  $TOKEN_LENGTH = 16;
  $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
  return bin2hex($bytes);
}
function h($filed){
   return htmlspecialchars($filed,ENT_QUOTES,'UTF-8');
}
function send_notify($user){
  if (count($user)==0) {
    return false;
  }
  $token = getenv('LINE_NOTIFY_TOKEN');
  // リクエストヘッダの作成
  $message = "\n{$user['name']}様からお問い合わせがありました。\n\nお名前：{$user['name']}\nメールアドレス：{$user['email']}\nお問合わせ内容:{$user['message']}";
  $query = http_build_query(['message' => $message]);
  $header = [
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Bearer ' . $token,
          'Content-Length: ' . strlen($query)
  ];
  $ch = curl_init('https://notify-api.line.me/api/notify');
  $options = [
      CURLOPT_RETURNTRANSFER  => true,
      CURLOPT_POST            => true,
      CURLOPT_HTTPHEADER      => $header,
      CURLOPT_POSTFIELDS      => $query
  ];
  curl_setopt_array($ch, $options);
  $res = json_decode(curl_exec($ch),true);
  curl_close($ch);
  return $res ;
}

function send_mail($user){
  $mail = new PHPMailer(true);
  $name    =  $user['name'];
  $email   =  $user['email'];
  $message =  $user['message'];
  $time    =  date("Y年m月d日 H時i分");
  try {
    //Gmail 認証情報
    $host    = 'smtp.gmail.com';
    $username=getenv('USERNAME');
    $password=getenv('PASSWORD');
    //差出人
    $from = $username;
    $fromname =$username;
    //宛先
    $to = $email;
    $toname = '';
    //件名・本文
    $subject =  "{$name}様お問い合わせありがとうございます";
    $body = "※こちらのメールは自動送信になります。\n\n{$name}様この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\nお問い合わせ日時：{$time}\n氏名：{$name}\nメールアドレス：{$email}\nお問い合わせ内容：{$message}\n\nできる限り迅速な対応を致します。なお2~3日ほどお時間をいただく場合がありますので予めご了承ください。ご不明な点がありましたらお気軽にお問い合わせください。";
    //メール設定
    // $mail->SMTPDebug = 2; //デバッグ用
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->setFrom($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    //メール送信
    return $mail->send();

  } catch (Exception $e) {
    // echo '失敗: ', $mail->ErrorInfo;
  }

}
