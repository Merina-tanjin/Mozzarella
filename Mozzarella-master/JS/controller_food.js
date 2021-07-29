document.getElementById("hidden_div").hidden = true;

function sendData(id) {
  if (document.getElementById("inp_" + id).value != "") {
    var newAmount = parseInt(document.getElementById("inp_" + id).value);
    var data = [id, newAmount];
    var sendData = JSON.stringify(data);
    document.getElementById("hidden_txt").value = sendData;
    //alert(sendData);
    document.getElementById("hidden_btn1").click();
  } else {
    alert("Empty Input");
  }
}

function addNewItem() {
  var name = document.getElementById("inp_name");
  var price = document.getElementById("inp_price");
  var type = document.getElementById("inp_type");
  if (name.value != "" && price.value != "" && type.value != "") {
    var data = [name.value, price.value, type.value];
    var sendData = JSON.stringify(data);
    document.getElementById("hidden_txt").value = sendData;
    //alert(sendData);
    document.getElementById("hidden_btn2").click();
  } else {
    alert("Fill All Values");
  }
}
