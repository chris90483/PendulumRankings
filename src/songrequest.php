<?php
// give an mp3 when requested
$songRequest = $_REQUEST["getSong"];
echo "mp3s/" . $songRequest . ".mp3";
?>