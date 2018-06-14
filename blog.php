<?php
require 'init.php';
require LIB_PATH . DS . 'blog.php';


$title = 'Blog';
$articles = getArticles($db,0,3);

include THEME_PATH . DS . 'blog.phtml';