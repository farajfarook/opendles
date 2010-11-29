function goto(path)
{
	window.open(path,path,"menubar=no,fullscreen=yes,toolbar=no");
}

var timer = null;

function showtip(name)
{
	if(timer!=null)
		clearTimeout(timer);
	var element = document.createElement("div");
	element.setAttribute("class","showtip");
	element.setAttribute("id","showtipelement");
	element.innerHTML = getvalue(name);
	var bodyelem = document.getElementsByTagName("body")[0];
	bodyelem.appendChild(element);
	timer = setTimeout("hidetip",5000);
}

function hidetip()
{
	var element = document.getElementById("showtipelement");
	element.innerHTML = "";
	var bodyelem = document.getElementsByTagName("body")[0];
	bodyelem.removeChild(element);
}

function getvalue(name)
{
	
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","detail.xml",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	return xmlDoc.getElementsByName(name)[0].childNodes[0].nodeValue;
}

