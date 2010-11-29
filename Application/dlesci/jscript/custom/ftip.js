// JavaScript Document
// F.Faraj
var wind = window.parent;
var ie=wind.document.all;
var dom=wind.document.getElementById;
var tnode, snode;
var itnodes = new Array();
var isnodes = new Array();
var windowHeight;
var windowWidth

function initTip()
{
	windowHeight = (ie)? document.body.clientHeight : window.innerHeight;
	windowWidth = (ie)? document.body.clientWidth : window.innerWidth;
	
	var tbody = document.getElementsByTagName("body")[0];    
	tnode = document.createElement('div');       // Create the layer.        
	tnode.style.position='absolute';                 // Position absolutely        
	tnode.style.overflow='hidden';                   // Try to avoid making scroll bars 
	tnode.style.backgroundImage='url(image/tiptop.png)';
	tnode.style.backgroundRepeat='no-repeat';
	tnode.style.paddingTop='11px';
	tnode.id='tip';                   // Name it so we can find it later    
	tnode.style.visibility='hidden';
	snode = document.createElement('div');       // Create the layer.        
	snode.style.overflow='hidden';                   // Try to avoid making scroll bars 
	snode.style.backgroundColor='#F0E57C';
	snode.style.border='medium solid #FBF6D4';
	snode.style.backgroundRepeat='no-repeat';
	snode.style.padding='5px';
	snode.style.fontFamily='Verdana, Geneva, sans-serif';
	snode.style.fontSize='12px';
	snode.style.color='#FFF';
	tnode.appendChild(snode);
	tbody.appendChild(tnode);	
}

function showTip(x,y,msg,isTop)
{
	snode.innerHTML=msg;
	tnode.style.top=(x-3)+'px';                           // In the top        
	tnode.style.left=y+'px';                          // Left corner of the page        
	if(isTop)
	{
		tnode.style.backgroundImage='url(image/tiptop.png)';
		tnode.style.backgroundPosition='top left';
		tnode.style.paddingTop='11px';		
	}
	else
	{
		tnode.style.backgroundImage='url(image/tipbot.png)';
		tnode.style.backgroundPosition='bottom left';
		tnode.style.paddingBottom='11px';
	}
	tnode.style.visibility=(dom||ie)? "visible" : "show";
}

function hideTip()
{
	tnode.style.visibility='hidden';
}

function showNewTip(x,y,msg,index)
{
	var tbody = document.getElementsByTagName("body")[0];    
	itnodes[index] = document.createElement('div');       // Create the layer.        
	itnodes[index].style.position='absolute';                 // Position absolutely        
	itnodes[index].style.overflow='hidden';                   // Try to avoid making scroll bars 
	itnodes[index].style.backgroundImage='url(image/tiptop.png)';
	itnodes[index].style.backgroundRepeat='no-repeat';
	itnodes[index].style.paddingTop='11px'; 
	itnodes[index].style.visibility='hidden';
	isnodes[index] = document.createElement('div');       // Create the layer.        
	isnodes[index].style.overflow='hidden';                   // Try to avoid making scroll bars 
	isnodes[index].style.backgroundColor='#F0E57C';
	isnodes[index].style.border='medium solid #FBF6D4';
	isnodes[index].style.backgroundRepeat='no-repeat';
	isnodes[index].style.padding='5px';
	isnodes[index].style.fontFamily='Verdana, Geneva, sans-serif';
	isnodes[index].style.fontSize='12px';
	isnodes[index].style.color='#FFF';
	itnodes[index].appendChild(isnodes[index]);
	tbody.appendChild(itnodes[index]);	
	itnodes[index].style.visibility=(dom||ie)? "visible" : "show";
	isnodes[index].innerHTML=msg;
	itnodes[index].style.top=(x-3)+'px';                           // In the top        
	itnodes[index].style.left=y+'px';                          // Left corner of the page  
}

function removeTip(index)
{
	var tbody = document.getElementsByTagName("body")[0];   
	itnodes[index].removeChild(isnodes[index]);
	tbody.removeChild(itnodes[index]);	
}