<?php
$filename = '/m3/m3_01.txt';
// ファイル読み込み
$content = file_get_contents($filename);
// 読み込んだデータを1行ずつ処理
$rows = explode("<>", $content);
foreach ($rows as $row) {
    echo $row.'<br>';
}
?>