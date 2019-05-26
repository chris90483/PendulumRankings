<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        <?php include 'style.css'; ?>
        <?php include 'style_submit.css'; ?>
    </style>
    <script src="../node_modules/table-dragger/dist/table-dragger.min.js"></script>
    <script><?php include 'scripts/submit.js'; ?></script>
</head>

<body>

<h3 class="sub_title title">Back to the <a href="index.php">frontpage</a></h3>
<h3 class="sub_title title">Go to the <a href="rankings.php">rankings</a></h3>
<br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="table-container">
        <table>
        <tr>
            <td id="table_padder_left"></td>
            <td>
            <table id="song_list" class="w3-table w3-bordered w3-centered">
                <thead>
                    <tr>
                        <th class="song_rank">Rank</th>
                        <th class="song_title">Title</th>
                        <th class="song_listen">Listen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onmouseover="highlight(this)" onmouseout="restore(this)">
                        <td class="song_rank"><?php echo "1" ?></td>
                        <td class="song_title"><?php echo "Propane Nightmares" ?></td>
                        <td class="song_listen"><iframe src="https://open.spotify.com/embed/track/6tC2iHfUlzB2W4ntXXL2BH" width="250" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    </tr>
                    <tr onmouseover="highlight(this)" onmouseout="restore(this)">
                        <td class="song_rank"><?php echo "2" ?></td>
                        <td class="song_title"><?php echo "Hold Your Colour" ?></td>
                        <td class="song_listen"><iframe src="https://open.spotify.com/embed/track/2pZXlPFnqc1uqEKFE7SjwQ" width="250" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    </tr>
                    <tr onmouseover="highlight(this)" onmouseout="restore(this)">
                        <td class="song_rank">3</td>
                        <td class="song_title"><?php echo "Visions" ?></td>
                        <td class="song_listen"><iframe src="https://open.spotify.com/embed/track/7FD0CKDpCLiyt91NZqEhhf" width="250" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    </tr>
                </tbody>
            </table>
            </td>
            <td id="table_padder_right"></td>
        </tr>
        </table>
    </div>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
?>
</body>
</html>