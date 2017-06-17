<?php

$hash = password_hash('test', PASSWORD_DEFAULT);
$hash2 = crypt('test')';
'
print "test = $hash <br>";
print "test = $hash2";

?>
/* 
*94BDCEBE19083CE2A1F959FD02F964C
*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29
(7 rijen) volledig resultaat
*/