<?php

$spelers = array();
$spelers[] = "Maarten Stekelenburg"; 
$spelers[] = "Michel Vorm"; 
$spelers[] = "Sander Boschker"; 
$spelers[] = "Gregory Van der Wiel"; 
$spelers[] = "John Heitinga"; 
$spelers[] = "Joris Mathijsen"; 
$spelers[] = "Giovanni Van Bronckhorst"; 
$spelers[] = "André Ooijer"; 
$spelers[] = "Khalid Boulahrouz"; 
$spelers[] = "Edson Braafheid"; 
$spelers[] = "Mark Van Bommel"; 
$spelers[] = "Nigel De Jong"; 
$spelers[] = "Wesley Sneijder"; 
$spelers[] = "Rafael Van der Vaart"; 
$spelers[] = "Demy De Zeeuw"; 
$spelers[] = "Ibrahim Afellay"; 
$spelers[] = "Stijn Schaars"; 
$spelers[] = "Arjen Robben"; 
$spelers[] = "Robin Van Persie"; 
$spelers[] = "Dirk Kuyt"; 
$spelers[] = "Klaas-Jan Huntelaar"; 
$spelers[] = "Eljero Elia"; 
$spelers[] = "Ryan Babel"; 

$aantal = count($spelers);
print "Aantal waarden is:  $aantal<br />";


for ($i=0; $i<$aantal; $i++) {
	print "Rugnummer $i : $spelers[$i]<br>";
}

 
?> 
