<!DOCTYPE html>
<html lang="en" id="main_page">
<head>
    <title>Pendulum Rankings</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        <?php include 'style.css'; ?>
        <?php include 'style_submit.css'; ?>
    </style>
</head>

<body>
<!-- hold your colour -->
<iframe class="spotify_embed" src="https://open.spotify.com/embed/album/4FAfNNU21dqtKKhHWB2eOa" frameborder="0" allowtransparency="true"></iframe>
<!-- in silico -->
<iframe class="spotify_embed" src="https://open.spotify.com/embed/album/6eRDE48ttoLqN2VfkEpPOJ" frameborder="0" allowtransparency="true"></iframe>
<!-- immersion -->
<iframe class="spotify_embed" src="https://open.spotify.com/embed/album/3XtEGVx9uh7J46nBzEc1VS" frameborder="0" allowtransparency="true"></iframe>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
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