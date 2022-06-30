    
            <?php
            // $name = "";
            // $message = "";
            $file = "mission3-5.txt";
            $date = date("Y/m/d H:i:s");
            // $lines = file($file,FILE_IGNORE_NEW_LINES);
            // $count_lines  = count($lines);
            
            // 削除ボタンを押したときの処理
            if(!empty($_POST["delete_sub"])){
                // 削除対象の番号を受け取る
                $delete = $_POST["delete"];
                // 削除欄のパスワードを受け取る
                $del_pass = $_POST["del_pass"];
                // ファイルを一行ずつ配列に格納する
                $d_lines = file($file,FILE_IGNORE_NEW_LINES);
                // ファイルを書き込みモードで開く
                $fp = fopen($file, "w");
                
                    for($i = 0; $i < count($d_lines); $i++){
                        $d_line = explode("<>", $d_lines[$i]);
                        
                        if(($d_line[0] != $delete)){
                            
                            // $d_linesを1行ずつ書き込む
                            fwrite($fp, $d_lines[$i].PHP_EOL);
                        }else if($d_line[0] == $delete && $d_line[4] != $del_pass){
                            // $d_linesを1行ずつ書き込む
                            fwrite($fp, $d_lines[$i].PHP_EOL);
                        }
                    }
                fclose($fp);
                
            // 送信ボタンを押したときの処理
            }else if (!empty($_POST['send'])){
                
                $name = $_POST["name"];
                $text = $_POST["form"];
                $pass = $_POST["pass"];
                $lines = file($file,FILE_IGNORE_NEW_LINES);
                
                // 編集ボタンを押した後送信ボタンの処理
                if(empty($_POST["ed_num"])){
                    if(file_exists($file)){
                        $lines = file($file,FILE_IGNORE_NEW_LINES);
                        $num = intval(end($lines)) + 1;
                    }else{
                        $num = 1;
                    }
                
                    $result = $num."<>".$name."<>".$text."<>".$date."<>".$pass;
                    $fp = fopen($file, "a");
                    fwrite($fp, $result.PHP_EOL);
                    fclose($fp);
                    }else{ //新規投稿の処理
                        $lines = file($file,FILE_IGNORE_NEW_LINES);
                        $fp = fopen($file, "w");
                        $ed_num = $_POST["ed_num"];
                        $name = $_POST["name"];
                        $text = $_POST["form"];
                        $pass = $_POST["pass"];
                    
                        for($i = 0; $i < count($lines); $i++){
                                $line = explode("<>", $lines[$i]);
                                
                                if($line[0] == $ed_num){ 
                                    fwrite($fp, "$ed_num<>$name<>$text<>$date<>$pass".PHP_EOL);
                                    
                                }else {
                                    // $linesを1行ずつ書き込む
                                    fwrite($fp, $lines[$i].PHP_EOL);
                                }
                        }
                }
                
            // 編集ボタンを押したときの処理
            }else if(!empty($_POST["edit_sub"])){
                $edit = $_POST["edit"];
                $ed_pass = $_POST["ed_pass"];
                $ed_lines = file($file,FILE_IGNORE_NEW_LINES);
                
                for($j = 0; $j < count($ed_lines); $j++){
                    $ed_line = explode("<>", $ed_lines[$j]);
                    
                    if($ed_line[0] == $edit && $ed_line[4] == $ed_pass){
                        $ed_name = $ed_line[1];
                        $ed_comment = $ed_line[2];
                        $ed_pass = $ed_line[4];
                    }
                }
            }
            
            ?>
  <!DOCTYPE html>  
    <html>
    <head>
        <title>mission3-5</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="form-group mt-4">
    <div class="d-block">
      <label class="mb-4 ml-4">[ 投稿フォーム ]</label>
    </div>
      <label class="ml-4">お名前:</label>
        <form action="" method="POST">
            <p><input type="text" name="name" placeholder="名前" value="<?php if(isset($ed_name)){echo $ed_name;} ?>"></p>
            <p><input type="text" name="form" placeholder="コメント" value="<?php if(isset($ed_comment)){echo $ed_comment;}?>"></p>
            <p><input type="password" name="pass" placeholder="パスワード" value="<?php if(isset($ed_pass)){echo $ed_pass;} ?>"></p>
            <p><input type="hidden" name = "ed_num" placeholder="編集対称番号" value="<?php if(isset($edit)){echo $edit;} ?>"></p>
            <p><input type="submit" name="send" value="送信する"></p>
        </form>
    </div>
        <form action="" method="POST">
            <p><input type="number" name="delete" placeholder="削除する投稿番号を入力"></p>
            <p><input type="password" name="del_pass" placeholder="パスワード"></p>
            <p><input type="submit" name="delete_sub" value="削除"></p>
        </form>
        <form action = "" method="POST">
            <p><input type= "number" name= "edit" placeholder = "編集対称番号"> </p>
            <p><input type="password" name="ed_pass" placeholder="パスワード"></p>
            <p><input type = "submit" name = "edit_sub" value = "編集"></p>
        </form>
    </body>
  </html>
    <?php
     $fp = fopen($file, "r");
     $show_lines = file($file,FILE_IGNORE_NEW_LINES);
     foreach($show_lines as $show_line){
        $show_result = explode("<>", $show_line);
        echo "$show_result[0] $show_result[1] $show_result[2] $show_result[3] <br>";
     }
    ?>