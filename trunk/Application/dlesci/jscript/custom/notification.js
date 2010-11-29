// JavaScript Document
var wind = window.parent;
var ie=wind.document.all;
var dom=wind.document.getElementById;
  
var NotifyTopPos = 0;
var NotifySpeed = 10;
var NotifyStep = 3;
var opacity = 10;
var NotifyMaxVal = 400;
var NotifyMinVal = 0;
var Notify;
var NotifyIsWorking = false;
var NotifyIsHidden = true;

function initNotify()
{
	Notify = (dom)?wind.document.getElementById("notifyDiv") : ie? wind.document.all.notifyDiv : wind.document.notifyDiv
	var val = 200;
	Notify.style.left = val + "px";
	Notify.style.filter = 'alpha(opacity='+opacity+')';
}

function hideNotify()
{
	if(NotifyIsWorking)
		return;
	NotifyIsWorking = true;
	hideNotifyrec();
}

function showNotify()
{
	if(NotifyIsWorking)
		return;
	NotifyIsWorking = true;
	showNotifyrec();
}

function toggleNotify()
{
	if(NotifyIsHidden)
	{
		showNotify();
	}
	else
	{
		hideNotify();
	}
}

function hideNotifyrec()
{
	if(NotifyTopPos<=NotifyMinVal)
	{
		NotifyIsWorking = false;
		NotifyIsHidden = true;
		return;
	}
	NotifyTopPos = NotifyTopPos - NotifyStep;
	Notify.style.height = NotifyTopPos+"px";
	setTimeout("hideNotifyrec()",NotifySpeed);
}

function showNotifyrec()
{
	if(NotifyTopPos>=NotifyMaxVal)
	{
		NotifyIsWorking = false;
		NotifyIsHidden = false;
		return;
	}
	NotifyTopPos = NotifyTopPos + NotifyStep;
	Notify.style.height = NotifyTopPos+"px";
	setTimeout("showNotifyrec()",NotifySpeed);
}
