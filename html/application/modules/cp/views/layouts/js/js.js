document.onkeydown = function(){

if(window.event && window.event.keyCode == 116)
        { // Capture and remap F5
    window.event.keyCode = 505;
      }

if(window.event && window.event.keyCode == 505)
        { // New action for F5
    return false;
        // Must return false or the browser will refresh anyway
    }
}





function showsupport(){
var arr=new Array("users.gif","");

var div=document.getElementById("showsupport");
var num=Math.round(Math.random()*1);
if(num==0){
	//$X="<img src='application/modules/cp/layouts/scripts/img/"+arr[num]+" alt='Waiting Support '> ";
	} else{
	$X="";	
		}
 
div.innerHTML=$X;

setTimeout("showsupport()",1000);
	}


function popupWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}
