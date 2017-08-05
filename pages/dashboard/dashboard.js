$(function() {

    // get login form data and send it to php and get response back
    var form = $('#loginForm');

    form.submit(function (e) {

        e.preventDefault();
        $('#error').html('');

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: {action: "doLogin", data: form.serialize()},
            success: function (data) {

                var obj = jQuery.parseJSON(data);
                
                if(obj['success']){
                    
                }else{
                    $('#error').html(obj['message'])
                }

                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });

        return false;
    });





});
