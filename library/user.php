<?php

//user.php

function hasSession() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

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

function signup(PDO $pdo, $username, $email, $password, $firstname, $lastname ){
    //$today = date("Y-m-d H:i:s");

    $sql = 'INSERT INTO user VALUES (NULL, :username, :email, :pass, :firstname, :lastname, :createdAt)';
    $stmt = $pdo->prepare($sql);

    $data = [
        'username' => $username,
        'email' => $email,
        'pass' =>password_hash($password, PASSWORD_BCRYPT),
        'firstname' => $firstname,
        'lastname' => $lastname,
        'createdAt' => date('Y-m-d H:i:s')
    ];
    if ($stmt->execute($data)) {
        return $stmt->rowcount();
    }
    return 0;
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
