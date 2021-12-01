<?php
//DB Connection
require_once('db.php');

//Creating a table
$sql = "SELECT * FROM `bug`";

//stmt = statement
//prepare the data definition query
$stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));

//Execute the prepared statement
mysqli_stmt_execute($stmt) or die('<br>message');

//Bind the STMT results(sql statement) to variables
mysqli_stmt_bind_result($stmt, $ID, $productName, $version, $hardwareType, $OS, $frequency, $solution);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug overview</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Version</th>
                <th>Hardware Type</th>
                <th>OS</th>
                <th>Frequency</th>
                <th>Solution</th>
                <th>Edit link</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Loop and fetich the results
            while (mysqli_stmt_fetch($stmt)) {
            ?>
                <tr>
                    <form method="POST" action="edit.php">
                        <?php
                        echo '<td>' . $productName . '</td>';
                        echo '<td>' . $version . '</td>';
                        echo '<td>' . $hardwareType . '</td>';
                        echo '<td>' . $OS . '</td>';
                        echo '<td>' . $frequency . '</td>';
                        echo '<td>' . $solution . '</td>';
                        echo '<input type="hidden" name="id" value="' . $ID . '">';
                        echo '<td><a><input type="submit" name="submit" value="Edit"></a></td>';
                        ?>
                    </form>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <a href="add.php">Add bug</a>
</body>

</html>

<?php
//Close the statement
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>