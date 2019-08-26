<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        <?php include 'css/style.css'; ?>
        <?php include 'css/style_list.css'; ?>
    </style>
    <script src="node_modules/table-dragger/dist/table-dragger.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script><?php include 'scripts/submit.js'; ?></script>
</head>

<body>

<?php include 'nav.html';
$mysqli = new mysqli('localhost', 'root', 'koffieislekker', 'PendulumRankingsDB');

$query = "SELECT * FROM songs ORDER BY name";

$result = $mysqli->query($query);
?>
<br><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div id="table_container">
            <table id="song_list" class="w3-table w3-bordered w3-centered">
                <thead>
                    <tr>
                        <th class="song_rank">Rank</th>
                        <th class="song_title">Title</th>
                        <th class="song_listen">Listen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="unranked_divider" class="song_entry">
                        <td></td>
                        <td class="unranked_divider sub_title title"><b>Drag songs above this line to rank them</b></td>
                        <td></td>
                    </tr>
                    <?php $i = 1;
                    foreach($result as $item) {
                    ?>
                    <tr class="song_entry">
                        <td class="draggable song_rank" contenteditable="false">-</td>
                        <td class="draggable song_title"><?php echo $item['name'] ?></td>
                        <td class="song_listen"><div class="listen_button" onclick="changeAudio(<?php echo $item['id'] ?>)">♫</div></audio></td>
                        <?php
                        $i++;
                        } ?>
                </tbody>
            </table>
        </div>
    <br>
    <div id="submit" class="send_button sub_title title" onclick="showSubmit()">Submit</div>
    <p id="submission_msg" class="sub_title title"> Are you sure?</p>
    <div id="submit_confirm" class="send_button sub_title title" onclick="submit()">Yes</div>
    <div id="submit_deconfirm" class="send_button sub_title title" onclick="deconfirmSubmit()">No</div>
</form>
</body>
</html>