<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="text">
    好きな文字を入力してください
    <input type="submit" name="submit">
  </form>
  <?php
    $comment = $_POST['comment'];
    if(isset($comment)){
      echo $comment . "を受け付けました。";
    }

  ?>
</body>
</html>