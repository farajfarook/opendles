// JavaScript Document
var shortPass = "<span style='color:red'>short</span>"
var badPass = "<span style='color:red'>bad</span>"
var goodPass = "<span style='color:orange'>good</span>"
var strongPass = "<span style='color:green'>strong</span>"


// Declaring required variables
var digits = "0123456789";
// non-digit characters which are allowed in phone numbers
var phoneNumberDelimiters = "()- ";
// characters which are allowed in international phone numbers
// (a leading + is OK)
var validWorldPhoneChars = phoneNumberDelimiters + "+";
// Minimum no of digits in an international phone no.
var minDigitsInIPhoneNumber = 10;

function isInteger(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function trim(s)
{   var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not a whitespace, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (c != " ") returnString += c;
    }
    return returnString;
}

function stripCharsInBag(s, bag)
{   var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function checkInternationalPhone(strPhone){
var bracket=3
strPhone=trim(strPhone)
if(strPhone.indexOf("+")>1) return false
if(strPhone.indexOf("-")!=-1)bracket=bracket+1
if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
var brchr=strPhone.indexOf("(")
if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}


function passwordStrength(password,username)
{
    score = 0 
    
    //password < 4
    if (password.length < 6 ) { return shortPass }
    
    //password == username
 //   if (password.toLowerCase()==username.toLowerCase()) return badPass
    
    //password length
    score += password.length * 4
    score += ( checkRepetition(1,password).length - password.length ) * 1
    score += ( checkRepetition(2,password).length - password.length ) * 1
    score += ( checkRepetition(3,password).length - password.length ) * 1
    score += ( checkRepetition(4,password).length - password.length ) * 1

    //password has 3 numbers
    if (password.match(/(.*[0-9].*[0-9].*[0-9])/))  score += 5 
    
    //password has 2 sybols
    if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)) score += 5 
    
    //password has Upper and Lower chars
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  score += 10 
    
    //password has number and chars
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  score += 15 
    //
    //password has number and symbol
    if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/))  score += 15 
    
    //password has char and symbol
    if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/))  score += 15 
    
    //password is just a nubers or chars
    if (password.match(/^\w+$/) || password.match(/^\d+$/) )  score -= 10 
    
    //verifing 0 < score < 100
    if ( score < 0 )  score = 0 
    if ( score > 100 )  score = 100 
    
    if (score < 34 )  return badPass 
    if (score < 68 )  return goodPass
    return strongPass
}


// checkRepetition(1,'aaaaaaabcbc')   = 'abcbc'
// checkRepetition(2,'aaaaaaabcbc')   = 'aabc'
// checkRepetition(2,'aaaaaaabcdbcd') = 'aabcd'

function checkRepetition(pLen,str) {
    res = ""
    for ( i=0; i<str.length ; i++ ) {
        repeated=true
        for (j=0;j < pLen && (j+i+pLen) < str.length;j++)
            repeated=repeated && (str.charAt(j+i)==str.charAt(j+i+pLen))
        if (j<pLen) repeated=false
        if (repeated) {
            i+=pLen-1
            repeated=false
        }
        else {
            res+=str.charAt(i)
        }
    }
    return res
}

function echeck(str) 
{
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		
		if (str.indexOf(at)==-1){
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    return false
		 }

 		 return true					
	}

function req(str)
{
	return (str!=null)&&(str!="");
}

function makeNoError(elem)
{
	elem.style.borderColor = "#2999ca";
	elem.style.background = "white";
}

function makeError(elem)
{
	elem.style.borderColor = "red";
	elem.style.background = "#FF9"
}

function validate(elem,check,para1,para2)
{
	if(check == "email")
	{
		if(req(elem.value)&&echeck(elem.value))
		{
			makeNoError(elem);
			return true;
		}
		else
		{
			makeError(elem);
			return false;
		}
	}
	if(check == "req")
	{
		if(req(elem.value))
		{
			makeNoError(elem);
                        return true;
		}
		else
		{
			makeError(elem);
                        return false;
		}
	}
	if(check == "pass")
	{
		if(req(elem.value)&&(elem.value.length >= para2)&&(elem.value==para1.value))
		{
			makeNoError(elem);
			makeNoError(para1);
                        return true;
		}
		else
		{
			makeError(elem);
			makeError(para1);
                        return false;
		}
	}
	if(check=="phone")
	{
		if(checkInternationalPhone(elem.value))
		{
			makeNoError(elem);
                        return true;
		}
		else
		{
			makeError(elem);
                        return false;
		}					   
	}
}



function validateAll(formx)
{
    var elems = formx.elements;
    var returner = true;
    for (i = 0; i < elems.length; i++) 
    {
                var elem = elems[i];
                if(elem.name == "email")
		{
			if(!validate(elem,'email'))
			{
				returner = false;
			}
		}
		else if(elem.name == "pnumber")
		{
			if(!validate(elem,'phone'))
			{
				returner = false;
			}
		}
		else if(elem.name == "pass")
		{
			if(!validate(elem,'pass',document.getElementById('cpass'),6))
			{
				returner = false;
			}
		}
		else if(elem.name == "cpass")
		{
			if(!validate(elem,'pass',document.getElementById('cpass'),6))
			{
				returner = false;
			}
		}
		else if(elem.type == "textbox")
		{
			if(!validate(elem,'req'))
			{
				returner = false;
			}
		}
    }
    return returner;
}