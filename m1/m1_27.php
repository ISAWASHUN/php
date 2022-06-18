<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
 
  
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="num">好きな数字を入力してください。
    <input type="submit" name="submit">
  </form>
  <?php
    $num = $_POST['num'];
    $filename="m1_27.txt";
    $fp = fopen($filename,"a");
    fwrite($fp, $num.PHP_EOL);
    fclose($fp);
    echo "書き込み成功！<br>";
    
    if(file_exists($filename)){
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            echo $line . "<br>";
        }
    }
    
    if($num % 3 == 0 && $num % 5 == 0){
      echo "FizzBuzz";
    }elseif($num % 3 == 0){
      echo "Fizz";
    }elseif($num % 5 == 0){
      echo "Buzz";
    }else{
      echo "$num";
    }
  ?>
</body>
</html>