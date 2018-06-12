//blogger/views/default/js/signup.js

$(document).ready(function (){

    $.ajax({
        method: 'GET',
        url:'/Php-Blogger/ajax/checkuser.php',
    }).done(function (result){
        alert(result);
    });

});


