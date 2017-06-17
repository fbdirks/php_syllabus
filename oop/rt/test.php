<?php


$t =  Array("amsterdam"=> 100,"rotterdam"=> 200);
$t2 = Array("wenen"=> "aa");

print_r(array_keys($t));
print_r(array_keys($t2));


$s = array_keys($t2);

// let op de syntax van de array binnen de string!! NB
print "Is dit 'm? : {$s['0']} "; # ja dus.


?>
