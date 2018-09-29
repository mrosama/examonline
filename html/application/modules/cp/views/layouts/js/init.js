 function showdate(){
    var digitalclock1=document.getElementById("digitalclock1");

    calendar = new Date();
    day = calendar.getDay();
    month = calendar.getMonth();
    date = calendar.getDate();
    year = calendar.getYear();
    if (year < 1000)
    year+=1900
    cent = parseInt(year/100);
    g = year % 19;
    k = parseInt((cent - 17)/25);
    i = (cent - parseInt(cent/4) - parseInt((cent - k)/3) + 19*g + 15) % 30;
    i = i - parseInt(i/28)*(1 - parseInt(i/28)*parseInt(29/(i+1))*parseInt((21-g)/11));
    j = (year + parseInt(year/4) + i + 2 - cent + parseInt(cent/4)) % 7;
    l = i - j;
    emonth = 3 + parseInt((l + 40)/44);
    edate = l + 28 - 31*parseInt((emonth/4));
    emonth--;
    var dayname = new Array ("الأحد", "الاثنين", "الثــلاثــاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
    var monthname = 
    new Array ("يناير","فبراير","مارس","أبريل","مــايو","June","July","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبير" );
 digitalclock1 +=innerHTML=dayname[day];
	
 // document.write(dayname[day]);
  //if (date< 10) document.write("0" + date );//اليوم
   //else document.write(" - "+date + " - ");
    
 //  document.write(monthname[month] + " ");//الشهر
 //  document.write("  - "+year);
     if (date< 10) digitalclock1.innerHTML+="0" + date;
    else digitalclock1.innerHTML+=" - "+date + " - ";
	digitalclock1.innerHTML+=monthname[month] + " ";
		digitalclock1.innerHTML+="  - "+year;
    //-->
	}
 



var alternate=0
var standardbrowser=!document.all&&!document.getElementById

if (standardbrowser)
document.write('<form name="tick" dir="rtl"><input type="text" name="tock" size="6"></form>')

function show(){
if (!standardbrowser)
var clockobj=document.getElementById? document.getElementById("digitalclock") : document.all.digitalclock
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var dn="AM"

if (hours==12) dn="PM" 
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0) hours=12
if (hours.toString().length==1)
hours="0"+hours
if (minutes<=9)
minutes="0"+minutes

if (standardbrowser){
if (alternate==0)
document.tick.tock.value=hours+" : "+minutes+" "+dn
else
document.tick.tock.value=hours+"   "+minutes+" "+dn
}
else{
if (alternate==0)
clockobj.innerHTML=hours+"<font color='#DDBD27'>&nbsp;:&nbsp;</font>"+minutes+" "+""+dn+"</sup>"
else
clockobj.innerHTML=hours+"<font color='#4E3C03'>&nbsp;:&nbsp;</font>"+minutes+" "+""+dn+"</sup>"
}
alternate=(alternate==0)? 1 : 0
setTimeout("show()",1000)
 
}
window.onload=show;

//////////////////////////////////////////////////////////////////////////
 


function view(ID,src){
var layer=document.getElementById("div"+ID);

if(layer.style.display=="none"){
document.images[src].src="../application/modules/cp/layouts/scripts/img/minus.gif";
layer.style.display="";
}
else {
document.images[src].src="../application/modules/cp/layouts/scripts/img/plus.gif";
layer.style.display="none";
}
  
}


function view2(ID,src){
var layer2=document.getElementById("divt"+ID);

if(layer2.style.display=="none"){
document.images[src].src="../application/modules/cp/layouts/scripts/img/minus.gif";
layer2.style.display="";
}
else {
document.images[src].src="../application/modules/cp/layouts/scripts/img/plus.gif";
layer2.style.display="none";
}

}