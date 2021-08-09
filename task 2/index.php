<?php 

$first_50 = 3.50;
$next_100 = 4.00;
$above_100 = 6.50;

$units = 100;
$bill=0;

if($units <= 50) {
    $bill = $units * $first_50;
}
else if($units > 50 && $units <= 100) {
    $temp = 50 * $first_50;
    $remaining_units = $units - 50;
    $bill = $temp + ($remaining_units * $next_100);
}
else if($units > 100 ) {
    $temp = (50 * $first_50) + (100 * $next_100);
    $remaining_units = $units - 150;
    $bill = $temp + ($remaining_units * $above_100);
}

echo 'bill = '.$bill;
?>