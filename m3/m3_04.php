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
  <div class="form-group mt-4">
    <div class="d-block">
      <label class="mb-4 ml-4">[ 投稿フォーム ]</label>
    </div>
      <label class="ml-4">お名前:</label>
    
    <input type="name" class=" mb-4"  placeholder="お名前" name="your_name">
 
    <div class="d-block">
     <label class="ml-4">コメント:</label>
    </div>
    <textarea class="form-control mb-2 ml-4"  rows="3" name="comment"></textarea>
  
    <button class="btn btn-primary mt-4 ml-4" type="submit">送信ボタン</button>
  </div>
  
  <div class="d-block ">
    <div class="d-block">
      <label class="m-4">[ 削除フォーム ]</label>
    </div>
    <label class="ml-4">削除対象番号:</label>
    <input type="number" class="" name = "delete" placeholder="削除対象番号">
    <div class="d-block">
      <label class="ml-4 mt-4">パスワード:</label>
      <input type="number" class="" name = "delete" placeholder="削除対象番号">
    </div>
  <div class="d-block mt-4">
    <input type="submit" class="btn btn-danger ml-4" name="submit" value = "削除">
  </div>
  </div>

  </form>

  <form action="" method="POST">
    <div class="d-block">
      <label class="m-4">[ 編集フォーム ]</label>
    </div>
  <input type="hidden" name="edit_post" value="">
  <div class="d-block">
    <label class="ml-4">編集対象番号:</label>
    <input type="number" placeholder="編集対象番号" class="">
    <div class="d-block">
      <label class="ml-4 mt-4">パスワード:</label>
      <input type="number" class="" name = "delete" placeholder="削除対象番号">
    </div>
  </div>
  <input type="submit" class="btn btn-success mt-4 ml-4" name="edit" value = "編集">
  </div>
  </form>
   
  <div>
    <p class="ml-4 mt-4">---------------------------------------------</p>
    <p class="ml-4">[ 投稿一覧 ]</p>
  </div>

 

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
        $newdate = $num."<>".$name."<>".$comment."<>".$date;
        $fp = fopen($filename, "a");
        fwrite($fp,$newdate.PHP_EOL);
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
          file_put_contents($filename, implode("\n", $delCon));
        }
      }
    }

    // ファイルからデータ読み取り
	$filename = "m3_01.txt";
	// オプションのパラメータの意味は
	// https://www.php.net/manual/ja/function.file.php
	$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	
	// 編集用データ格納変数
	$editNumber = '';
	$editName = '';
	$editComment = '';

	// 送信内容によって処理が分かれる
	if(isset($_POST["edit"])) {
		// ここは編集番号よりデータを求める所
		
		// データ件数分処理
		foreach($lines as $row) {
			// <>で分割して配列に
			$bbsRowData = explode("<>", $row);
			// 編集対象番号のときはデータをセットする
			if($bbsRowData[0] == $_POST["num"]) {
				$editNumber = $bbsRowData[0];
				$editName = $bbsRowData[1];
				$editComment = $bbsRowData[2];
				// 即抜ける
				break;
			}
		}
	}
	else if(isset($_POST["normal"])) {
		// 書き込みか上書きかをするところ
		
		// 書き込むデータを作る
		$writeData = ($_POST['edit_post'] ?: count($lines) + 1) . "<>" . $_POST['name'] . "<>" . $_POST['comment'];
		
		// 編集番号があればデータループして場所を特定して上書きする
		if($_POST["edit_post"]) {
			// データ件数分処理(&で参照にしてる)
			foreach($lines as &$row) {
				// <>で分割して配列に
				$bbsRowData = explode("<>", $row);
				// 編集番号のところだったら上書き
				if($bbsRowData[0] == $_POST["edit_post"]) {
					$row = $writeData;
				}
			}
		}
		else {
			// 新規投稿なので最後に追加
			$lines[] = $writeData;
		}
		
		// ファイルに書き込む(implodeで配列を改行付き文字列へ)
		file_put_contents($filename, implode("", $lines));
	}


  ?>
   
    
  </body>
</html>