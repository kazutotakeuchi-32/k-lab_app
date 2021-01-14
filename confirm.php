<?php
  session_start();
  if ($_SESSION['page']!=2) {
    header("Location: index.php");
    return;
  }
  $errors = $_SESSION["errors"];
  $_SESSION["errors"]=array();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="asserts/stylesheets/style.css">
</head>
<body>
  <div class="confirm__box">
    <?php if(empty($errors)) :?>
      <h2> お問い合わせありがとうございました。</h2>
      <p>ご記入していただいた情報は無事に送信されました。</p>
      <p>確認のため、自動送信メールをお送りしております。</p>
    <?php else :?>
      <h2>メッセージの送信に失敗しました。</h2>
      <?php foreach ($errors as $error):?>
        <p><?echo $error ;?></p>
      <?php endforeach;?>
      <p>もう一度お試してください。</p>
    <?php endif;?>
    <a href="/">トップページに戻る</a>
  </div>

</body>
</html>
