<?php require ('db_connect.php'); ?>
<h2>【投稿フォーム】</h2>
        <form action="" method="post">
            <dl>
                <dt>名前</dt>
                <dd><input type="name" name="name" placeholder="Name" value="<?php if(!empty($edit_name)){echo $edit_name;} ?>"></dd>
                <dt>コメント</dt>
                <dd><input typw="text" name="comment" placeholder="Comment" value="<?php if(!empty($edit_comment)){echo $edit_comment;} ?>"></dd>
                <dt>パスワード</dt>
                <dd><input type="password" name="pass_new" placeholder="Password" value="<?php if(!empty($edit_pass)){echo $edit_pass;} ?>"></dd>
                <dd><input type="hidden" name="edit_num" value="<?php if(!empty($edit_num)){echo $edit_num;} ?>"></dd>
            <dl>
            <input type="submit" name="submit" value="送信">
        </form>
