<?php

require 'init.php';
require LIB_PATH . DS . 'user.php';




$errors = [];

$firstname= $_POST['firstname'] ?? null;
$lastname = $_POST['lastname'] ?? null;
$username= $_POST['username'] ?? null;
$email= $_POST['email'] ?? null;
$password= $_POST['password'] ?? null;
$confirmPassword= $_POST['password'] ?? null;

if ($firstname === null){$errors[] = 'Prenom non rempli';}
if ($lastname === null){$errors[] = 'Nom non rempli';}
if ($username === null){$errors[] = 'Pseudo non rempli';}
if ($email === null){$errors[] = 'Email non rempli';}
if ($password === null){$errors[] = 'Mot de passe non rempli';}
if ($confirmPassword !== $password){$errors[] = 'Mot de passe non confirmé';}

if(empty($errors)){
    $user = createUser($db, $firstname, $lastname, $username, $username, $password);
    if ($user = 1){
        echo 'ok';
    } else {
        echo 'Le pseudonyme est déjà attribué';
    }
}




// Validation du formulaire
if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = createUser($db, $firstname, $lastname, $username, $email, $password);
    if($user)  {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        $errors[] = 'Formulaire d\'inscription non rempli correctement';
    }
}
//Affichage de la vue
$title = "Page d'inscription";

$styles = [BASE_URL . '/views/' . THEME . '/css/signin.css'];

include THEME_PATH . DS . 'registration.phtml';