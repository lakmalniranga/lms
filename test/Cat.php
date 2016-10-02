<?php
ini_set('display_errors', 'On');
require 'cat.Class.inc';

$obj = new Cat;
$obj2 = new Cat;

echo "var_dump </br>";
var_dump($obj);

echo "</br></br>";
echo "obj->color </br>";
echo $obj->color;

echo "</br></br>";
echo "obj->color = /'black/' </br>";
$obj->number_of_legs = 400;
$obj->color = 'black';


var_dump($obj);
echo "</br></br>";
var_dump($obj2);

echo "</br></br>";
echo $obj->myCat();
Cat::$place = 'Colombo';
echo "</br></br>";
echo $obj2->myCat();

echo "</br></br>";
Cat::$place = 'Colombo';
echo Cat::$place;
?>
