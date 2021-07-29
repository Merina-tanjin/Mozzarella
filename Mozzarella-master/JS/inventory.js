document.getElementById("hidden_div").hidden = true;

function sendData(id) {
  if (document.getElementById("inp_" + id).value != "") {
    var x = parseInt(document.getElementById("inp_" + id).value);
    var y = parseInt(document.getElementById("amount_" + id).innerText);
    var newAmount = x + y;
    var data = [id, newAmount];
    var sendData = JSON.stringify(data);
    document.getElementById("hidden_txt").value = sendData;
    //alert(typeof(sendData));
    document.getElementById("hidden_btn1").click();
  } else {
    alert("Empty Input");
  }
}

function addNewInventory() {
  var name = document.getElementById("inp_name");
  var amount = document.getElementById("inp_amount");
  var pc = document.getElementById("inp_pc");
  if (name.value != "" && amount.value != "" && pc.value != "") {
    var data = [name.value, amount.value, pc.value];
    var sendData = JSON.stringify(data);
    document.getElementById("hidden_txt").value = sendData;
    //alert(sendData);
    document.getElementById("hidden_btn2").click();
  } else {
    alert("Fill All Values");
  }
}
