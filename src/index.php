<?php
$configs = include('config.php');
?>

<?php
    // gebruik var_dup(arg) om php te debuggen
?>

<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        <?php include 'css/style.css'; ?>
    </style>
</head>

<body>
<div id="main_text_container">
    <h1 class="main_title title">Pendulum Rankings</h1>
    <h3 class="sub_title title"><a href="submit.php">Rank</a> your favourite Pendulum songs<br> and see what <a href="rankings.php">others think!</a></h3>
    <h3 class="sub_title title" id="main_about"><a href="about.php">About</a></h3>
</div>
</body>
</html>