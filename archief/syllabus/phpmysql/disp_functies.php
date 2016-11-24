<?php

function codekop() {

print "<table border=\"1\" width=\"90%\" cellpadding=\"25\">";
print "<tr><td bgcolor=\"#ffdc87\">";

}

function codeslot() {
	print "</td></tr></table>";
}

function toon_file($file) {
	codekop();
	$language="php";
	$geshi = new GeSHi($source, $language);
 	$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
	$geshi->load_from_file("$file");
	print "<h4>Sourcecode <a href=\"$file\" target=\"_new\">$file</a></h4>";
	print $geshi->parse_code();

	codeslot();
}

function toon_taal($file,$taal) {
	codekop();
	$geshi = new GeSHi($source, $taal);
 	$geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
	$geshi->load_from_file("$file");
	print "<h4>Sourcecode <a href=\"$file\" target=\"_new\">$file</a></h4>";
	print $geshi->parse_code();

	codeslot();
	
}

function toon_code($code) {
	$geshi = new GeSHi($code, 'php');
	//$kopregel = "<h6>..<h6>";
	//$geshi->set_header_content($kopregel);
	//$voetregel = "<h6>..<LANGUAGE> <SPEED> <VERSION>..</h6>";
	//$geshi->set_footer_content($voetregel);
	$code = $geshi->parse_code($geshi);
	
	echo "<table class=\"query\" width=40% >";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
}

function toon_html($code) {
	$geshi = new GeSHi($code, 'html5');
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";
}

function toon_fragment($file,$taal) {
	codekop();
	$geshi = new GeSHi($source, $taal);
 	$geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
	$geshi->load_from_file("$file");
	
	print $geshi->parse_code();

	codeslot();
}
?>