<?php

//user.php


function authenticate(PDO $pdo, $username, $password)
{
    // on vérifie si l'utilisateur existe dans la table
    // puis on vérifie le mot de passe avec php
    // si c'est ok on retourne la ligne correspondante
    //sinon on retourne false

    $sql = 'SELECT * FROM user WHERE username=?';
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(array($username))){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
    unset($user['password']);
    return $user;

        }
    }
    return false;
}


