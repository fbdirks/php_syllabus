function kop() {
 	// bepalen eigen filenaam en volgende en vorige pagina.
 	var url = window.location.pathname;
 	var filename = url.substring(url.lastIndexOf('/')+1);
 	if (filename=="") filename="index.php";
	console.log(filename);
	var nummer = filename.slice(6,8);
	console.log(nummer);
	var volgende = parseInt(nummer) + 1;
	if (volgende>40) volgende=40;
	var vorige = parseInt(nummer) - 1;
	if (vorige<1) vorige = 1;
	var volgendePagina = "pagina" + volgende.toString() +  ".php";
	var vorigePagina = "pagina" + vorige.toString() +  ".php";
	console.log("Filenaam = " + filename);
	if (filename=="index.php") {
		volgendePagina = "pagina1.php";
		vorigePagina = "index.php";
	} else if (filename=="pagina1.php"){
		vorigePagina = "index.php";
	}
	
	// Als volgende pagina niet bestaat verwijst die pagina naar zichzelf.
	if (!doesFileExist(volgendePagina)) {
		console.log("File bestaat niet!!");
		volgendePagina=filename;
	} 
	
	
  var logo = "php2.gif";
  var kopTekst = "<img src=\"" + logo + "\" />"+ " &nbsp;&nbsp;&nbsp;<i>aantekeningen</i>";

  var knops = "<br><span style=\"text-align: right\" title=\"vorige pagina\"><a href=\"" + vorigePagina + "\"><span class=\"glyphicon glyphicon-arrow-left\"></span></a>";
  knops += " <a href=\"index.php\" title=\"Index\"><span class=\"glyphicon glyphicon-arrow-up\"></span></a> ";
  knops += "<a href=\""+ volgendePagina + "\" title=\"volgende pagina\"><span class=\"glyphicon glyphicon-arrow-right\"></span></a></span>";
  kopTekst += knops;

  $('header').html(kopTekst);
  console.log(kopTekst);

  // voettekst aanmaken
  var d = new Date();
  var voetTekst = knops + "<br><h6> &copy;" + d.getFullYear() + " dsf - <a href=\"index.html\">home<\a></h6>";
  $("footer").html(voetTekst);
  
}


function doesFileExist(urlToFile)
{
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', urlToFile, false);
    xhr.send();
     
    if (xhr.status == "404") {
        return false;
    } else {
        return true;
    }
}
function fileExists(url) {
    if(url){
        var req = new XMLHttpRequest();
        req.open('HEAD', url, false);
        req.send();
        return req.status==200;
    } else {
        return false;
    }
}
