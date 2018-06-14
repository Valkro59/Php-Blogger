//blogger/views/default/js/signup.js

$(document).ready(function (){

    $('#username').on('input', function(event){
        var username = event.target.value;

        if (username.length >3) {

        $.ajax({
            method: 'GET', // methode get dans les url
            url:'/Php-Blogger/ajax/checkuser.php?name='+username, //les ? permettent d'injecter des données dans l'url
        }).done(function (result){
           if(result.hasUser){
               $(event.target).addClass('is-invalid');
           } else {
               $(event.target).removeClass('is-invalid');
           }
        });
        } else {
            $(event.target).removeClass('is-invalid');
        }
    });
});


