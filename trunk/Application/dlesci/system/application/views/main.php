<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="<?php echo base_url() ?>style/atageffect.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>jscript/custom/validate.js"></script>

<script src="<?php echo base_url() ?>jscript/ajax/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/effects.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/dragdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>jscript/ajax/controls.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>jscript/custom/custom.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>jscript/custom/si.files.js"></script>

<script language="javascript">
	var wind=window.parent;
	var ie=wind.document.all;
	var dom=wind.document.getElementById;
	
	function showReg()
	{
		var	regElem = (dom)?wind.document.getElementById("regcontent") : ie? wind.document.all.regcontent : wind.document.regcontent
	    regElem.style.visibility=(dom||ie)? "visible" : "show";
	}
	
	function hideReg()
	{
		var	regElem = (dom)?wind.document.getElementById("regcontent") : ie? wind.document.all.regcontent : wind.document.regcontent
		regElem.style.visibility="hidden";
	}

</script>

<style>
    .page
{
	width:1000px;
	margin:0 auto;
}

.logo
{
	background-image:url(<?php echo base_url();?>image/index/DL.gif);
	background-repeat:no-repeat;
	background-position:top left;
	position:relative;
	left:0px;
	width:300px;
	height:120px;
}

.topBanner
{

}

.logincontent
{
	position:relative;
	width:700px;
	height:40px;
	padding:10px;
	padding-left:0px;
	border-bottom:solid #2999ca 1px;
}

.minibuttons
{
	position:relative;
	width:480px;
	height:50px;
	padding:10px;
	padding-left:200px;
}

.button
{
	border:solid #2999ca 1px;
	padding:10px;
	color: #FFF;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	background-color:#2999ca;
}

.button:hover
{
	border:1px solid #FC0;
}

.textbox
{
	border:solid #2999ca 1px;
	background-color:#FFF;
	padding:7px;
	color: #2999ca;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	width:200px;
}

#username
{
		padding:10px;
	background-image:url(<?php echo base_url();?>image/user_32d.png);
		width:150px;
	background-repeat:no-repeat;
	background-position:2px;
	padding-left:40px;
}

#password
{
			padding:10px;
	background-image:url(<?php echo base_url();?>image/index/login.png);
		width:150px;
	background-repeat:no-repeat;
	background-position:2px;
	padding-left:40px;
}

.textbox:hover
{
	border:1px solid #FC0;
}

.label
{
    color: #2999ca;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	text-decoration:none;
	line-height:15px;
}

.link
{
	color: #06F;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	text-decoration:none;
}

.link:hover
{
	color:#F90;
}

.container
{
	margin-left:300px;
}

.registerContent {
	padding:5px;
	padding-top:0px;

}

.registerHeader
{
	background-color:#2999ca;
	padding:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:#FFF;
	padding-left:70px;
	background-image:url(<?php echo base_url();?>image/biguser.png);
	background-repeat:no-repeat;
	background-position:20px;
}

.register
{
	border: medium solid #2999ca;
	background-color:#FFF;
	position: absolute;
	top: 104px;
	left: 494px;
	width: 430px;
}

.msgbox
{
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	width:60px;
}

.errormsg
{
    font-family: Verdana, Geneva, sans-serif;
	font-size:10px;
	padding:3px;
	color:#C30;
}

</style>
</head>
<body>
<div class="page">
<div class="topBanner">
<table><tr>
<td valign="top">
<div class="logo"></div>
</td>
<td valign="top">

    <div class="logincontent">
      <form method="post" action="<?php echo base_url() ?>index.php/user/login">
        <input name="username" type="text" class="textbox" id="username" />
        <input name="password" type="password" class="textbox" id="password" />
            <input type="submit" class="button" value="Login" />
            <input type="button" class="button" value="Register" onclick="showReg()" />
            <span class="errormsg"><?php if(isset ($msg)) echo $msg; ?></span>
      </form>
    </div>
      
      <div id="regcontent" class="register" style="visibility:hidden" >
        <div class="registerHeader">New User Registration</div>
        <div class="registerContent">

    <form method="post" action="<?php echo base_url()."index.php/user/register" ?>"
          onsubmit="return validateAll(this);">

       <table width="100%" border="0" cellspacing="5">
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td width="3%">&nbsp;</td>
           <td width="18%" align="right"><span class="label">Email  </span></td>
           <td width="66%">
           <span class="label">
               <input name="email" type="text" class="textbox " id="email" onmouseover="validate(this,'email')" value="<?php if(isset ($email)) echo $email; ?>" />
           </span></td>
           <td width="13%"><div id="mcheck"></div></td>
           <script type="text/javascript">
           <?php echo $this->ajax->observe_field('email'
                                                , array('url'=>base_url().'index.php/user/availability'
                                                , 'update'=>'mcheck'
                                                , 'frequency'=>'1'
                                                , 'with'=>'email'));?>
           </script>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">First name</span></td>
           <td><span class="label">
             <input name="fname" type="text" class="textbox" id="fname" value="<?php if(isset ($fname)) echo $fname; ?>"
             onkeyup="validate(this,'req')" onmouseover="validate(this,'req')" onselect="validate(this,'req')"/>
           </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">Last name </span></td>
           <td><span class="label">
             <input name="lname" type="text" class="textbox" id="lname" value="<?php if(isset ($lname)) echo $lname; ?>"
             onkeyup="validate(this,'req')" onmouseover="validate(this,'req')" onselect="validate(this,'req')"/>
           </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">Password</span></td>
           <td><span class="label">
             <input name="pass" type="password" class="textbox" id="pass" 
              onkeyup="validate(this,'pass',getElementById('pass'),6)" 
              onmouseover="validate(this,'pass',getElementById('pass'),6)"
              onselect="validate(this,'pass',getElementById('pass'),6)"/>
           </span></td>
           <td><div class="msgbox" id="result"></div></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label"> Confirmation</span></td>
           <td><span class="label">
             <input name="cpass" type="password" class="textbox" id="cpass" 
              onkeyup="validate(this,'pass',getElementById('pass'),6)" 
              onmouseover="validate(this,'pass',getElementById('pass'),6)"
              onselect="validate(this,'pass',getElementById('pass'),6)" />
           </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">Birthday</span></td>
           <td><span class="label">
              <select class="select" name="year" id="year">
            <?php for($year=date('Y');$year>date('Y')-100;$year--):?>
            <option value="<?php echo $year; ?>"> <?php echo $year; ?></option>
            <?php endfor ?>
          </select>
          <select class="select" name="month" id="month">
            <?php for($month=1;$month<=12;$month++):?>
            <?php if(strlen($month)==1) $mstr = "0".$month; else $mstr = $month; ?>
            <option value="<?php echo $month; ?>"> <?php echo $this->calendar->get_month_name($mstr); ?></option>
            <?php endfor ?>
          </select>
          <select class="select" name="day" id="day">
            <?php for($day=1;$day<=31;$day++):?>
            <option value="<?php echo $day; ?>"> <?php echo $day; ?></option>
            <?php endfor ?>
          </select>
           </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">Phone</span></td>
           <td><span class="label">
             <input name="pnumber" type="text" class="textbox" id="pnumber" value="<?php if(isset ($pnumber)) echo $pnumber; ?>"
              onkeyup="validate(this,'phone')" 
              onmouseover="validate(this,'phone')"
              onselect="validate(this,'phone')"/>
           </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"><span class="label">Sex</span></td>
           <td><span class="label">
             <input type="radio" name="sex" value="m" checked="checked" />
Male
<input type="radio" name="sex" value="f" />
Female </span></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td colspan="2" align="right"><span class="label">
             <img src="<?php echo base_url() ?>image/edit-indent.png" width="16" height="16" /> I hereby agree to the <a href="#" class="link">terms and conditions<br />
             <br />
             </a></span></td>
           <td>&nbsp;</td>
           </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="right"></td>
           <td align="right"><input type="reset" class="button" value="cancel" onclick="hideReg();"/><input type="submit" class="button" value="agree & register"/></td>
           <td>&nbsp;</td>
         </tr>
       </table>
         </form>
        

        
        </div>
</div>
  <p>&nbsp;</p>
  <p><img src="<?php echo base_url() ?>image/index/graphic_intro_01a.gif" width="467" height="488" /></p>
  </td>
</tr></table>         
</div>
</div>

</body>
</html>



  