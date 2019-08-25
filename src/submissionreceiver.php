<?php
$mysqli = new mysqli('localhost', 'root', 'koffieislekker', 'PendulumRankingsDB');
$songs = json_decode(fread(fopen("../songs.json", "r"), filesize("../songs.json")));


function getIdByName($name) {
    global $songs;
    $name = str_replace("%20", " ", $name);
    foreach ($songs->songs as $song) {
        if ($song->name == $name) {
            return $song->id;
        }
    }
    return null;
}

$submission = $_REQUEST["submission"];

$rankings = explode(";", $submission);
$debugfile = fopen("debug.txt", "w");
$statement = "INSERT INTO votes (`ip_address`, `timestamp`) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "', NOW())";
//$statement = "INSERT INTO votes (ip_address, timestamp)\nVALUES(localhost, " . time();
if ($mysqli->query($statement) === TRUE) {
    fwrite($debugfile, "votes update succesful\n");
} else {
    fwrite($debugfile, "votes update failed: \n");
    fwrite($debugfile, $mysqli->error . "\n");
};

foreach ($rankings as $ranking) {
    $parts = explode("=", $ranking);
    if (count($parts) == 2) {
        $number = $parts[0];
        $title = $parts[1];
        $statement = "INSERT INTO votes_song_" . getIdByName($title) . " (`rank`, `vote`) VALUES ('" . $number . "', '" . $mysqli->insert_id . "')";
        $mysqli->query($statement);
        fwrite($debugfile, "inserted " . $title . " with rank " . $number . " in votes_song_" . getIdByName($title) . "\n");
    }
}
fclose($debugfile);

?>