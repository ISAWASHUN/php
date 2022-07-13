<?php
require ('db_connect.php');

$sql = "CREATE TABLE IF NOT EXISTS mission"
            ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
            . "name char(32),"
            . "comment TEXT,"
            . "pass TEXT"
            .");";
            $stmt = $pdo->query($sql);
            $error_name = "";
            $error_comment = "";
            $error_pass = "";
            $error_num = "";

            if(!empty($_POST["submit"])){
              $name = $_POST["name"];
              $comment = $_POST["comment"];
              $pass = $_POST["pass_new"];
              $edit_num = $_POST["edit_num"];
            }

            if(empty($edit_num)){
              $sql = $pdo -> prepare("INSERT INTO mission (name, comment, pass) VALUES (:name, :comment, :pass)");
              $sql -> bindParam(':name', $name, PDO::PARAM_STR);
              $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
              $sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
              $sql -> execute();
          }else{
              $id = $edit_num;
              $sql = 'UPDATE mission SET name=:name, comment=:comment, date=:date, pass=:pass WHERE id=:id';
              $stmt = $pdo -> prepare($sql);
              $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
              $stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
              $stmt -> bindParam(':pass', $pass, PDO::PARAM_STR);
              $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
              $stmt -> execute();
          }

          if(!empty($_POST["edit"])){
            $edit_num = $_POST["edit_num"];
            $pass = $_POST["pass_edit"];
            if(!empty($edit_num) && !empty($pass)){
                $id = $edit_num;
                $sql = 'SELECT * FROM mission WHERE id=:id';
                $stmt = $pdo -> prepare($sql);
                $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
                $stmt -> execute();
                $results = $stmt -> fetchAll();
                foreach($results as $row){
                    if($row["pass"] == $pass){
                        $edit_name = $row["name"];
                        $edit_comment = $row["comment"];
                        $edit_pass = $row["pass"];
                    }else{
                        $error_pass = "wrong";
                    }
                }                  
            }else{
                if(empty($edit_num)){
                    $error_num = "empty";
                }

                if(empty($pass)){
                    $error_pass = "empty";
                }
            }
        }else if(!empty($_POST["delete"])){
            $del_num = $_POST["del_num"];
            $pass = $_POST["pass_del"];

            if(!empty($del_num) && !empty($pass)){
                $id = $del_num;
                $sql = 'SELECT * FROM mission WHERE id=:id';
                $stmt = $pdo -> prepare($sql);
                $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
                $stmt -> execute();
                $results = $stmt -> fetchAll();
                foreach($results as $row){
                    if($row["pass"] == $pass){
                        $sql = 'DELETE from mission where id=:id';
                        $stmt = $pdo -> prepare($sql);
                        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt -> execute();
                    }else{
                        $error_pass = "wrong";
                    }
                }
            }else{
                if(empty($del_num)){
                    $error_num = "empty";
                }

                if(empty($pass)){
                    $error_pass = "empty";
                }
            }
        }




?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>mission05_01</title>
</head>
<body>
<?php require ('form.php'); ?>
<a href="form.php">投稿する</a>

<br>

<?php require ('delete.php'); ?>
<a href="delete.php">削除する</a>

<br>

<?php require ('edit.php'); ?>
<a href="edit.php">編集する</a>

<br>

<?php require ('timeline.php'); ?>
<a href="timeline.php">タイムラインへ</a>

</body>
</html>

