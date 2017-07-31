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


/*$(document).ready(function() {

    $('#loginform').click(function() {

        $.ajax({
            type: "POST",
            url: 'admin/login.php',
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(data)
            {
                if (data === 'Correct') {
                    window.location.replace('login/login.php');
                }
                else {
                    alert(data);
                }
            }
        });

    });
*/
