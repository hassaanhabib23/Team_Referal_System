var urlString = window.location.href;
console.log(typeof (urlString));
var url = new URL(urlString);
var referalcode = url.searchParams.get("userid");
console.log(referalcode);
document.querySelector("#fieldstyle").disabled = true;
if (referalcode == null) {
    function input() {
        let username = document.querySelector("#usernamefield").value;
        document.querySelector("#fieldstyle").value = username;
    }
}
else {
    console.log(referalcode);
    document.querySelector("#fieldstyle").value = referalcode;
}
let userid = document.querySelector("#usernamefield").value;
console.log(userid);
let baseurl = "http://localhost/Team_Referal_system/sign_up.php";
let referallink = baseurl + "?userid=" + encodeURIComponent(userid);
localStorage.setItem("url",referallink);
