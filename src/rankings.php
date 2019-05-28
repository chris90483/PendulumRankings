<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        <?php include 'css/style.css'; ?>
        <?php include 'css/style_list.css' ?>
    </style>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script><?php include "scripts/rankings.js" ?></script>
</head>

<body>
<?php include "nav.html";
//    mysqli_report(MYSQLI_REPORT_ALL);

    $mysqli = new mysqli('localhost', 'root', 'koffieislekker', 'PendulumRankingsDB');

    $query = "SELECT * FROM songs ORDER BY average_rank";

    $result = $mysqli->query($query);
?>

<div id="table_container">
<table id="song_list" class="w3-table w3-bordered w3-centered">
    <thead>
        <tr>
            <th class="song_rank">Rank</th>
            <th class="song_title">Title</th>
            <th class="avg_rank">Average Rank</th>
            <th class="song_listen">Listen</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
         foreach($result as $item) {
            ?>
        <tr class="song_entry">
            <td class="song_rank"><?php echo $i ?></td>
            <td class="song_title"><?php echo $item['name'] ?></td>
            <td class="avg_rank"><?php echo $item['average_rank'] ?></td>
            <td class="song_listen"><button onclick="changeAudio(<?php echo $item['id'] ?>)">&lt;click&gt;</button></audio></td>
            <?php
         $i++;
         } ?>
</tr>
</tbody>
</table>
</div>
</body>
</html>