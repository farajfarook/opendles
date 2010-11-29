// JavaScript Document
var wind = window.parent;
var ie=wind.document.all;
var dom=wind.document.getElementById;

var PublisherTopPos = 0;
var PublisherSpeed = 10;
var PublisherStep = 3;
var PublisherMaxVal = -18;
var PublisherMinVal = -160;
var Publisher;
var PublisherIsWorking = false;
var PublisherIsHidden = true;
var windowHeight;
var windowWidth;

function setButtonPos()
{
	
}

function initPublisher()
{
	windowHeight = (ie)? document.body.clientHeight : window.innerHeight;
	windowWidth = (ie)? document.body.clientWidth : window.innerWidth;
	Publisher = (dom)?wind.document.getElementById("publishDiv") : ie? wind.document.all.publishDiv : wind.document.publishDiv
	var val = windowWidth - 550;
	Publisher.style.left = val + "px";
	Publisher.style.top = PublisherMinVal + "px";
	PublisherTopPos = PublisherMinVal;
}

function hidePublisher()
{
	if(PublisherIsWorking)
		return;
	PublisherIsWorking = true;
	hidePublisherrec();
}

function showPublisher()
{
	if(PublisherIsWorking)
		return;
	PublisherIsWorking = true;
	showPublisherrec();
}

function togglePublisher()
{
	if(PublisherIsHidden)
	{
		showPublisher();
	}
	else
	{
		hidePublisher();
	}
}

function hidePublisherrec()
{
	if(PublisherTopPos<=PublisherMinVal)
	{
		PublisherIsWorking = false;
		PublisherIsHidden = true;
		return;
	}
	PublisherTopPos = PublisherTopPos - PublisherStep;
	Publisher.style.top = PublisherTopPos+"px";
	setTimeout("hidePublisherrec()",PublisherSpeed);
}

function showPublisherrec()
{
	if(PublisherTopPos>=PublisherMaxVal)
	{
		PublisherIsWorking = false;
		PublisherIsHidden = false;
		return;
	}
	PublisherTopPos = PublisherTopPos + PublisherStep;
	Publisher.style.top = PublisherTopPos+"px";
	setTimeout("showPublisherrec()",PublisherSpeed);
}
