<?php
//DB Connection
require_once('db.php');

if (isset($_POST['id'])) {
    //Define variables
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

    //Define query
    $query = "SELECT * FROM bug WHERE ID = $id";

    //prepare the data definition query
    $stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));

    //Execute the prepared statement
    mysqli_stmt_execute($stmt) or die('<br>message');

    //Bind the STMT results(sql statement) to variables
    mysqli_stmt_bind_result($stmt, $ID, $productName, $version, $hardwareType, $OS, $frequency, $solution);
}

if (isset($_POST['change'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_SPECIAL_CHARS);
    $version = filter_input(INPUT_POST, 'version', FILTER_SANITIZE_SPECIAL_CHARS);
    $hardware = filter_input(INPUT_POST, 'hardware', FILTER_SANITIZE_SPECIAL_CHARS);
    $os = filter_input(INPUT_POST, 'os', FILTER_SANITIZE_SPECIAL_CHARS);
    $frequency = filter_input(INPUT_POST, 'frequency', FILTER_SANITIZE_SPECIAL_CHARS);
    $solution = filter_input(INPUT_POST, 'solution', FILTER_SANITIZE_SPECIAL_CHARS);

    //Check if fields are empty
    if (!empty($id)) {
        if (!empty($product)) {
            if (!empty($version)) {
                if (filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT)) {
                    if (!empty($hardware)) {
                        if (!empty($os)) {
                            if (!empty($frequency)) {
                                if (!empty($solution)) {
                                    //Close open stmt
                                    mysqli_stmt_close($stmt);

                                    //Define query
                                    $query = "UPDATE bug SET product_name=?, version=?, hardware_type=?, os=?, frequency=?, solution=? WHERE ID=?";

                                    //prepare the data definition query
                                    $stmt = mysqli_prepare($conn, $query) or die('prepared goes wrong');

                                    //Bind the STMT parms(sql statement) to variables
                                    mysqli_stmt_bind_param($stmt, "sssssss", $product, $version, $hardware, $os, $frequency, $solution, $id) or die('Binding went wrong');

                                    //Execute the prepared statement
                                    mysqli_stmt_execute($stmt) or die('Execute went wrong');

                                    //Close the statement
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($conn);

                                    //Echo succes and die
                                    echo '<a href="index.php">Go back</a><br>';
                                    die('Record updated');
                                } else {
                                    echo '<a href="index.php">Go back</a><br>';
                                    die('Solution may not be empty');
                                }
                            } else {
                                echo '<a href="index.php">Go back</a><br>';
                                die('Frequency may not be empty');
                            }
                        } else {
                            echo '<a href="index.php">Go back</a><br>';
                            die('OS may not be empty');
                        }
                    } else {
                        echo '<a href="index.php">Go back</a><br>';
                        die('Hardware may not be empty');
                    }
                } else {
                    echo '<a href="index.php">Go back</a><br>';
                    die('Version must be a float or double. Example: 1 / 1.0');
                }
            } else {
                echo '<a href="index.php">Go back</a><br>';
                die('Version may not be empty');
            }
        } else {
            echo '<a href="index.php">Go back</a><br>';
            die('Product may not be empty');
        }
    } else {
        echo '<a href="index.php">Go back</a><br>';
        die('ID may not be empty');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit bug</title>
</head>

<body>
    <h1>Add new bug</h1>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <?php
        if (isset($_POST['id'])) {
            while (mysqli_stmt_fetch($stmt)) {
        ?>
                <input type="text" value="<?php echo $productName ?>" name="product">Product<br>
                <input style=" margin-top:1%" value="<?php echo $version ?>" type="text" name="version">Version<br>
                <input style=" margin-top:1%" value="<?php echo $hardwareType ?>" type="text" name="hardware">Hardware<br>
                <input style=" margin-top:1%" value="<?php echo $OS ?>" type="text" name="os">OS<br>
                <input style=" margin-top:1%" value="<?php echo $frequency ?>" type="text" name="frequency">Frequency<br>
                <input style=" margin-top:1%" value="<?php echo $solution ?>" type="text" name="solution">Solution<br>
                <input type="hidden" name="id" value="<?php echo $ID ?>">
                <input type="submit" name="change" value="edit">
        <?php }
        }
        ?>
    </form>
    <a href="index.php">Go back</a>
</body>

</html>