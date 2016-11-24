<?php

// een voorbeeld van een toewijzing van een associatieve array.
$tennisteam=array( "captain"=>"jan", "speler1"=>"jan","speler2"=>"piet","speler3"=>"klaas");

// een super handig debug commando dat precies kan laten zien hoe een array er uit ziet is: print_r().
// Je kunt dit bijvoorbeeld goed toepassen om te kijken wat nu precies met $_POST of $_REQUEST meekomt. 
// Gebruik dan deze code:

print "<pre>";# de <pre> tag is puur kosmetisch. Als je hem weglaat werkt het ook, maar MET de pre tag is het overzichtelijker.
print_r($tennisteam);
print "</pre>";

?>
