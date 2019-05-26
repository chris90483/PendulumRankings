<?php

mysqli_report(MYSQLI_REPORT_ALL);

$json_string = file_get_contents('../songs.json');
$data = json_decode($json_string, true);

$mysqli = new mysqli('localhost', 'root', 'koffieislekker', 'PendulumRankingsDB');

$query = <<<SQL
INSERT INTO songs (id, link, album, name)
VALUES (?, ?, ?, ?)
SQL;

$stmt = $mysqli->prepare($query);

echo mysqli_stmt_error($stmt);

foreach ($data['songs'] as $key => $value) {
    $stmt->bind_param(
        'isss',
        $value['id'],
        $value['link'],
        $value['album'],
        $value['name']
    );

    $stmt->execute();
}

$stmt->close();
