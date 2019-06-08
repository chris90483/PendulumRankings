<?php
// give the path to the mp3 file when requested
$songRequest = $_REQUEST["getSong"];
if (is_numeric($songRequest)) {
    echo "mp3s/" . $songRequest . ".mp3";
} else {
    echo "1337";
}
?>