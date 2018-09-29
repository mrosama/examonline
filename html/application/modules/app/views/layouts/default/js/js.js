//js document

function addBookmark(title,url) {
if(url==""){
	url=document.URL;
	}	
	
	
if (window.sidebar) {
// Mozilla Firefox Bookmark
 
window.sidebar.addPanel(title, url,"");
} else if( window.external ) {
// IE Favorite
 
window.external.AddFavorite( url, title);
}
else if(window.opera && window.print) {
// Opera Hotlist
return true; }
}



 function popupWindow(mypage, myname, w, h, scroll) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
	win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}


function popup(content,w,h)
{
 var newWind = window.open("", "advert","scrollbars=1,resizable=1,status=0,menubar=1,height="+h+",width="+w+"");
 with(newWind.document){
 open();
 write(content);
 close();
 }
}




	function log_out()
{
	ht = document.getElementsByTagName("body");
	
	ht[0].style.filter = "progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)";

	if (confirm('هل ترغب في تسجيل الخروج'))
	{
		return true;
	}
	else
	{
		ht[0].style.filter = "";
		return false;
	}
}
///////////////////////////////
function move(val){
if (val==1){
document.getElementById("newsbar").direction="right";
document.getElementById("newsbar").start();
}
if(val==2){
document.getElementById("newsbar").stop();
}
if(val==3){
document.getElementById("newsbar").direction="left";
document.getElementById("newsbar").start();
}

if(val==4){
document.getElementById("newsbar").start();
}

}
 
 
 
 
 function setHomepage()
{
 if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
  document.body.setHomePage('http://'+document.location.host);
 
    }
    else if (window.sidebar)
    {
    if(window.netscape)
    {
         try
   {  
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
         }  
         catch(e)  
         {  
    		 
			alert("متصفحك محمى لا يمكن ضبط صفحتنا الرئيسية لديك, يمكنك عمل ذلك يدويا\n إذا أردت أن تفتح تلك الخاصيه اتبع الخطوات\n اكتب فى شريط العنوان\n about:config \n  ثم قم بتغيير هذا الاختيار لديك \n signed.applets.codebase_principal_support to true \n تنبيه عليك الحذر فى التعامل معها بحرص");
         }
    } 
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
    prefs.setCharPref('browser.startup.homepage','http://'+document.location.host);
 }
}
 
