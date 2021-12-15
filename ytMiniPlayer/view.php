<?php
require_once('dbconnect.php');

if (isset($_GET['code'])) {
    //SQL Query for selecting all users where an email is in DB
    $query = "SELECT * FROM video WHERE playbackId = ?";

    //Prpeparing SQL Query with database connection
    $stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));

    //Bind params
    mysqli_stmt_bind_param($stmt, "s", $_GET['code']) or die('niet goed');

    //Executing statement
    mysqli_stmt_execute($stmt) or die('<br>message');

    //Bind the STMT results(sql statement) to variables
    mysqli_stmt_bind_result($stmt, $ID, $artist, $title);

    //Fetch STMT data
    while (mysqli_stmt_fetch($stmt)) {
    }

    //Check if no result has been found
    if (mysqli_stmt_num_rows($stmt) == 0) {
        header('location: index.php');
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <a href="index.php">Ga terug</a><br>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_GET['code'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Title: <?php echo $title ?></h3>
    <p>Artist: <?php echo $artist ?></p>
</body>

</html>