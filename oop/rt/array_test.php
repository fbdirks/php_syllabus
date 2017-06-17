<?php
session_start();
session_unset();
$pn = 1;
$aan = 2;

$bestelregel = array($pn => $aan);

print_r($bestelregel);
print "<br>";
print "SESSION:";
$_SESSION[bestelregel]=$bestelregel;
print "<pre>";
print_r($_SESSION);
print "</pre>";
print "<br>";
$pn = 2;
$aan = 4;

$bestelregel += array($pn=>$aan);

print_r($bestelregel);
print "<br>";



$pn = 1;
$aan = 5;

if($bestelregel[$pn]) {
  print "product komt voor!";
  $bestelregel[$pn]=$aan;
} else {
  print "product komt niet voor!";
  $bestelregel += array($pn => $aan);
}

$_SESSION[bestelregel]=$bestelregel;

print_r($bestelregel);
print "<br>";
print "EN nu per product:<br>";
foreach ($_SESSION[bestelregel] as $nr=>$aan) {
  print "$nr -> $aan<br>";
}




?>