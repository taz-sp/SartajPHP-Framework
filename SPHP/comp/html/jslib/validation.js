function getVal(tagid,type){
var browser=navigator.appName;
var b_version=navigator.appVersion;
var version=parseFloat(b_version);
var val1='';
obj1 = document.getElementById(tagid);

switch(browser){
case 'Microsoft Internet Explorer':{
if(type=='TextField'){
val1 = obj1.getAttribute('value');
}
else if(type=='TextArea'){
val1 = obj1.innerHTML;
}
else if(type=='Select'){
val1 = obj1.options[obj1.selectedIndex].value;
}
break;
}

default:{
if(type=='TextField'){
val1 = obj1.value;
}
else if(type=='TextArea'){
val1 = obj1.value;
}
else if(type=='Select'){
val1 = obj1.options[obj1.selectedIndex].value;
}
break;
}

}// end switch
if(val1==null){
	val1 = '';
	}
return val1;
}

function checkmax(ctlText){
var obj1;
var val1;
var msg;
var type;
var returnval = true;
var limit;

for(var c in ctlText){
obj1 = document.getElementById(c);
type = ctlText[c][1];
msg = ctlText[c][0];
limit = ctlText[c][2];
val1 = getVal(c,type);
if(val1.length > limit){
returnval = false;
alert("Please Type less then " + limit + "  chracters in " + msg);
obj1.focus();
break;
}

}
return returnval;

}

function checkmin(ctlText){
var obj1;
var val1;
var msg;
var type;
var returnval = true;
var limit;

for(var c in ctlText){
obj1 = document.getElementById(c);
type = ctlText[c][1];
msg = ctlText[c][0];
limit = ctlText[c][2];
val1 = getVal(c,type);
if(val1!='' && val1.length < limit){
returnval = false;
alert("Please Type more then " + limit + "  chracters in " + msg);
obj1.focus();
break;
}
}
return returnval;

}

var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
function checkEmail(e)
{
val1 = e; var returnval = true;
if(val1!=''){
returnval=emailfilter.test(val1);
}
return returnval;
}

function checkemails(ctlText){
var obj1;
var val1;
var msg;
var type;
var returnval = true;
for(var c in ctlText){
obj1 = document.getElementById(c);
type = ctlText[c][1];
msg = ctlText[c][0];
val1 = getVal(c,type);
if(checkEmail(val1)==false ){
returnval = false;
alert(ctlText[c][0] + " should be a valid email");
obj1.focus();
break;
}

}
return returnval;

}

function validNum(e)
{
sText = e;
   var ValidChars = "-0123456789.";
   var IsNumber=true;
   var Char;


   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
	  //alert(i);
      Char = sText.charAt(i);
	  //alert(ValidChars.indexOf(Char));
      if (ValidChars.indexOf(Char) == -1)
         {
         IsNumber = false;
        break;
         }
      }
   return IsNumber;
   }

function checknums(ctlText){
var obj1;
var val1;
var msg;
var type;
var returnval = true;

for(var c in ctlText){
obj1 = document.getElementById(c);
type = ctlText[c][1];
msg = ctlText[c][0];
val1 = getVal(c,type);
if(validNum(val1)==false ){
returnval = false;
alert(ctlText[c][0] + " should be a valid Number");
obj1.focus();
break;
}

}
return returnval;

}

function checkTextEmpty(ctlText){
var obj1;
var val1;
var msg;
var type;
var returnval = true;
for(var c in ctlText){
obj1 = document.getElementById(c);
type = ctlText[c][1];
msg = ctlText[c][0];
val1 = getVal(c,type);
if(val1 == ''){
returnval = false;
alert(msg + " can not Empty");
obj1.focus();
break;
}

}
return returnval;

}
