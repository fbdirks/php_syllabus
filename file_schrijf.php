<?php


$schrijfhandle = fopen("test.csv",'a');

$speler[0] = "Marcel";
$speler[1] = "verdediger";
$speler[2] = "18";

fputcsv($schrijfhandle, $speler,";");

fclose($schrijfhandle);
?>

