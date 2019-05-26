<?php ?>

<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
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

    foreach($result as $item) {
        echo "<h1 style=\"color: white;\">" . $item['name'] . " -- " . $item['album'] . " -- " . $item['average_rank'] . "</h1>";
    }

?>
</body>
</html>