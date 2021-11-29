<?php
$distances = array(
    "Berlin" => array(
        "Berlin" => 0,
        "Moscow" => 1607.99,
        "Paris" => 876.96,
        "Prague" => 280.34,
        "Rome" => 1181.67
    ),
    "Moscow" => array(
        "Berlin" => 1607.99,
        "Moscow" => 0,
        "Paris" => 2484.92,
        "Prague" => 1664.04,
        "Rome" => 2374.26
    ),
    "Paris" => array(
        "Berlin" => 876.96,
        "Moscow" => 641.31,
        "Paris" => 0,
        "Prague" => 885.38,
        "Rome" => 1105.76
    ),
    "Prague" => array(
        "Berlin" => 280.34,
        "Moscow" => 1664.04,
        "Paris" => 885.38,
        "Prague" => 0,
        "Rome" => 922
    ),
    "Rome" => array(
        "Berlin" => 1181.67,
        "Moscow" => 2374.26,
        "Paris" => 1105.76,
        "Prague" => 922,
        "Rome" => 0
    )
);

$startIndex = "Berlin";
$endIndex = "Berlin";
$kmToMiles = 0.62;
$miles = 0;

//If isset post
if (isset($_POST['submit'])) {
    //Input value
    $value1 = htmlentities($_POST['select1']);
    $value2 = htmlentities($_POST['select2']);

    //Set selected value's
    $startIndex = $value1;
    $endIndex = $value2;

    //Distance calculate
    $miles = $distances[$value1][$value2] / $kmToMiles;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays</title>
</head>

<body>
    <?php
    echo '<strong>Vorige poging:</strong><br>';
    echo 'Van: ' . $startIndex . '<br>';
    echo 'Naar: ' . $endIndex . '<br>';
    echo 'Aantal Miles: ' . $miles . '<br><br>';
    ?>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

        <select name="select1">
            <?php
            echo '<option value="' . $startIndex . '">' . $startIndex . '</option>';
            foreach ($distances as $key => $value) {
                if ($key != $startIndex) {
                    echo '<option value="' . $key . '">' . $key . '</option>';
                }
            } ?>
        </select>

        <select name="select2">
            <?php
            echo '<option value="' . $endIndex . '">' . $endIndex . '</option>';
            foreach ($distances as $key => $value) {
                if ($key != $endIndex) {
                    echo '<option value="' . $key . '">' . $key . '</option>';
                }
            } ?>
        </select>

        <input type="submit" name="submit" value="Versturen">
    </form>
</body>

</html>