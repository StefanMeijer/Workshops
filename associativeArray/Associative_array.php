<?php
/*
 * Different array types:
 *
 * 1. Numeric array|                $array = array('array', 'example');
 * 2. Associative array|            $array = array('first' => 'array', 'second' => 'example');
 * 3. Multidimensional array|       $array = array('first' => array('key' => 'element', 'array'=>'example));
 *
 */

$numeric = array('array', 'example');

//uncomment the following block to see structure of the numeric array
/*
 * echo "<pre>";
 * var_dump($numeric);
 * echo "</pre>";
 * exit;
 */

$associative = array('first' => 'array', 'second'=> 'example', 'third'=> 'associative');

//uncomment the following block to see structure of the associative array
/*
 * echo "<pre>";
 * var_dump($associative);
 * echo "</pre>";
 * exit;
 */

$multi = array(
    'BMW'=>array('color'=>'blue','plate'=>'AB-CD-78', 'origin'=>'German'),
    'Fiat'=>array('color'=>'red', 'plate'=>'FH-MA-41', 'origin'=>'Italian'),
    'Skoda'=>array('color'=>'silver', 'plate'=>'XC-42-SF', 'origin'=>'Czech'));

//uncomment the following block to see structure of the multidimensional array
/*
 * echo "<pre>";
 * var_dump($multi);
 * echo "</pre>";
 * exit;
 */

//Calling a single element
/*
 * Calling a single element in a numeric array is done by placing the
 * index number between square brackets after the variable
 */

echo $numeric[0];
echo "<br><br>";

/*
 * Calling a single element in an associative array is done by placing the
 * key between square brackets after the variable
 */

echo $associative["second"];
echo "<br><br>";

/*
 * Calling a single element in a multidimensional array needs you to place a
 * key between brackets for every level deep the array is
 */

echo $multi["Fiat"]["origin"];
echo "<br><br>";

//Looping

/*
 * Numeric loop
 * Index numbers can be accessed by making the key accessible in the foreach loop.
 * In the following example $index is placed at the key position,
 * we can now echo the $index to see the index number.
 *
 * Feel free to expand the array to see the result.
 */

foreach($numeric as $index => $value)
{
    echo $index . " points towards the value <b>". $value . "</b><br>";
}

/*
 * Associative loop
 * In the same way as making the index accessible for the code, we can make the
 * keys of an associative array accessible as well.
 *
 * The key can be used to provide more information or to use as the base
 * for a conditional statement.
 *
 * Feel free to expand the array to see the result.
 */
foreach($associative as $key => $value)
{
    echo "The key of ". $key . " has the value <b>". $value . "</b> assigned to it<br>";

   if($key === "third")
   {
       echo "This is an ".$value." array.<br>";
   }

}

/*
 * Multidimensional loop
 * Since the values that are assigned to the keys of the
 * outer array are arrays themselves, we are unable to echo them.
 *
 * The keys however are still strings, so we are able to echo those.
 *
 * To access the keys and values of the inner arrays, we can take 1 step
 * deeper by placing another foreach loop inside.
 *
 * Feel free to expand the array to see the result.
 */

foreach($multi as $key => $array)
{
    echo "This key which contains the automobile brand ". $key .
        " has the following information assigned to it in the form of an array:<br>";

    foreach($array as $innerkey => $value)
    {
        echo "The ". $innerkey . " of the car is ". $value. "<br>";
    }
}