<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        <?php include 'style.css'; ?>
        .about_title {font-size: 175%;}
        .about_text {font-size: 125%;}
        /*@media only screen and (min-width: 812px) {*/
        /*    .about_title {font-size: 175%;}*/
        /*    .about_text {font-size: 125%;}*/
        /*}*/
        @media only screen and (min-width: 1280px) {
            .about_title {font-size: 200%;}
            .about_text {font-size: 150%;}
        }

    </style>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script><?php include "scripts/about.js" ?></script>
</head>


<body>
<?php include 'nav.html' ?>
<br><br><br>
    <h1 class="about_title main_title title">About</h1>
    <h3 class="about_text sub_title title">Welcome! This website was made to poll the popularity of each song produced by the band Pendulum.</h3>
    <h1 class="about_title main_title title">How?</h1>
    <h3 class="about_text sub_title title">You can <a href="submit.php">Submit</a> a list of your favourite Pendulum songs. Only the songs that you
    ranked will be submitted. The <a href="rankings.php">Rankings</a> page will show the average ranking
    of every song!</h3>
    <h1 class="about_title main_title title">Backend</h1>
    <h3 class="about_text sub_title title">Behind the scenes we use <a href="https://php.net/">PHP 7.2</a>,&nbsp;
        <a href="https://nodejs.org/en/">Node.js</a> and <a href="https://dev.mysql.com/">MySQL</a></h3>
    <h1 class="about_title main_title title">Frontend</h1>
    <h3 class="about_text sub_title title">The visuals were made with CSS and <a href="https://jquery.com/">JQuery</a>.
        Table ordering was made possible by <a href="https://sindu12jun.github.io/table-dragger/">
            table-dragger.</a>The font you are reading is Google's
        <a href="https://fonts.google.com/specimen/Orbitron?selection.family=Orbitron">
            Orbitron</a>.</h3>
</body>
</html>