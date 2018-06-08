<?php

//login.php

require 'init.php';


// echo password_hash(0101, PASSWORD_BCRYPT); // Crypter un mot de passe






$username= $_POST['username'] ?? null;
$username= $_POST['password'] ?? null;



// Validation du formulaire
if($_SERVER['REQUEST_METHOD']==='POST'){


}

//Affichage de la vue
$title = "Page de connexion";

$styles = [BASE_URL . '/views/' . THEME . '/css/signin.css'];

include THEME_PATH . DS . 'login.phtml';