<?php
$error = '';

/**
 * Function checkImage
 * @param $image - Uploaded file
 * @return return Return true for good or false for bad with error message
 */
function checkImage($image)
{
    //Define variables
    global $error;

    //Check if file is uploaded
    if (is_uploaded_file($image['tmp_name'])) {
        //Check if file is 3MB or less
        if ($image["size"] <= 3000000) {
            //The user may only upload .gif .jpg .jpeg .png files 
            $acceptedFileTypes = ["image/gif", "image/jpg", "image/jpeg", "image/png"];
            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $uploadedFileType = finfo_file($fileinfo, $image["tmp_name"]);
            //If the type is in the array, proceed
            if (in_array($uploadedFileType, $acceptedFileTypes)) {
                //If image error is NOT accured
                if ($image["error"] == 0) {
                    //If the filename is 50 or less characters long
                    if (strlen($image["name"]) <= 50) {
                        //If the filename is NOT all lowercase
                        if (!ctype_lower($image["name"])) {
                            //If the file does NOT exist in the uploadfoler
                            if (!file_exists("upload/" . $image["name"])) {
                                //Transfer the file from the temporary folder to the upload folder using the original upload name
                                if (move_uploaded_file($image["tmp_name"], "upload/" . $image["name"])) {
                                    return true;
                                } else {
                                    $error = 'Er ging iets fout met het upload. Probeer het opnieuw.';
                                    return false;
                                }
                            } else {
                                $error = 'Bestandsnaam: ' . $image["name"] . ' bestaat al. Upload een foto met een andere naam.';
                                return false;
                            }
                        } else {
                            $error = 'Bestandsnaam moet minimaal 1 hoofdletter bevatten. Upload een foto met 1 of meerdere hoofdletters.';
                            return false;
                        }
                    } else {
                        $error = 'Bestandsnaam is te lang. Upload een foto met 50 karakters of minder.';
                        return false;
                    }
                } else {
                    $error = 'Er is een fout opgetreden. Probeer een ander foto up te loaden.';
                    return false;
                }
            } else {
                $error = 'Bestandstype is niet correct. Upload een gif, jpg, jpeg of png.';
                return false;
            }
        } else {
            $error = 'Het bestand is te groot. Upload een foto van 3MB of minder.';
            return false;
        }
    } else {
        $error = 'Geen bestand geupload. Upload een foto.';
        return false;
    }
}

//If the user submitted
if (isset($_POST['sendImage'])) {
    if (checkImage($_FILES["photo"])) {
        echo "<h1 style='color:green;'>Bestand geupload!</h1>";
    } else {
        echo "<strong style='color:red;'>" . $error . "</strong>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management System</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a style="color: green; font-weight:bold;" href="index.php">Homepagina</a>
            </li>

            <li>
                <a href="overzicht.php">Overzicht</a>
            </li>
        </ul>
    </nav>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div style="margin: 1%;">
            <label style="display: block;" for="image">Upload jouw fototje!</label>
            <input type="file" name="photo" id="image">
        </div>
        <div style="margin: 1%;">
            <input type="submit" name="sendImage" value="Uploaden">
        </div>
    </form>
</body>

</html>