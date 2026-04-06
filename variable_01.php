<?php   

$name = 'Uthso';
$age = 22;
$isFather = false;
$salary = 1;

echo "Hello $name!<br>";
echo "You are $age years old!<br>";
echo "Are you a father? $isFather<br>";
echo "Your salary is {$salary} <br>";

echo gettype($name) . "<br>";
echo gettype($age) . "<br>";
echo gettype($isFather) . "<br>";
echo gettype($salary) . "<br>";

print_r($name);
echo "<br>";
var_dump($name);