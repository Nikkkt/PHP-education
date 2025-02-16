<?php

// 1
function isMultiple($divisible, $divisor)
{
    if ($divisible % $divisor == 0) return true;
    return false;
}

echo isMultiple(5,3) ? "True" : "False";
echo "</br>";
echo isMultiple(6,3) ? "True" : "False";
echo "</br></br>";

// 2
$firstNumber = 5;
$secondNumber = 6;

if ($firstNumber >= $secondNumber) echo $firstNumber ** 2;
else echo $secondNumber ** 2;
echo "</br></br>";

// 3
$month = 5;
$year = date("Y");

$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

echo "Month = $month </br> Days in the month: $days </br></br>";

// 4
$year = 2025;
echo "Year = $year </br>";
if (cal_days_in_month(CAL_GREGORIAN, 2, $year) == 29) echo "$year is leap-year </br></br>";
else echo "$year is not leap-year </br></br>";

// 5
$a = 9;
$b = 6;
if ($a % 3 == 0 && $b % 3 == 0) echo $a + $b . "</br></br>";
else {
    if ($b != 0) echo $a / $b . "</br></br>";
    else echo "Can not divide by 0 </br></br>";
}