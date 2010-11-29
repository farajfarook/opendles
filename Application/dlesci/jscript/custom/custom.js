/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function setLoading(id,loadimg)
{
    document.getElementById(id).innerHTML = "<img src="+loadimg+" />";
}

function setElement(id,text)
{
    document.getElementById(id).innerHTML = text;
}

function clearElement(id)
{
    setElement(id, '');
}

function deleteElement(id,parentid)
{
    document.getElementById(parentid).removeChild(document.getElementById(id));
}

function loadTable(request,id)
{
    if(request.responseText != "")
    {
         document.getElementById(id).innerHTML += request.responseText;
    }
}

function endUpload(data,resultID)
{
    document.getElementById(resultID).innerHTML = "<img class=\"imgbox\" src='"+data+"' />";
}

function startUpload(progressID,loadimg,fileID)
{
    if(document.getElementById(fileID).value == "")
    {
        return false;
    }
    document.getElementById(progressID).innerHTML = "<img src="+loadimg+" />";
    document.getElementById(fileID).value = "";
    return true;
}

function endResourceUpload(data,resultID)
{
    document.getElementById(resultID).innerHTML = data;
}

function startResourceUpload(progressID,loadimg,fileID)
{
    if(document.getElementById(fileID).value == "")
    {
        return false;
    }
    document.getElementById(progressID).innerHTML = "<img src="+loadimg+" />";
    document.getElementById(fileID).value = "";
    return true;
}

function endUpload2(data,resultID)
{
     document.getElementById(resultID).innerHTML =  data;
}

function QuestionSendResponse(chkBox,answer_id)
{
    if(chkBox.checked == 1)
    {
        loadPage('paper/answer/'+answer_id,'exam_field')
    }
    else
    {
        loadPage('paper/answeremove/'+answer_id,'exam_field')
    }
}