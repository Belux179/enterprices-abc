<?php
$jsonencoded = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$fh = fopen("asd.json", 'w');
fwrite($fh, $jsonencoded);
fclose($fh);
?>