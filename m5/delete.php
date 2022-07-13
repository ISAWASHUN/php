<?php require ('db_connect.php'); ?>

<h2>【削除フォーム】</h2>
        <form action="" method="post">
            <dl>
                <dt>削除番号</dt>
                <dd><input type="number" name="del_num" placeholder="Delete Number"></dd>
                <dt>パスワード</dt>
                <dd><input type="password" name="pass_del" placeholder="Password"></dd>
            </dl>
            <input type="submit" name="delete" value="削除">
        </form>