var urlString = window.location.href; 
console.log(typeof(urlString));
var url = new URL(urlString);
var referalcode = url.searchParams.get("userid");
console.log(referalcode);
if(referalcode==null){
    function myfunc(){
        let name=document.querySelector("#name").value;
        document.querySelector("#input").value=name;
    }
}
let userid="";
let baseurl="http://localhost/Team_Referal_system/test.php";
let referallink=baseurl+"?userid="+encodeURIComponent(userid);
