<?php

$handle = fopen("test.csv", "r");
// optie 'r' = lezen
// andere opties: w = write, schrijf naar file
// a = append, voeg toe aanfile
print "<pre>";
while ($data = fgetcsv($handle, 1000, ";")) {
	print_r($data);
}
print "</pre>";




?>
