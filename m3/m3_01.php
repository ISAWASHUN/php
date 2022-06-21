<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    
  </head>
  <body>

  <form action="" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">お名前</label>
    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="お名前" name="your_name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">コメント</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
  </div>

  <button class="btn btn-primary" type="submit">送信ボタン</button>

  </form>
 

  <?php
    $filename = "m3_01.txt";
    date_default_timezone_set('Asia/Tokyo');
    if(empty($_POST["comment"]) == False){
        $name = $_POST["your_name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");

        if (file_exists($filename)) {
          $num = count(file($filename))+1;
        } else {
            $num = 1;
        }
      

        $fp = fopen($filename, "a");
        fwrite($fp,$num.'<>'.$name.'<>'. $comment. '<>'. $date.PHP_EOL);
        fclose($fp);

      }



  ?>
   
    
  </body>
</html>