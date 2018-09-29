j(document).ready(function(){
    j("#newpw").keyup(function () {
        var pwvalue = j("#newpw").val();
        var pwstrength = getPasswordStrength(pwvalue);
        j("#pwstrength").html("Strong");
       j("#pwstrengthpos").css("background-color","#33CC00");
        if (pwstrength<75) {
            j("#pwstrength").html("Moderate");
            j("#pwstrengthpos").css("background-color","#ff6600");
        }
        if (pwstrength<30) {
            j("#pwstrength").html("Weak");
            j("#pwstrengthpos").css("background-color","#cc0000");
        }
        j("#pwstrengthpos").css("width",pwstrength);
        j("#pwstrengthneg").css("width",100-pwstrength);
    });
});

function getPasswordStrength(pw){
    var pwlength=(pw.length);
    if(pwlength>5)pwlength=5;
    var numnumeric=pw.replace(/[0-9]/g,"");
    var numeric=(pw.length-numnumeric.length);
    if(numeric>3)numeric=3;
    var symbols=pw.replace(/\W/g,"");
    var numsymbols=(pw.length-symbols.length);
    if(numsymbols>3)numsymbols=3;
    var numupper=pw.replace(/[A-Z]/g,"");
    var upper=(pw.length-numupper.length);
    if(upper>3)upper=3;
    var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
    if(pwstrength<0){pwstrength=0}
    if(pwstrength>100){pwstrength=100}
    return pwstrength;
}

function showStrengthBar() {
    document.write('<table align="center"><tr><td width="102"><div id="pwstrengthpos" style="position:relative;float:left;width:0px;background-color:#33CC00;border:1px solid #000;border-right:0px;"></div><div id="pwstrengthneg" style="position:relative;float:right;width:100px;background-color:#efefef;border:1px solid #000;border-left:0px;">&nbsp;</div></td><td><div id="pwstrength">Weak</div></td></tr></table>');
}