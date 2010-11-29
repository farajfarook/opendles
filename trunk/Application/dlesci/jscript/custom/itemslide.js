// JavaScript Document

var	wind = window.parent;
var	ie = wind.document.all;
var	dom = wind.document.getElementById;
var iContent;
var gap;
var tbody;
var boxWidth,boxHeight;
var noOfBoxes;
var boxbk;
var clients;
var protocol,host,app,user,auth,ruser;
var isHidden;
var chatterBoxes;

function initItemSlider(iprotocol,ihost,iapp,iuser,iauth)
{
	chatterBoxes = new Array();	
	gap = 10;
	isHidden = true;
	boxWidth = 150;
	boxHeight = 200;
	noOfBoxes = 0;
	clients = new Array();
	iContent = (dom)?wind.document.getElementById("chatBlast") : ie? wind.document.all.chatBlast : wind.document.chatBlast;
	tbody = document.getElementsByTagName('body')[0];   

	boxbk = document.createElement('div');       // Create the layer.        
	boxbk.style.marginTop = "10px"
	boxbk.style.marginLeft = "10px"
	boxbk.style.marginRight = "10px"
	boxbk.style.visibility = (dom||ie)? "visible" : "show";;
	boxbk.id = 'iSliderContent';
	iContent.appendChild(boxbk);	
	protocol=iprotocol;
	host=ihost;
	app=iapp;
	user=iuser;
	auth=iauth;
}


function addBox(iruser)
{
	clients[noOfBoxes] = iruser;
	noOfBoxes++;
}

function showBoxes()
{
	var htmlval="<table border='0'><tr>";
	for(var index=0;index<noOfBoxes;index++)
	{
		htmlval += getContent(index);
	}
	htmlval += "</tr></table>";
	boxbk.innerHTML = htmlval;
}

function hideBoxes()
{
	for(var index=0;index<noOfBoxes;index++)
	{
		boxbk.innerHTML = "";
	}
}

function toggleChater(index)
{
	var elem = document.getElementById("chater"+index);
	if(elem.innerHTML == "")
	{
		elem.innerHTML = getObject(index);
		document.getElementById("chatting"+index).style.height = "150px";
	}
	else
	{
		elem.innerHTML = "";
		document.getElementById("chatting"+index).style.height = "350px";
	}
}

function getContent(index)
{
	return 	"<td>"
				+"<table border='0' cellspacing ='0'>"
					+"<tr>"
						+"<td class='chatlabel'>"
							+"helloaa123|<a href='#' onClick='toggleChater(" + index + ")'>show</a>"
						+"</td>"
					+"</tr>"
					+"<tr>"
						+"<td class='chater' id='chater"+index+"'>"
						+"</td>"
					+"</tr>"
					+"<tr>"
						+"<td class='chatting'>"
							+"<div id='chatting"+index+"'></div>"
						+"</td>"
					+"</tr>"
				+"</table>"
			+"</td>";
}

function getObject(index)
{
	return "<object width='150' height='200'>"
			+"<param name='movie' value='subscriber.swf' />"
			+"<param name='quality' value='high' />"
			+"<param name='allowFullScreen' value='false' />"
			+"<param name='FlashVars' value='protocol="+protocol+"&host="+host+"&app="+app+"&user="+user+"&auth="+auth+"&ruser="+clients[index]+"' />"
			+"<embed src='flash/subscriber.swf?protocol="+protocol+"&host="+host+"&app="+app+"&user="+user+"&auth="+auth+"&ruser="+clients[index]+"' quality='high' bgcolor='#ffffff' width='150' height='200' name='httpTest' align='middle' allowScriptAccess='sameDomain' allowFullScreen='false' type='application/x-shockwave-flash' pluginspage='http://www.adobe.com/go/getflashplayer'/>"
			+"</object>";
}