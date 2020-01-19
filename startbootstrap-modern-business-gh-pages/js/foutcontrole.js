
function wijzig()
{
var ok = true;
if (document.getElementById("naam").value==""){
document.getElementById("naamVerplicht").innerHTML="Gelieve een naam in te vullen";
ok=false;
}
else{
document.getElementById("naamVerplicht").innerHTML="";
}

if (document.getElementById("paswoord").value==""){
document.getElementById("paswoordVerplicht").innerHTML="Gelieve een paswoord in te vullen";
ok=false;
}
else{
document.getElementById("paswoordVerplicht").innerHTML="";
}

if (document.getElementById("paswoord").value != "") {
var string=document.getElementById("paswoord").value;

var filter=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

if ( filter.test(string)){
document.getElementById("paswoordControle").innerHTML="";


}
else{
 document.getElementById("paswoordControle").innerHTML="Ongeldig paswoord, bevat minstens 1 cijfer en 1 hoofdletter en kleine letter, minimum 8 characters";
ok=false;

}
}


if (document.getElementById("paswoordConfirm").value==""){
document.getElementById("paswoordConfirmVerplicht").innerHTML="Gelieve een bevestigingspaswoord in te vullen";
ok=false;
}
else{
document.getElementById("paswoordConfirmVerplicht").innerHTML="";

if (!(document.getElementById("paswoordConfirm").value==document.getElementById("paswoord").value)){
document.getElementById("paswoordConfirmVerplicht").innerHTML="bevestigingspaswoord en paswoord komen niet overeen";
ok=false;
}
else{
document.getElementById("paswoordConfirmVerplicht").innerHTML +="";
}
}

if (ok==true){
document.inlogpagina.submit();
}
}
