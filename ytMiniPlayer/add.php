<?php
require_once('dbconnect.php');
if (isset($_POST['submit'])) {
    if (isset($_POST['playback_id']) && isset($_POST['artist']) && isset($_POST['video_title'])) {

        $playback_id = filter_input(INPUT_POST, 'playback_id', FILTER_SANITIZE_SPECIAL_CHARS);
        $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_SPECIAL_CHARS);
        $title = filter_input(INPUT_POST, 'video_title', FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "INSERT INTO video(playbackId, artistname, songtitle) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "sss", $playback_id, $artist, $title) or die('niet goed');

        mysqli_stmt_execute($stmt) or die('<br>message');

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('location: index.php');
    } else {
        echo 'Formulier niet compleet';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <a href="index.php">Ga terug</a>
    <div>
        <form action="add.php" method="POST">
            <p>
                <label>Playback id: <input type="text" name="playback_id"></label>
            </p>
            <p>
                <label>Artist: <input type="text" name="artist"></label>
            </p>
            <p>
                <label>Video title: <input type="text" name="video_title"></label>
            </p>
            <p>
                <input type="submit" name="submit">
            </p>
        </form>
    </div>
</body>

</html>