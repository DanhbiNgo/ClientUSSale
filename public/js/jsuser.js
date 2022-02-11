function showsearch(){
document.getElementById("menu").style.display="none";
document.getElementById("search-click").style.display="block";
var sh = document.getElementsByClassName('sh-search')[0];
if(sh.innerHTML != ""){
document.getElementsByClassName('sh-search')[0].style.display='block';
}
}
function clsearch(){
document.getElementById("menu").style.display="block";
document.getElementById("search-click").style.display="none";
document.getElementsByClassName('sh-search')[0].style.display='none';
}