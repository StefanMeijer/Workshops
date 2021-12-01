<?php
//DB Connection
require_once('db.php');
$error = '';
if (isset($_POST['submit'])) {
    //Post value's
    $product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_SPECIAL_CHARS);
    $version = filter_input(INPUT_POST, 'version', FILTER_SANITIZE_SPECIAL_CHARS);
    $hardware = filter_input(INPUT_POST, 'hardware', FILTER_SANITIZE_SPECIAL_CHARS);
    $os = filter_input(INPUT_POST, 'os', FILTER_SANITIZE_SPECIAL_CHARS);
    $frequency = filter_input(INPUT_POST, 'frequency', FILTER_SANITIZE_SPECIAL_CHARS);
    $solution = filter_input(INPUT_POST, 'solution', FILTER_SANITIZE_SPECIAL_CHARS);

    //Check if fields are empty
    if (!empty($product)) {
        if (!empty($version)) {
            if (filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT)) {
                if (!empty($hardware)) {
                    if (!empty($os)) {
                        if (!empty($frequency)) {
                            if (!empty($solution)) {
                                $query = "INSERT INTO bug (product_name, version, hardware_type, os, frequency, solution) VALUES (?,?,?,?,?,?)";

                                $stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));

                                mysqli_stmt_bind_param($stmt, "ssssss", $product, $version, $hardware, $os, $frequency, $solution) or die('niet goed');

                                mysqli_stmt_execute($stmt) or die('<br>message');

                                //Close the statement
                                mysqli_stmt_close($stmt);
                                mysqli_close($conn);

                                //Echo succes and die
                                echo '<a href="index.php">Go back</a><br>';
                                die('Record created');
                            } else {
                                $error = 'Solution may not be empty';
                            }
                        } else {
                            $error = 'Frequency may not be empty';
                        }
                    } else {
                        $error = 'OS may not be empty';
                    }
                } else {
                    $error = 'Hardware may not be empty';
                }
            } else {
                $error = 'Version must be a float or double. Example: 1 / 1.0';
            }
        } else {
            $error = 'Version may not be empty';
        }
    } else {
        $error = 'Product may not be empty';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add bug</title>
</head>

<body>
    <h1>Add new bug</h1>
    <?php echo '<span style="color:red">' . $error . '</span>' ?>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="product">Product<br>
        <input style=" margin-top:1%" type="text" name="version">Version<br>
        <input style=" margin-top:1%" type="text" name="hardware">Hardware<br>
        <input style=" margin-top:1%" type="text" name="os">OS<br>
        <input style=" margin-top:1%" type="text" name="frequency">Frequency<br>
        <input style=" margin-top:1%" type="text" name="solution">Solution<br>
        <input type="submit" name="submit" value="submit">
    </form>
    <a href="index.php">Go back</a>
</body>

</html>