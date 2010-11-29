function getXMLHttpRequestObject()
{
    var ie=document.all
    var dom=document.getElementById
    var httpRequest;
    if(!ie) 
    {
       try {
        netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead");
       } catch (e) {
       // alert("Permission UniversalBrowserRead denied.");
       }
    }
    if (window.XMLHttpRequest) 
    { // Mozilla, Safari, ...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) 
        {
            httpRequest.overrideMimeType('text/xml');
        }
    } 
            
    else if (window.ActiveXObject) 
    { // IE
        try 
        {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } 
        catch (e) 
        {
            try 
            {
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } 
            catch (e) 
            {
                
            }
        }                         
    }
    if (!httpRequest) 
    {
          alert('Giving up :( Cannot create an XMLHTTP instance');
          return false;
    }
    return httpRequest;
}

function htmlInsert(id, htmlData) 
{
  document.getElementById(id).innerHTML = htmlData;
}

function getValue(id)
{
    return document.getElementById(id).value;
}

function checkState(httpRequest)
{
    if (httpRequest.readyState == 4) 
    {
        if (httpRequest.status == 200) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function isLoading(httpRequest)
{
    if(httpRequest.readyState != 4)
    {
        return true;
    }
    else
    {
        return false;
    }
}
    
function makeRequest(httpRequest,Method,url,data) 
{
    httpRequest.open(Method, url, true);
    if(Method == 'POST')
    {
        httpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    }
    httpRequest.send(data);   
}
function getAll(httpRequest)
{
    return httpRequest.responseText;
}
function getDataValues(httpRequest, dataType) 
{
    var values = httpRequest.responseText.split("|");
    dataset = new Array();
    count = 0;
    
    for(var i=0; i<values.length; i++) 
    {
        textArr = values[i].split("~");
    
        if(textArr[0]==dataType)
        {
            dataset[count] = textArr[1];
            count = count + 1;
        }
    }
    return dataset;
}

function getDataValue(httpRequest, dataType, dataIndex)
{
    var arr = getDataValues(httpRequest, dataType);
    return arr[dataIndex];
}

function isStringHas(cmp,del)
{
    return cmp.indexOf(del) >= 0;
}
