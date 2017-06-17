<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>15. Een voorbeeld formulier</h2>
<p>Hieronder zie je alle formulierelementen die HTML (4) kent. Als je op de knop versturen klikt <br />
	wordt een PHP script gestart dat rapporteert welke waarden door de gebruiker zijn ingevoerd.</p>
<form action="v15_forms.php" method="post">
	<table border="0">
		<tr>
			<td>Formulier</td>
			<td>&nbsp;</td>
			<td valign="middle"><i>&lt;form action="formulier_verwerking.php" method="post"&gt;</i></td>
		</tr>
		<tr>
			<td>Tekstveld:</td>
			<td><input type="text" ></td>
			<td><i>&lt;input type="text" name="textveld"&gt;</i></td>
		</tr>
		<tr>
			<td>Tekstgebied:</td>
			<td><textarea name="tekstgebied">Uw kasteelroman graag..</textarea></td>
			<td><i>&lt;textarea name="tekstgebied"&gt;Uw kasteelroman graag..&lt;/textarea&gt;</i></td>
		</tr>
		<tr>
		<td>Radiobutton:</td>
		<td><input type="radio" name="keuze" value="A">A<br /><input type="radio" name="keuze" value="B">B<br /></td>
		<td>
			<i>&lt;input type="radio" name="keuze" value="A"&gt;A<br />
			&lt;input type="radio" name="keuze" value="B"&gt;B</i>
		</td>
		</tr>
		<tr>
			<td>Vinkjeslijst:</td>
			<td>
				<input type="checkbox" name="vinkjes[]" value="een"> vinkje 1<br />
				<input type="checkbox" name="vinkjes[]" value="twee"> vinkje 2
			</td>
			<td><i>
				&lt;input type="checkbox" name="vinkjes[]" value="een"&gt; vinkje 1<br />
				&lt;input type="checkbox" name="vinkjes[]" value="twee"&gt; vinkje 2
			</i>
			</td>
		</tr>
		<tr>
			<td>Select:</td>
			<td>
				<select name="selectie">
					<option value="keuze1">keuze 1
					<option value="keuze2">keuze 2
					<option value="keuze3">keuze 3
				</select>
			</td>
			<td>
				<i>
					&lt;select name="selectie"&gt;<br />
						&lt;option value="keuze1"&gt;keuze 1<br />
						&lt;option value="keuze2"&gt;keuze 2<br />
						&lt;option value="keuze3"&gt;keuze 3<br />
					&lt;/select&gt;
				</i>
				</td>
		</tr>
		
		<tr>
			<td>List:</td>
			<td>
				<select multiple name="lijst[]">
					<option value="lijst1">keuze 1
					<option value="lijst2">keuze 2
					<option value="lijst3">keuze 3
				</select>
			</td>
			<td>
				<i>&lt;select name="lijst[]"&gt;<br />
						&lt;option value="lijst1"&gt;lijst 1<br />
						&lt;option value="lijst2"&gt;lijst 2<br />
						&lt;option value="lijst3"&gt;lijst 3<br />
					&lt;/select&gt;</i>
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="wachtwoord"></td>
			<td>
				<i>&lt;input type="password" name="wachtwoord"&gt;
				</i>
			</td>
		</tr>
		<tr>
			<td>Hidden:</td>
			<td><input type="hidden" name="verborgen" value="geheim"></td>
			<td>
				<i>&lt;input type="hidden" name="verborgen" value="geheim"&gt;</i>
			</td>
		</tr>
		<tr>
			<td>Bestandskeuze:</td>
			<td><input type="file" name="bestandsnaam"></td>
			<td>
				<i>&lt;input type="file" name="bestandsnaam"&gt;</i>
			</td>
		</tr>
		<tr>
			<td>Reset:</td>
			<td><input type="reset" name="wissen" value="Invoer wissen"></td>
			<td>
				<i>&lt;input type="reset" name="wissen" value="Invoer wissen"&gt;
				</i>
			</td>
		</tr>
		<tr>
			<td>Button:</td>
			<td><input type="button" name="knop" value="Belletje Trekken!"></td>
			<td><i>&lt;input type="button" name="knop" value="Belletje Trekken!"&gt;</i></td>
		</tr>
		<tr>
			<td>Image (submit):</td>
			<td><input type="image" src="start16.png" name="plaatje" value="Plaatje Klikken!"></td>
			<td><i>&lt;input type="image" src="start16.png" name="plaatje" value="Plaatje Klikken!"&gt;</i></td>
		</tr>
		<tr>
			<td>Verzenden:</td>
			<td><input type="submit" name="inleveren" value="Verwerking starten"></td>
			<td><i>&lt;input type="submit" name="inleveren" value="Verwerking starten"&gt;</i></td>
		</tr>
		<tr>
			<td>Verzenden 2:</td><td><input type="submit" name="invoeren" value="Invoer starten"></td>
			<td><i>&lt;input type="submit" name="invoeren" value="Invoer starten"&gt;</i></td>
		</tr>
		
	</table>

  <p>Dit is de simpele file die rapporteert hoe het bovenstaande formulier is ingevuld. Onthou dat print_r je beste vriend is als het gaat om het bekijken van de return waarden van een formulier.</p>
<?php
toon_file("v15_forms.php");
?>

 <p>Voor de volledigheid hieronder ook de complete broncode van de hoofdpagina met het formulier:</p>
  <?php
  toon_file("v15_forms.html");
  ?>
  
</p>

<?php
include "voet.php";

?>