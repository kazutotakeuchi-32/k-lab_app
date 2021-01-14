<?php

require_once "function.php";
session_start();
$errors=[];
if($_SESSION["csrf_token"]!=$_POST["csrf_token"]) {
  $errors[]="不正なリクエストです。";
  $_SESSION["errors"]=$errors;
  $_SESSION['page'] += 1;
  return header("Location: confirm.php");
}
$errors=validation($_POST);
if (empty($errors)) {
  if(!send_mail($_POST)) {
    $errors[]= "正しくメール送信することができませんでした。有効なメールアドレスを入力してください。";
  }
  send_notify($_POST);
  $_SESSION['errors']=$errors;
}else{
  $_SESSION['errors']=$errors;
}
$_SESSION['page'] += 1;
header("Location: confirm.php");

// if () {
//   # code...
// }
// バリデーション
// セッションハイジャック
// XCSR
// LINE Notify（通知）
// mail($email, $title, $content);
// $header ="From: kazuto320224@gmail.com";
// mail($email,$title,$content,$header);
// $to = "kazutotakeuchi32@gmail.com";
// $subject = "TEST";
// $message = "This is TEST.\r\nHow are you?";
// $headers = "From: kazuto320224@gmail.com";
// mb_language("Japanese");
// mb_internal_encoding("UTF-8");
// if(mb_send_mail($name, $title, $content)){
//   echo "メールを送信しました";
// } else {
//   echo "メールの送信に失敗しました";
// };
// // var_dump($_POST);
// exit;
