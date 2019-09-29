<?php
$configs = include('config.php');
?>

<?php
$mysqli = new mysqli($configs['dbhost'], $configs['dbuser'], $configs['dbpassword'], $configs['dbname']);
$songs = json_decode(fread(fopen("../songs.json", "r"), filesize("../songs.json")));
$avg_ranks = [];

foreach (range(1, 39) as $i) {
    $rank_sum = 0;
    $rank_query = "SELECT `rank` FROM votes_song_" . $i . ";";
    $results = $mysqli->query($rank_query);

    foreach ($results as $row) {
        $rank_sum += (int)$row['rank'];
    }
    if (mysqli_num_rows($results) == 0) {
        array_push($avg_ranks, 999);
    } else {
        array_push($avg_ranks, ($rank_sum / mysqli_num_rows($results)));
    }
}

foreach (range(1, 39) as $i) {
    $statement = "UPDATE `songs` SET average_rank = " . $avg_ranks[$i - 1] . " WHERE id = $i";
    $mysqli->query($statement);
}