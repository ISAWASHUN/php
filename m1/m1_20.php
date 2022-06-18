<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
 
  <title>Document</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="str">
    <input type="submit" name="submit">
  </form>
  <?php
    $str = $_POST["str"];
    echo $str;
  ?>
</body>
</html>