<html>
<head>
<title>
    DLES
</title>
<link href="<?php echo base_url() ?>style/atageffect.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>style/thread.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>style/fdark.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>jscript/custom/publisher.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/script1.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/ftip.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/fdark.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/chatbox.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/itemslide.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/customvalidator.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>jscript/ajax/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/effects.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/dragdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/controls.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/custom.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/custom/slider.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url() ?>jscript/tabpane/local/webfxlayout.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>jscript/tabpane/js/tabpane.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>jscript/tabpane/local/webfxapi.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>jscript/tabpane/css/tabcustom.css"/>

<style type="text/css">

body
{
      font-family: Verdana, Geneva, sans-serif;
}
.question_local
{
    padding-left: 15px;
}

.answer_local
{
    padding-left: 30px;
}

.thread_add_Link
{
    background: url(<?php echo base_url() ?>image/icons/add.png);
    background-position: left;
    background-repeat: no-repeat;
    font-size: 12px;
    color: #2999ca;
    text-decoration: none;
    padding: 3px;
    padding-left: 20px;
}

.thread_add_Link:hover
{
    color: black;
    cursor: pointer;
}
.thread_reply_container
{
       padding:5px;
}
.thread_container
{
    padding: 5px;
}
.thread_reply
{
    font-size: 12px;
    color: #2999ca;
    padding: 5px;
}
.thread_subject
{
    font-size: 14px;
    color: #2999ca;
    font-weight: bold;
    padding-bottom: 5px;
}
.thread_inbox_subject
{
    padding: 5px;
    background: url(<?php echo base_url() ?>image/icons/mail.png);
    background-position: left;
    background-repeat: no-repeat;
    padding-left: 40px;
    color: #2999ca;
    font-size: 12px;
}

.thread_inbox_subject:hover
{
    color: black;
    cursor: pointer;
}

.thread_inbox_subject_new
{
    padding: 5px;
    background: url(<?php echo base_url() ?>image/icons/newmail.png);
    background-position: left;
    background-repeat: no-repeat;
    padding-left: 40px;
    color: #2999ca;
    font-size: 12px;
}

.thread_inbox_subject_new:hover
{
    color: black;
    cursor: pointer;
}

.thread_inbox_container
{
    margin: 5px;
    padding: 5px;
    border-right: 1px #2999ca solid;
    width: 400px;
    height: 400px;
    overflow: auto;
}

.thread_subject_textbox
{
    border: solid 1px #2999ca;
    padding:5px;
    color:#2999ca;
    width: 200px;
}

.class_button
{
    border: solid 1px #2999ca;
    padding:5px;
    background: #2999ca;
    color:#FFF;
    width: 150px;
    text-align: left;
    padding-left:10px;
}

.class_button:hover
{
    border: solid 1px orange;
}
.class_whiteboard_name
{
    background: #2999ca;
    padding: 3px;
    color: white;
    font-size: 10px;
    width: 400px;
}
.class_whiteboard
{
    border: 1px solid #2999ca;
    padding: 1px;
    width: 400px;
}
.class_lecturer_desktop_name
{
    background: #2999ca;
    padding: 3px;
    color: white;
    font-size: 10px;
    width: 400px;
}
.class_lecturer_desktop
{
    border: 1px solid #2999ca;
    padding: 2px;
    width: 400px;
}
.class_lecturer_name
{
    background: #2999ca;
    padding: 3px;
    color: white;
    font-size: 10px;
    width: 150px;
}

.class_lecturer_cam
{
    border: 1px solid #2999ca;
    padding: 2px;
    width: 150px;
}

.class_heading
{
    font-size: 20px;
    color: #2999ca;
}

.chatsave
{
    	border: 1px solid #2999ca;
        padding: 2px;
        font-size: 10px;
}
.logo
{
	position:absolute;
	background-image:url(<?php echo base_url() ?>image/upline.gif);
	background-position: top;
	background-repeat:repeat-x;
	width:100%;
	height:81px;
	top:0px;
	left:0px;
}

.bottonDisplayHolder
{
	height:30px;
}

.mainDisplay
{
	width:100%;
	position:absolute;
	left:0px;
	top:100px;
        overflow:hidden;
        z-index: 0;
}

.publisher
{
	background-image:url(<?php echo base_url() ?>image/publisher.gif);
	background-position:left top;
	background-repeat:no-repeat;
	height: 215px;
	width: 309px;
	position:absolute;
	padding-left:4px;
	padding-top:18px;
	left: 857px;
	top: -159px;
	        z-index: 3;
}

.notify
{
	background-color:#FFF;
	max-height: 400px;
        min-height: 100px;
	width: 243px;
	position:absolute;
	padding-left:4px;
	padding-top:4px;
	left: 243px;
	top: 45px;
	border: medium solid #2999ca;
	visibility:hidden;
	        z-index: 3;
}

.thread
{
	background-color:#FFF;
	height: 400px;
	width: 243px;
	position:absolute;
	padding-left:4px;
	padding-top:4px;
	left: 365px;
	top: 45px;
	border: medium solid #2999ca;
	visibility:hidden;
	        z-index: 3;
}

.btnset
{
	position:absolute;
	right: 10px;
	top:18px;
	width: 185px;
	height: 32px;
}
.account
{
	background-image:url(<?php echo base_url() ?>image/upline.gif);
	height: 136px;
	width: 123px;
	position:absolute;
	padding-left:4px;
	padding-top:4px;
	left: 477px;
	top: 45px;
}

.bottomLine
{
	background-image:url(<?php echo base_url() ?>image/bottomline.gif);
	background-repeat:repeat;
	background-position:bottom;
	height:40px;
	width:100%;
	position:absolute;
	left: 0px;
	bottom: 0px;
}

.chatBox
{
	width:200px;
        height: 400px;
	position:absolute;
	left: 2px;
	bottom: 42px;
	background-repeat:repeat;
	border: 2px solid #2999ca;
        border-top: 2px solid #2999ca;
	background-color:#FFF;
        z-index: 3;
        visibility: hidden;
}

.chatcontainer
{
	position:absolute;
	left: 208px;
	bottom: 8px;
}

.chatboxlink
{
	background-image:url(<?php echo base_url() ?>image/bubble_32.png);
	background-position:left;
	background-repeat:no-repeat;
	position:relative;
	left:10px;
	top:0px;
	height:40px;
	text-align:right;
	width:90px;
}

.accountlink
{
	background-image:url(<?php echo base_url() ?>image/bubble_32.png);
	background-position:left;
	background-repeat:no-repeat;
	position:relative;
	left:10px;
	top:0px;
	height:40px;
	text-align:right;
	width:90px;
}

.chatlabel
{
	background-color:#2999ca;
	border:thin solid #2999ca;
	font-size:10px;
	color:#FFF;
	width:150px;
}

.chatting
{
	border:thin solid #2999ca;
	
	font-size:10px;
	width:150px;
}

.profile_subtitle
{
        font-size: 12px;
	padding:10px;
	background:#2999ca;
	color:#FFF;

}

.profile_data
{
	font-size:12px;
	padding:12px;
	color:#2999ca;
}

.profile_pic
{
    padding: 3px;
    border: solid 2px #2999ca;
}

.profile_label
{
    font-size: 12px;
    color: #2999ca;
}

.profile_button
{
    border: solid 1px #2999ca;
    padding:5px;
    background: #2999ca;
    color:#FFF;
    width: 100px;
}

.profile_button:hover
{
    border: solid 1px orange;
}

.profile_textbox
{
    font-size: 12px;
    border: solid 1px #2999ca;
    padding: 5px;
    color: #2999ca;
}

.profile_textbox:hover
{
    border: solid 1px orange;
}

.profile_alertlabel
{
    font-size: 10px;
    color: maroon;
}
.profile_heading
{
    font-size: 12px;
    width: 100px;
    font-weight: bold;
}
.settings_bigbutton
{
    border: solid 2px #2999ca;
    padding:10px;
    background: #2999ca;
    color:#FFF;
    width: 200px;
}

.settings_bigbutton:hover
{
    border: solid 2px orange;
}

.home_head
{
    background: none;
    font-size: 14px;
    color: black;
}

.home_link
{
    background: none;
    font-size: 12px;
    text-decoration: none;
    color: #2999ca;
    line-height: 25px;
}

.home_link:hover
{
    color: black;
}

.friend_heading
{
    font-size: 12px;
    height: 30px;
    border: 1px solid #2999ca;
    border-bottom: none;
    width: 150px;
    background-position: right;
    background-repeat: no-repeat;
    padding-left: 50px;
    padding-top: 15px;
    color: black;
}

.friend_heading:hover
{
    background-color: #2999ca;
    color: white;
}
.yui3-tab-selected
{
    background-color: #2999ca;
}
.friend_thumb
{
    max-width: 50px;
    max-height: 50px;
    padding: 3px;
    border: solid 2px #2999ca;
}

.friend_label
{
    font-size: 12px;
    color: #2999ca;
}

.friend_content
{
    border-top: solid 1px #2999ca;
    background-color: white;
    padding: 20px;
}

.friend_search_textbox
{
    font-size: 12px;
    border: solid 2px #2999ca;
    padding: 5px;
    color: #2999ca;
    width:150px;
    margin: 2px;
}

.friend_search_textbox:hover
{
    border: solid 2px orange;
}
.friend_listitem
{
    padding: 5px;
    border: solid 1px #2999ca;
    margin: 2px;
}
.chat_thumb
{
    max-width: 32px;
    max-height: 32px;
    padding: 3px;
    border: solid 2px #2999ca;
}

.chat_label
{
    font-size: 12px;
    color: #2999ca;
}

.chat_item
{
    border: solid 2px #2999ca;
    font-size: 12px;
    color: #2999ca;
    background: white;
}


.chat_item_head
{
    padding: 5px;
    color: white;
    background: #2999ca;
    font-size: 12px;
}

.chat_link
{
    font-size: 12px;
    text-decoration: none;
    color: white;
    margin: 1px;
    margin-right: 5px;
    padding: 2px;
    height: 32px;
    width: 32px;
}

.chat_link:hover
{
    color: black;
}

.userhome_button
{
    font-size: 12px;
    height: 50px;
    border: 2px solid white;
    color: #2999ca;
    background: white;
    width: 150px;
    padding-left: 50px;
    text-align: left;
    background-position: 2px;
    background-repeat: no-repeat;
}

.userhome_button:hover
{
    color: black;
    cursor: pointer;
}

.userhome_localdisplay
{
    overflow:hidden;
}

.userhome_buttonlist
{
    border-left: 1px solid #2999ca;
}

.class_newlink
{
    text-decoration: none;
    font-size: 12px;
    color: #2999ca;
    border: 1px solid #2999ca;
    padding: 5px;
}

.class_newlink:hover
{
    color:white;
    background: #2999ca;
}
.class_datainto
{
    font-size: 12px;
    color:white;
    border: 1px solid #2999ca;
    padding: 5px;
}
.class_info
{
    font-size: 14px;
    color: #2999ca;
    padding: 5px;
    border: 1px solid #2999ca;
    max-width: 400px;
}

.classroom_list_content
{
    border: 1px solid #2999ca;
    margin: 2px;
    padding: 4px;
    text-align: center;
    overflow: auto;
}
.scrollx
{
    overflow: auto;
    max-height: 400px;
}

.unscroll
{
    overflow: hidden;
}
.rss_set
{
    padding: 10px;
    padding-left: 50px;
    background-image: url(<?php echo base_url(); ?>image/icons/feed.png);
    background-position: left;
    background-repeat: no-repeat;
    visibility: hidden;
}
.rss_title
{
    font-size: 14px;
    color:#2999ca;
    border-bottom: solid 1px #2999ca;
}
.rss_content
{
    font-size: 12px;
    color: black;
}
.rss_link
{
    color:#2999ca;
    text-decoration: none;
    cursor: pointer;
}
.rss_banner
{
    color: white;
    font-size: 16px;
    padding: 10px;
    border: 3px solid  #2999ca;
    background:  #2999ca;
}
.textchatbox
{
    border: 1px solid  #2999ca;
    margin: 1px;
    padding: 2px;
    font-size: 10px;
    color: #2999ca;
}
.chat_listitem_online
{
   margin: 5px;
   height: 20px;
   padding-left: 32px;
   background-image: url(<?php echo base_url(); ?>image/icons/online.gif);
   background-position: left center;
   background-repeat: no-repeat;
}
.chat_listitem
{
   margin: 5px;
   height: 20px;
   padding-left: 32px;
   background-image: url(<?php echo base_url(); ?>image/icons/offline.png);
   background-position: left center;
   background-repeat: no-repeat;
}
.notification_header
{
    padding: 5px;
}
.notification_see_all_button
{
    padding: 2px;
    background: white;
    width: 40px;
    height: 20px;
    border: none;
    color: #2999ca;
    font-size: 10px;
}
.notification_see_all_button:hover
{
   color: black;
   cursor: pointer;
}
.notification_all
{
    padding: 10px;
}

.notification_all_old
{
    font-size: 12px;
    color: #2999ca;
    padding: 5px;
}

.notification_all_new
{

    font-size: 12px;
    color: #2999ca;
    padding: 5px;
    background: #ffffcc;
    border: #cccccc 1px solid;
}
.notification_all_heading
{
    font-size: 14px;
    padding: 10px;
}
.notification_new
{
    font-size: 10px;
    color: #2999ca;
    padding: 5px;
    background: #ffffcc;
    border: #cccccc 1px solid;
    margin: 2px;
}
.notification_link
{
    color: #2999ca;
    font-size: 10px;
    text-decoration: none;
}
.notification_link:hover
{
    color: black;
}
.notification_all_link
{
    color: #2999ca;
    font-size: 12px;
    text-decoration: none;
}
.notification_all_link:hover
{
    color: black;
}

.profile_button_add_friend
{
    background-color: white;
    background-image: url(<?php echo base_url(); ?>image/icons/add.png);
    background-position: left center;
    background-repeat: no-repeat;
    padding-left: 32px;
    color: #2999ca;
    font-size: 12px;
    text-align: right;
    border: white 1px solid;
}
.profile_button_add_friend:hover
{
    color: black;
    cursor: pointer;
}

.profile_button_ban_user
{
    background-color: white;
    background-image: url(<?php echo base_url(); ?>image/icons/delete.png);
    background-position: left center;
    background-repeat: no-repeat;
    padding-left: 32px;
    color: #2999ca;
    font-size: 12px;
    text-align: right;
    border: white 1px solid;
}
.profile_button_ban_user:hover
{
    color: black;
    cursor: pointer;
}

.profile_button_message
{
    background-color: white;
    background-image: url(<?php echo base_url(); ?>image/icons/email.png);
    background-position: left center;
    background-repeat: no-repeat;
    padding-left: 32px;
    color: #2999ca;
    font-size: 12px;
    text-align: right;
    border: white 1px solid;
}
.profile_button_message:hover
{
    color: black;
    cursor: pointer;
}

.profile_button_remove_friend
{
    background-color: white;
    background-image: url(<?php echo base_url(); ?>image/icons/removefriend.gif);
    background-position: left center;
    background-repeat: no-repeat;
    padding-left: 32px;
    color: #2999ca;
    font-size: 12px;
    text-align: right;
    border: white 1px solid;
}
.profile_button_remove_friend:hover
{
    color: black;
    cursor: pointer;
}
.popBox
{
    position: absolute;
    z-index: 10;
    padding: 10px;
    border: 1px solid #2999ca;
    background: white;
    width: 550px;
}
.popBoxCloseButton
{
    color: #2999ca;
    text-decoration: none;
    font-size: 10px;
}
.popBoxCloseButton:hover
{
    color: black;
}
</style>
<script type="text/javascript">
var ie=document.all
var dom=document.getElementById

// Detect if the browser is IE or not.
// If it is not IE, we assume that the browser is NS.
var IE = document.all?true:false

// If NS -- that is, !IE -- then set up for mouse capture
if (!IE) document.captureEvents(Event.MOUSEMOVE)

// Set-up to use getMouseXY function onMouseMove
document.onmousemove = getMouseXY;

// Temporary variables to hold mouse x-y pos.s
var tempX = 0
var tempY = 0

// Main function to retrieve mouse x-y pos.s

function getMouseXY(e) {
  if (IE) { // grab the x-y pos.s if browser is IE
    tempX = event.clientX + document.body.scrollLeft
    tempY = event.clientY + document.body.scrollTop
  } else {  // grab the x-y pos.s if browser is NS
    tempX = e.pageX
    tempY = e.pageY
  }  
  // catch possible negative values in NS4
  if (tempX < 0){tempX = 0}
  if (tempY < 0){tempY = 0}  
  // show the position values in the form named Show
  // in the text fields named MouseX and MouseY
  document.Show.MouseX.value = tempX
  document.Show.MouseY.value = tempY
  return true
}

function initialize()
{
	initTip();
	initPublisher();
	initMainDisplay();
	initButtonSet();
	addShowElement("notifyDiv");
	addShowElement("threadDiv");
        addShowElement("chatBox");
        loadMain('userhome');
}

function refreshInit()
{
	initPublisher();
	initMainDisplay();
	initChatBox();
	hideBoxes();
	initButtonSet();
}

function loadMain(page)
{
        new Ajax.Updater('mainDisplay','<?php echo base_url(); ?>index.php/'+page,{evalScripts:true})
}

function loadLocal(page)
{
        new Ajax.Updater('localdisplay','<?php echo base_url(); ?>index.php/'+page,{evalScripts:true})
}
function loadPage(page,tget)
{
        new Ajax.Updater(tget,'<?php echo base_url(); ?>index.php/'+page,{evalScripts:true})
}
function loadChatItem(request)
{
    loadTable(request,'chatcontent');
}
function loadPop(page)
{
      new Ajax.Request('<?php echo base_url(); ?>index.php/'+page,
      {
        onSuccess: function(transport){
          var response = transport.responseText || "no response text";
          showPop(response,tempX,tempY);
          }
      });
}

function updaterss(request)
{
    var xmlDoc;
    var tbl = document.getElementById('rss_show');
    if (window.DOMParser)
    {
        parser=new DOMParser();
        xmlDoc=parser.parseFromString(request.responseText,"text/xml");
    }
    else // Internet Explorer
    {
        xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async="false";
        xmlDoc.loadXML(request.responseText);
    }
    newitems = xmlDoc.getElementsByTagName('item');
    for(i=0;i<newitems.length;i++)
    {
        div =document.getElementById('rssset'+i);
        div.style.visibility = "visible";
        div = document.getElementById('rsstitle'+i);
        data = newitems[i].getElementsByTagName('link')[0].firstChild.nodeValue;
        div.innerHTML = "<a href='#' class='rss_link' onclick='loadLocal(\""+data+"\")'>"+newitems[i].getElementsByTagName('title')[0].firstChild.nodeValue + "</a>";
        div = document.getElementById('rsscontent'+i);
        div.innerHTML = newitems[i].getElementsByTagName('description')[0].firstChild.nodeValue;
        div = document.getElementById('rsslink'+i);
    }
}

function update(request)
{
    var xmlDoc;
    if (window.DOMParser)
    {
        parser=new DOMParser();
        xmlDoc=parser.parseFromString(request.responseText,"text/xml");
    }
    else // Internet Explorer
    {
        xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async=false;
        xmlDoc.loadXML(request.responseText);
    }
    data = xmlDoc.getElementsByTagName('data')[0];
    friends = data.getElementsByTagName('friends')[0];
    notifications = data.getElementsByTagName('notifications')[0];
    inbox = data.getElementsByTagName('inbox')[0];
    container = data.getElementsByTagName('container')[0];
    
    updateFriendList(friends);
    updateNotifications(notifications);
    updateThread(inbox);
    updateContainter(container);
}

function updateContainter(container)
{
    friend = container.getElementsByTagName('friend')[0];
    classinfo = container.getElementsByTagName('classinfo')[0];
    if(friend.firstChild.nodeValue == "yes")
    {
        updateFriendContainer();
    }
    if(classinfo.firstChild.nodeValue == "yes")
    {
        updateClassContent();
    }
}

function updateClassContent()
{
    loadPage("classroom/featuringlistcontainer","featuringclasscontent");
    loadPage("classroom/classsubscribe/0","subscribeclasscontent");
    loadPage("classroom/newclass/0","newclasscontent");
    loadPage("classroom/ownlist/0","ownclasslist");
}

function updateFriendContainer()
{
    loadPage("friend/friendlist/0", 'list');
    loadPage("friend/recievedlist/0", 'recieved');
    loadPage("friend/sentlist/0", 'sent');
}

function updateThread(inbox)
{
    tbutton = document.getElementById('threadButton');
    if(inbox.firstChild.nodeValue=="yes")
    {
        tbutton.setAttribute('class', 'threadLink_new');
        refreashThreadInbox()
    }
    else
    {
        tbutton.setAttribute('class', 'threadLink');
    }
}

function refreashThreadInbox()
{
    loadPage('thread/inboxlist', 'thread_inbox_container');
}
var nstrings = new Array();
function updateNotifications(notifications)
{
    notices = notifications.getElementsByTagName('notice');
    cnstring = new Array(notices.length);
    nlive = document.getElementById('notification_live');
    if(nlive == null) return;
    nbutton = document.getElementById('notifyButton');
    if(notices.length > 0)
    {
        nbutton.setAttribute('class', 'notifyLinkNew')
    }
    else
    {
        nbutton.setAttribute('class', 'notifyLink')
    }
        

    for(i=0;i<notices.length;i++)
    {
        cnstring[i] = notices[i].firstChild.nodeValue;
    }
    var shouldChange = (cnstring.length != nstrings.length);
    if(!shouldChange)
    {
        for(i=0;i<cnstring.length;i++)
        {
            if(nstrings.length <=0 || cnstring[i] != nstrings[i])
            {
                shouldChange = true;
            }
        }
    }
    if(shouldChange)
    {
        nlive.innerHTML = "";
        for(i=0;i<notices.length;i++)
        {
            div = document.createElement('div');
            message = notices[i].getElementsByTagName('message')[0].firstChild.nodeValue;
            link = notices[i].getElementsByTagName('link')[0].firstChild.nodeValue;
            date = notices[i].getElementsByTagName('date')[0].firstChild.nodeValue;
            div.innerHTML = '<a href="#" class="notification_link" onclick="loadLocal(\''+link+'\')">'+message+'</a>';
            div.setAttribute('class', 'notification_new');
            nlive.appendChild(div);
        }
    }
    nstrings = cnstring;
}

function handleNotificationShow()
{
    if(toggleShow(document.getElementById('notifyDiv')))
    {
        return;
    }
    new Ajax.Request('<?php echo base_url();?>index.php/notification/markread');
}

function setDefaultLoading(elemID)
{
    alert(elemID);
    var elem = document.getElementById(elemID);
    elem.innerHTML = "<span class='profile_label'>retrieving...</span>"
}


var friendList = new Array();
var chatbox;
function updateFriendList(friends)
{
    chatbox = document.getElementById('chatBox');
    users = friends.getElementsByTagName('user');
    for(i=0; i<users.length; i++)
    {
        if(document.getElementById('chat'+users[i].firstChild.nodeValue)!=null)
        {
            continue;
        }
        span = document.createElement('span');
        span.innerHTML = users[i].firstChild.nodeValue;
        span.setAttribute('class', 'chat_label');
        div = document.createElement('div');
        if(users[i].getAttribute('online')=='yes')
        {
            userid = users[i].getAttribute('uid');
            div.setAttribute('class', 'chat_listitem_online');
            span.innerHTML = '<a href="#" class="rss_link" onclick="addChatUser('+userid+')">'+users[i].firstChild.nodeValue+'</a>';
        }
        else
        {
            div.setAttribute('class', 'chat_listitem');
        }
        div.setAttribute('id', 'chat'+users[i].firstChild.nodeValue);
        div.appendChild(span);
        chatbox.appendChild(div);
    }
    divs = chatbox.getElementsByTagName('div');
    for(i=0; i<divs.length; i++)
    {
        id = divs[i].getAttribute('id');
        classval = divs[i].getAttribute('class');
        online = (classval=="chat_listitem_online")?"yes":"no";
        remove = true;
        for(j=0; j<users.length; j++)
        {

            if((id == ('chat'+users[j].firstChild.nodeValue)) && (online == users[j].getAttribute('online')))
            {
                remove = false;
            }
        }
        if(remove)
        {
            chatbox.removeChild(divs[i]);
        }
    }
}

function addChatUser(userid)
{    
   new Ajax.Request('<?php echo base_url();?>index.php/chat/chatitem/'+userid,{onComplete:function(request){loadTable(request,'chatcontent')}, evalScripts:true});
}

</script>

</head>

<body onLoad="initialize()" onResize="refreshInit()">
    <script>

<?php
    $opts = array(
                'url' => base_url().'index.php/periodicupdater'
                ,'frequency'=>3
                ,'complete'=>'update(request)');

    echo $this->ajax->periodically_call_remote($opts);
    echo ";";
?>
    
    </script>
<div id="mainDisplay" class="mainDisplay">
    
</div>
    <div id="notifyDiv" class="notify" >
    <script>
        loadPage('notification', 'notifyDiv');
    </script>
</div>
    <div id="threadDiv" class="thread" ></div>

<div class="chatBox" id="chatBox">
<div id="chatList"></div>
</div>

<div id="bottomLine" class="bottomLine">
<div class="chatboxlink" onMouseOver="showTip(windowHeight-90,30,'chat box (open/close)',false);"  
     onMouseOut="hideTip()" onClick="toggleShow(getElementById('chatBox'));">
<a href="#" class="chatboxbtn" >chat box</a></div></div>
<div  class="chatcontainer" id="chatcontainer">
<table border="0">
        <tr id="chatcontent"></tr>
</table>
</div>
<div id="upLine" class="logo">
  <img src="<?php echo base_url() ?>image/DL2.gif" width="210" height="88">
  <a href="#" id="notifyButton" onClick="handleNotificationShow()" onMouseOver="showTip(50,240,'notification',true);" onMouseOut="hideTip()" class="notifyLink">notifications</a>
  <a href="#" id="threadButton" onClick="loadLocal('thread')" onMouseOver="showTip(50,364,'thread inbox',true);" onMouseOut="hideTip()" class="threadLink">thread</a>
<div id="btnset" class="btnset">
 <a href="#" onMouseOver="showTip(50,windowWidth-200,'home',true);" onMouseOut="hideTip()" class="homeLink" onClick="loadMain('userhome');"></a>
 <a href="#" onMouseOver="showTip(50,windowWidth-150,'<?php echo "$data->first_name $data->last_name"; ?>',true);" onMouseOut="hideTip()" class="profileLink" onClick="loadLocal('profile');"></a>
 <a href="#" onMouseOver="showTip(50,windowWidth-110,'settings',true);" onMouseOut="hideTip()" class="settingsLink" onClick="loadLocal('settings');"></a>
 <a href="#" onMouseOver="showTip(50,windowWidth-60,'logout',true);" onMouseOut="hideTip()" class="logoutLink" onClick="window.location='<?php echo base_url(); ?>index.php/user/logout'"></a>
</div></div>
<div id="publishDiv" class="publisher" onClick="togglePublisher()" onMouseOut="hidePublisher()">
<?php
    red5_publisher($red5arr);
?>
</div>

</body>
</html>