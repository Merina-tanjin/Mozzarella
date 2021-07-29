var x = document.getElementById("hidden_p");
x.hidden = true;
var str = x.innerText;
str = `data=` + str;
function sendData() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./cart.php?" + str, true);
  xhr.send();
  document.getElementById("close_btn").click();
}
