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

  <input type="number" name = "delete" placeholder="削除対象番号">
  <input type="submit" class="danger" name="submit" value = "削除">
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
        $newstring = $num."<>".$name."<>".$comment."<>".$date;
        $fp = fopen($filename, "a");
        fwrite($fp,$newstring.PHP_EOL);
        fclose($fp);
    }
    
    

    // 削除
      /*POST送信があったとき*/
    if (isset($_POST["delete"])) {
      /*変数に代入*/
      $delete = $_POST["delete"];
      /*ファイル全体を読み込んで配列に格納する*/
      $delCon = file("m3_01.txt");
      /*配列の要素数（＝行数）だけループさせる*/
      for ($j = 0; $j < count($delCon) ; $j++){
        /*区切り文字「<>」で分割して、投稿番号を取得*/
        $delData = explode("<>", $delCon[$j]);
        /*投稿番号と削除対象番号を比較。等しくない場合はファイルに追加書き込みを行う*/
        if ($delData[0] == $delete) {
          array_splice($delCon, $j, 1);
          file_put_contents($filename, implode("", $delCon));
        }
      }
    }


  ?>
   
    
  </body>
</html>