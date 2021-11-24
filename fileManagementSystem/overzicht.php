<?php
$error = '';

/**
 * Function getImage
 * @param $type - selected file type
 * @return return Return all images of sort selected
 */
function getImage($type)
{
    //Declaring variables
    $dir = "upload";

    $dirOpen = opendir($dir);

    //Loop directory, to read files
    while (($file = readdir($dirOpen)) !== false) {
        //Removing three dots
        if (is_dir($file)) {
            continue;
        }

        //If type matches file extension, show these files
        if (fnmatch('*.' . $type, $file)) {

            //Echo picture, picture name and delete button
            echo "
            <div>
                <img style='width:200px;' src='" . $dir . "/" . $file . "'><br>
                $file<br>

                <form action='" . htmlentities($_SERVER['PHP_SELF']) . "' method='post'>
                    <input type='hidden' name='imageName' value='" . $file  . "'>
                    <input type='submit' name='delete' value='Verwijderen'>
                </form>
            </div><br>
            ";
        }
    }
    closedir($dirOpen);
}

//If GET submit getImage
if (isset($_GET['getImage'])) {
    //Check if uploaded fileType is in array
    $supportedFileTypes = array('png', 'jpg', 'jpeg', 'gif');
    foreach ($supportedFileTypes as $subarray) {

        if (!in_array(htmlentities($_GET['fileType']), $supportedFileTypes)) {
            echo "<strong style='color:red;'>Er is gemanipuleerd met het bestandstype!</strong>";
            exit;
        }
    }

    getImage(htmlentities($_GET['fileType']));
}

//If POST submit delete
if (isset($_POST['delete'])) {
    if (unlink('upload/' . htmlentities($_POST['imageName']))) {
        echo 'Foto verwijderd!';
    } else {
        $error = 'Foto niet gevonden';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestandsoverzicht</title>
</head>

<body>
    <?php
    echo $error;
    ?>
    <nav>
        <ul>
            <li>
                <a href="index.php">Homepagina</a>
            </li>

            <li>
                <a style="color: green; font-weight:bold;" href="overzicht.php">Overzicht</a>
            </li>
        </ul>
    </nav>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="get">
        <div style="margin: 1%;">
            <label for="fileType">Kies een bestandstype:</label>
            <select name="fileType" id="fileType">
                <option value="png">png</option>
                <option value="jpg">jpg</option>
                <option value="jpeg">jpeg</option>
                <option value="gif">gif</option>
            </select>
        </div>

        <div style="margin: 1%;">
            <input type="submit" name="getImage" value="Haal foto's op">
        </div>
    </form>

    <form action="" method="post">


    </form>
</body>

</html>