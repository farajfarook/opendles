var wind = window.parent;
var ie=wind.document.all;
var dom=wind.document.getElementById;

var showElements = new Array();
var showElementCount = 0;
var windowHeight;
var windowWidth;
var btnset;

function initMainDisplay()
{
	windowHeight = (ie)? document.body.clientHeight : window.innerHeight;
	windowWidth = (ie)? document.body.clientWidth : window.innerWidth;	
	mainDisp = (dom)?wind.document.getElementById("mainDisplay") : ie? wind.document.all.mainDisplay : wind.document.mainDisplay
	mainDisp.style.height = (windowHeight - 170) + "px";
	mainDisp.style.width = (windowWidth - 5) + "px";
}

function initButtonSet()
{
	windowHeight = (ie)? document.body.clientHeight : window.innerHeight;
	windowWidth = (ie)? document.body.clientWidth : window.innerWidth;	
	btnset = (dom)?wind.document.getElementById("btnset") : ie? wind.document.all.btnset : wind.document.btnset;
	btnset.style.left = windowWidth - 200;
}

function addShowElement(elementID)
{
	showElements[showElementCount++]=document.getElementById(elementID);
}

function toggleShow(element)
{
	for(var i=0; i<showElementCount; i++)
	{
		if(showElements[i] != element)
			showElements[i].style.visibility = "hidden";
	}
	if(element.style.visibility=="visible" || element.style.visibility=="show" )
        {
		element.style.visibility="hidden";
                return false;
        }
	else
        {
	    element.style.visibility=(dom||ie)? "visible" : "show";
            return true;
        }

}
