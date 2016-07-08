var getSize=localStorage.getItem('size');
function sendToServer() {
var dataToSend = {};
var tell = $("input[name='tell']").val();
var email = $("input[name='email']").val();
var adress = $("input[name='adress']").val();
var quantity = $("input[name='quantity']").val();
dataToSend['tell'] = name;
dataToSend['email'] = email;
$.ajax({
        url: "mail.php",
        type: "POST",
        data: "tell="+tell + "&"+ "email="+email+ "&"+ "adress="+adress+ "&"+ "quantity="+quantity+ "&"+ "size="+getSize, 
        success: function(result){
            //alert("sucess");
	    console.log(result);
        },
        error:function(error){
            //alert("failure");
        
        }
    });
}
