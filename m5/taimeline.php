<?php require ('db_connect.php'); ?>
<h2>【投稿一覧】</h2>
<?php
            $sql = 'SELECT * FROM mission';
            $stmt = $pdo->query($sql);
            $results = $stmt->fetchAll();
            foreach($results as $row){
                echo $row['id']. ' , ';
                echo $row['name']. ' , ';
                echo $row['comment']. ' , ';
            }
        ?>