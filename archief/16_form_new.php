<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>Nieuwe Input elementen HTML 5</h2>

<p>HTML 5 heeft een aantal nieuwe input elementen toegevoegd aan de al bestaande (zoals 'type="text", type="password" enz.). Deze nieuwe input elementen helpen vooral om de mogelijke invoer van te voren te sturen. Dus: dat er als cijfers gevraagd worden geen letters meer kunnen worden ingevoerd. Of, dat de vorm waarin een datum wordt ingevoerd via de interface zelf al vast gelegd wordt.</p>
<p>Dit zijn de nieuwe input elementen:
<ul>
	<li>&lt;input type="number" name="leeftijd" min=0 max=120&gt;  - voor het beperken van invoer tot nummers tussen min en max</li>
	<li>&lt;input type="date" name="geboortedag"&gt;  - voor het beperken van invoer tot een datum</li>
	<li>&lt;input type="color" name="kleur"&gt;  - voor het kiezen van een kleur</li>
	<li>&lt;input type="range" name="cijfer" min="0" max="10"&gt;  - voor het beperken van invoer tot cijfers uit een range</li>
	<li>&lt;input type="email" name="email"&gt;  - voor het beperken van invoer tot een email adres</li>
	<li>&lt;input type="url" name="url"&gt;  - voor het beperken van invoer tot weblocatie</li>
</ul>
In het voorbeeld hieronder zie je hoe deze input elementen hun waarde teruggeven, daarvoor zorgt de print_r opdracht bovenin de code.</p>
<p>Daarnaast zijn er een aantal formulier elementen toegevoegd. Bijvoorbeeld &lt;datalist&gt;. Hiermee kun je de invoer in een text veld beperken tot de waarden die je in de lijst opneemt. Als in de lijst bijvoorbeeld "Amsterdam", "Rotterdam" en "Den Haag" staan, kun je alleen die invullen.
	</p>
<?php
toon_file("v16_form_new.php");
?>

<?php
include "voet.php";

?>