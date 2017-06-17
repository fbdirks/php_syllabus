function kop() {
 	// bepalen eigen filenaam en volgende en vorige pagina.
 	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	var nummer = filename.slice(6,8);
	var volgende = parseInt(nummer) + 1;
	if (volgende>40) volgende=40;
	var vorige = parseInt(nummer) - 1;
	if (vorige<1) vorige = 1;
	var volgendePagina = "pagina" + volgende.toString() +  ".html";
	var vorigePagina = "pagina" + vorige.toString() +  ".html";
	
	if (filename=="index.html") {
		volgendePagina = "pagina1.html";
		vorigePagina = "index.html";
	} else if (filename=="pagina1.html"){
		vorigePagina = "index.html";
	}
 
  var logo = "img/jsmall.png";
  var kopTekst = "<img src=\"" + logo + "\" />"+ " <i>aantekeningen</i>";

  var knops = "<br><br><hr><span style=\"text-align: right\" title=\"vorige pagina\"><a href=\"" + vorigePagina + "\"><span class=\"knopje\">&lt;</span></a>";
  knops += " <a href=\"index.html\" title=\"Index\"><span class=\"knopje\">*</span></a> ";
  knops += "<a href=\""+ volgendePagina + "\" title=\"volgende pagina\"><span class=\"knopje\">&gt;</span></a><hr></span>";
  kopTekst += knops;

  $('header').html(kopTekst);
  console.log(kopTekst);

  // voettekst aanmaken
  var d = new Date();
  var voetTekst = knops + "<br><h6> &copy;" + d.getFullYear() + " dsf - <a href=\"index.html\">home<\a></h6>";
  $("footer").html(voetTekst);
  
}

function voet() {
  // functie is leeggemaakt...
  
  
}

