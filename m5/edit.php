<?php require ('db_connect.php'); ?>

<h2>【編集フォーム】</h2>
        <form action="" method="post">
            <dl>
                <dt>編集番号</dt>
                <dd><input type="number" name="edit_num" placeholder="Edit Number"></dd>
                <dt>パスワード</dt>
                <dd><input type="password" name="pass_edit" placeholder="Password"></dd>
            </dl>
            <input type="submit" name="edit" value="編集">
        </form>