<?php

//login.php

require 'init.php';
require LIB_PATH . DS . 'user.php';

// echo password_hash(0101, PASSWORD_BCRYPT); // Crypter un mot de passe





$errors = [];
$username= $_POST['username'] ?? null;
$password= $_POST['password'] ?? null;



// Validation du formulaire
if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = authenticate($db, $username, $password);
    if($user)  {
    $_SESSION['user'] = $user;
    header('Location: index.php');
} else {
    $errors[] = 'Identifiant ou mot de passe invalide';
}
}
//Affichage de la vue
$title = "Page de connexion";

$styles = [BASE_URL . '/views/' . THEME . '/css/signin.css'];

include THEME_PATH . DS . 'login.phtml';