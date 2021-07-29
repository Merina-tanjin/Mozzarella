function saveTxt(id) {
    var dcp=document.getElementById("dcp_"+id);
    var userInput=dcp.innerText;
    var blob = new Blob([userInput], { type: "text/plain;charset=utf-8" });
    saveAs(blob, "order.txt");
    return;
  }

  var hidden=document.getElementsByClassName("hidden");
    for(var i=0;i<hidden.length;i++){
        hidden[i].hidden=true;
    }