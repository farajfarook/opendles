// JavaScript Document
var wind = window.parent;
var ie=wind.document.all;
var dom=wind.document.getElementById;
  
var ThreadTopPos = -7;
var ThreadSpeed = 10;
var ThreadStep = 3;
var ThreadMaxVal = -7;
var ThreadMinVal = -370;
var Thread;
var ThreadIsWorking = false;
var ThreadIsHidden = true;

function initThread()
{
	Thread = (dom)?wind.document.getElementById("threadDiv") : ie? wind.document.all.threadDiv : wind.document.threadDiv
	var val = 450;
	Thread.style.left = val + "px";
	Thread.style.top = ThreadMinVal + "px";
	ThreadTopPos = ThreadMinVal;
}

function hideThread()
{
	if(ThreadIsWorking)
		return;
	ThreadIsWorking = true;
	hideThreadrec();
}

function showThread()
{
	if(ThreadIsWorking)
		return;
	ThreadIsWorking = true;
	showThreadrec();
}

function toggleThread()
{
	if(ThreadIsHidden)
	{
		showThread();
	}
	else
	{
		hideThread();
	}
}

function hideThreadrec()
{
	if(ThreadTopPos<=ThreadMinVal)
	{
		ThreadIsWorking = false;
		ThreadIsHidden = true;
		return;
	}
	ThreadTopPos = ThreadTopPos - ThreadStep;
	Thread.style.top = ThreadTopPos+"px";
	setTimeout("hideThreadrec()",ThreadSpeed);
}

function showThreadrec()
{
	if(ThreadTopPos>=ThreadMaxVal)
	{
		ThreadIsWorking = false;
		ThreadIsHidden = false;
		return;
	}
	ThreadTopPos = ThreadTopPos + ThreadStep;
	Thread.style.top = ThreadTopPos+"px";
	setTimeout("showThreadrec()",ThreadSpeed);
}
