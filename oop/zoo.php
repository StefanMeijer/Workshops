<?php
require_once('animal_class.php');

$animals = array(
    new animal("veren", "4", "rood", "aggresief", "gevangenis", "bie baa boo")
);

function animalSoundPrinter($animals)
{
    foreach($animals as $animal) {
        echo $animal->animalSound();
    }
}
animalSoundPrinter($animals);
