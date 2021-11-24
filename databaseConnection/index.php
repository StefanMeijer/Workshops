<?php
$conn = mysqli_connect('localhost', 'root', '', 'theDatabase');
if ($conn) {
    echo 'Connection OK';
}

//Creating a table
$sql = "INSERT INTO student VALUES (
    '100',
    'Blakeway',
    'Stewart'
)";

//stmt = statement
//prepare the data definition query
$stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));

//Execute the prepared statement
mysqli_stmt_execute($stmt) or die('<br>message');

//Close the statement
mysqli_stmt_close($stmt);
mysqli_close($conn);

//Give feedback to the user
echo('Student created');
?>