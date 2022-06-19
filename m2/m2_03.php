<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <form action="" method="post">
    <input type="text" name="comment">
    好きな文字を入力してください
    <input type="submit" name="submit">
  </form>

  <?php
  if (!empty($comment)) {  
    $comment = $_POST["comment"];
    $filename="mission_2-3.txt";
    $fp = fopen($filename,"åa");
    fwrite($fp, $comment . PHP_EOL);
    fclose($fp);
    
   
  }

  ?>
</body>
</html>

