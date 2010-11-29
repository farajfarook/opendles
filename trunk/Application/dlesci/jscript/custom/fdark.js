var crossobj,divObj,dataObj,headerObj;
var ie=document.all
var dom=document.getElementById
    
var zindex = 50;  
var opacity = 80;  
var opaque = (opacity / 100);  
var bgcolor = '#000000';
var currentOpacity = 0;
var cw=50,ch=50;
var height,width,datax,titlex;

function showFDarkElem(elem)
{
	showFDark("",elem.innerHTML,elem.style.height,elem.style.width);
}

function showFDark(titlea,data,h,w)
{
    titlex = titlea;
    datax = data;
    height = h;
    width = w;
    
    crossobj=(dom)?document.getElementById("darkDiv") : ie? document.all.darkDiv : document.darkDiv    
    if(!crossobj)   
    {
        var tbody = document.getElementsByTagName("body")[0];    
        var tnode = document.createElement('div');       // Create the layer.        
        tnode.style.position='absolute';                 // Position absolutely        
        tnode.style.top='0px';                           // In the top        
        tnode.style.left='0px';                          // Left corner of the page        
        tnode.style.overflow='hidden';                   // Try to avoid making scroll bars 
        tnode.style.display='none';                      // Start out Hidden        
        tnode.id='darkDiv';                   // Name it so we can find it later    
        tbody.appendChild(tnode);
        crossobj=(dom)?document.getElementById("darkDiv") : ie? document.all.darkDiv : document.darkDiv    
    }
    if( document.body && ( document.body.scrollWidth || document.body.scrollHeight ) ) 
    { 
        pageWidth = (document.body.scrollWidth)+'px';
        pageHeight = (document.body.scrollHeight)+'px';
        centerLeft = (document.body.scrollWidth)/2;
        centerTop = (document.body.scrollHeight)/2;
    } 
    else if( document.body.offsetWidth ) 
    { 
        pageWidth = (document.body.offsetWidth)+'px';      
        pageHeight = (document.body.offsetHeight)+'px'; 
        centerLeft = (document.body.offsetWidth)/2;
        centerTop = (document.body.offsetHeight)/2;
    } 
    else 
    {       
        pageWidth='100%';       
        pageHeight='100%';    
        centerLeft=40;
        centerTop=40; 
    }  
    shadeIn();
    crossobj.style.zIndex=zindex;            
    crossobj.style.backgroundColor=bgcolor;      
    crossobj.style.width= pageWidth;    
    crossobj.style.height= pageHeight;    
    crossobj.style.display='block'; 
    crossobj.innerHTML = "<div id='innerDiv'><div id='msgDiv'><div id='headerDiv'></div>"
            + "<div align='right' ><a href='#' onclick='shadeOut()' class='minilink'>close</a></div>"
            + "</div><div id='dataDiv'></div></div>";
    divObj=(dom)?document.getElementById("innerDiv") : ie? document.all.innerDiv : document.innerDiv    
    dataObj=(dom)?document.getElementById("dataDiv") : ie? document.all.dataDiv : document.dataDiv    
    headerObj=(dom)?document.getElementById("headerDiv") : ie? document.all.headerDiv : document.headerDiv    

    openUp();
}

function openUp()
{
    if(cw < width || ch < height)
    {
        headerObj.innerHTML = "opening...";
        divObj.style.left = centerLeft-cw/2;
        divObj.style.top = centerTop-ch/2;
        divObj.style.width = cw;
        dataObj.style.width = cw - 2;
        dataObj.style.height = ch-2;
        divObj.style.height = ch;
        if(cw < width)
        {
            cw = cw + 50;    
        }
        else if(ch < height)
        {
            ch = ch + 50;
        }
        setTimeout("openUp()", 50);
    }
    else
    {
        dataObj.innerHTML = datax;
        headerObj.innerHTML = titlex;
        dataObj.style.visibility=(dom||ie)? "visible" : "show";
    }
}

function closeUp()
{
    if(cw > 50 || ch > 50)
    {
        dataObj.innerHTML = " ";
        headerObj.innerHTML = "closing...";
        divObj.style.left = centerLeft-cw/2;
        divObj.style.top = centerTop-ch/2;
        dataObj.style.width = cw - 2;
        dataObj.style.height = ch-2;
        divObj.style.width = cw;
        divObj.style.height = ch;
        if(cw > 50)
        {
            cw = cw - 50;    
        }
        else if(ch > 50)
        {
            ch = ch - 50;
        }
        setTimeout("closeUp()", 50);
    }
    else
    {
        crossobj.style.visibility = "hidden";
    }
}

function shadeIn()
{
    if(currentOpacity<opacity)
    {
        crossobj.style.visibility=(dom||ie)? "visible" : "show";
        currentOpacity = currentOpacity +15;
        crossobj.style.opacity = currentOpacity/100;
        crossobj.style.MozOpacity = currentOpacity/100;
        crossobj.style.filter='alpha(opacity='+currentOpacity+')';
        setTimeout("shadeIn()", 50);
    }
}

function shadeOut()
{
    if(currentOpacity>0)
    {
        closeUp();
        crossobj.style.visibility=(dom||ie)? "visible" : "show";
        currentOpacity = currentOpacity -15;
        crossobj.style.opacity = currentOpacity/100;
        crossobj.style.MozOpacity = currentOpacity/100;
        crossobj.style.filter='alpha(opacity='+currentOpacity+')';
        setTimeout("shadeOut()", 50);
    }
    else
    {
        crossobj.style.visibility = "hidden";
    }
}


function showFDarkHTML(titlea,hrefval,h,w,scroll)
{
    if(scroll)
      showFDark(titlea, '<iframe frameborder="0" src="'+hrefval+'" height="'+h+'" width="'+w+'"></iframe>', h, w)
    else
      showFDark(titlea, '<iframe frameborder="0" scrolling="no" src="'+hrefval+'" height="'+h+'" width="'+w+'"></iframe>', h, w)
}

function showPop(valueContent,leftVal,topVal)
{
    hidePop();
    elem = document.createElement("div");
    elem.setAttribute('class', 'popBox');
    elem.setAttribute('id', 'popupelem');
    elem.style.top = topVal + "px" ;
    elem.style.left = leftVal + "px" ;
    elem.innerHTML = "<a href='#' class='popBoxCloseButton' onclick='hidePop()'>- close -</a>"
                      + "<hr>" + valueContent ;
    bodyelem = document.getElementsByTagName('body')[0];
    bodyelem.appendChild(elem);
}

function hidePop()
{
    elem = document.getElementById('popupelem');
    if(elem  == null) return;
    bodyelem = document.getElementsByTagName('body')[0];
    bodyelem.removeChild(elem);
}
