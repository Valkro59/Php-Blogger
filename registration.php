<?php

require 'init.php';
require LIB_PATH . DS . 'user.php';
require LIB_PATH . DS . 'validator.php';



$errors = [];

$firstname= $_POST['firstname'] ?? null;
$lastname = $_POST['lastname'] ?? null;
$username= $_POST['username'] ?? null;
$email= $_POST['email'] ?? null;
$password= $_POST['password'] ?? null;
$confirmPassword= $_POST['confirmPassword'] ?? null;


// Validation du formulaire
if($_SERVER['REQUEST_METHOD']==='POST'){

    if (!validUsername($username,3,12)) {
        $errors[]='Identifiant incorrect';
    }

    if (!validEmail($email)) {
        $errors[]='Email incorrect';
    }
    if (!validPassword($password, $confirmPassword)) {
        $errors[]='Mot de passe invalide ou ne correspond pas';
    }
    if (empty($errors)) {

        //Nettoyage des données
        $username = strip_tags($username);
        $email= strip_tags($email);
        $password= strip_tags($password);

        if (signup($db,$username, $email, $password, $firstname, $lastname) === 1){
        // echo $db->lastInsertId();
            $user = authenticate($db, $username, $password);

            if($user){
                $_SESSION['user'] = $user;
             header('location: index.php');
            }
        }
    }
}
//Affichage de la vue
$title = "Page d'inscription";

$styles = [BASE_URL . '/views/' . THEME . '/css/signin.css'];

include THEME_PATH . DS . 'registration.phtml';