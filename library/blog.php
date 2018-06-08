<?php

//library/blog.php
/**
 *
 * Return all articles.
 *
 * @param PDO $pdo
 * @return bool|PDOStatement
 */

function getArticles(PDO $pdo) { //On peut typer la db choisie ici avec PDO
    $sql = 'SELECT * FROM article WHERE status = 1';
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); // fetchAll pour récupèrer tout les éléments;
}
