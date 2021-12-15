<?php
require_once('dbconnect.php');

//SQL Query for selecting all users where an email is in DB
$query = "SELECT * FROM video";

//Prpeparing SQL Query with database connection
$stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));

//Executing statement
mysqli_stmt_execute($stmt) or die('<br>message');

//Bind the STMT results(sql statement) to variables
mysqli_stmt_bind_result($stmt, $ID, $artist, $title);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YT miniplayer</title>
</head>

<body>
    <a href="add.php">Voeg een video toe</a>
    <table>
        <thead>
            <tr>
                <th>Artist</th>
                <th>Title</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Fetch STMT data
            while (mysqli_stmt_fetch($stmt)) {
            ?>
                <tr>
                    <td><?php echo $artist ?></td>
                    <td><?php echo $title ?></td>
                    <td><a href="view.php?code=<?php echo $ID ?>">View</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>