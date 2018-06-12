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
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // stmt pour statement
        if ($user && password_verify($password, $user['password'])) {
        unset($user['password']);
        return $user;

        }
    }
    return false;
}

function createUser(PDO $pdo, $username, $email, $password, $firstname, $lastname ){
    $today = date("Y-m-d H:i:s");

    $sql = 'INSERT INTO user(username, email, password, firstname, lastname, created_at  ) VALUES (
?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(array($username, $email, password_hash($password,PASSWORD_BCRYPT), $firstname, $lastname, $today))) {
        $isok = $stmt->rowCount();
        return $isok;
    }
}

function isUserExists($pdo, $username){
    $stmt =$pdo->prepare('SELECT username FROM user WHERE username = ?');
    if ($stmt->execute(array($username))){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user !== false){
            return true;
        }
    }
    return false;
}
