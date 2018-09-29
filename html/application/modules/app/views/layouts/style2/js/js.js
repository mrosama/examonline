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
