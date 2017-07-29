/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function checkDatabase(){
	console.log("CheckDatabase");
	
	$.ajax({
            type: 'POST',
            url: 'database.php',
            data: {action: 'check_database', data: null}
        })
        .done(function(response){
             
            // show the response
			var obj = jQuery.parseJSON(response);
			console.log(obj);
			
			console.log(obj['error'])
            if(obj['error']){
				//alert(obj['message'])
							}else{
				//alert("Initialization successful")
			}


             
        })
        .fail(function() {
         
            // just in case posting your form failed
           // alert( "Posting failed." );
             
        });
	
		
}



$(document).ready(function(){
$("#login").click(function(){
var username = $("#username").val();
var password = $("#password").val();
// Checking for blank fields.
if( username =='' || password ==''){
$('input[type="text"],input[type="password"]').css("border","2px solid red");
$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
alert("Please fill all fields...!!!!!!");
}else {
$.post("login.php",{ username: username, password:password},
function(data) {
if(data=='Invalid username or password.......') {
$('input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
$('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
alert(data);
}else if(data=='username or Password is wrong...!!!!'){
$('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
alert(data);
} else if(data=='Successfully Logged in...'){
$("form")[0].reset();
$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
alert(data);
} else{
alert(data);
}
});
}
});
})