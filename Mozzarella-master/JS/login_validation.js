function form_validation(){

    

    var my_form = document.forms.index_form;
    my_form.onsubmit=function(){
        var element_count =document.getElementsByClassName("index_label").length;
        const labels =Array.from(document.getElementsByClassName("index_label")) ;
        const inputs =Array.from(document.getElementsByClassName("index_input")) ;
        var flag = false;
        for( var i=0;i<element_count;i++ ){
            if(labels[i].innerText==="Employee Type:"){
                flag=true;
                break;
            
            }
            if(inputs[i].value =="" ){

                alert(labels[i].innerText + " field can not be empty");
                return false;
            }
        }

        if(flag){
           
            var button_count=document.getElementsByClassName("radio").length;
            const rbuttons =Array.from(document.getElementsByClassName("radio")) ;
            if( !rbuttons[0].checked && !rbuttons[1].checked && !rbuttons[2].checked && !rbuttons[3].checked ){
                alert("Employee Type must be selected");
                return false;
            }
        }
    };



}

window.onload = function(){
	form_validation();
};