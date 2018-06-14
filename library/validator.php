<?php

//library/validator.php

function validUsername($name, $min = 4, $max = 20) {
    if (preg_match('/^[a-zA-Z][a-zA-Z0-9]{'.$min.','.$max.'}/', $name)) { // entre '' c'est l'expression régulière créée grâce à Regex101 en ligne
        return true;
    }
    return false;
}

function validEmail($email, $min = 10, $max = 80) {
    if (validMinMax($email, $min, $max)) {
        return false;
    }if (strpos($email,'@')===false) {
        return false;
    }if (strpos($email,'.')===false) {
        return false;
    }
    return true;
}

function validPassword($password, $confirmPassword, $min = 4, $max = 4) {
    if (validMinMax($password, $min, $max)) {
        return false;
    }
    return $password === $confirmPassword;
}

function validMinMax($str, $min, $max) {
    $len = strlen($str);
    return $len < $min || $len > $max;
}