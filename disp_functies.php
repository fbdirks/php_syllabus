<?php

function codekop() {

//print "<table class=\"codedisplay\" border=\"1\" width=\"90%\" cellpadding=\"25\">";
//print "<tr><td bgcolor=\"#ffdc87\">";
print "<div class=\"codedisplay\">";
print "<table>";
print "<tr><td>";

}

function codeslot() {
	print "</td></tr></table>";
	print "</div>";
}

function toon_file($file,$ln="ja") {
	codekop();
	$language="php";
	$geshi = new GeSHi($file, $language);
	if ($ln=="ja"){
		$geshi->set_line_style('list-style-position:outside; color:#77BBFF ');
 		$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);	
	} else {
		$geshi->set_line_style('list-style-position:outside;');
 		$geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
	}
	
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
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
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