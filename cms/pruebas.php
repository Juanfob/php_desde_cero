<?php

echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo str_replace('index.php', '', __FILE__);
echo "<br>";
$Uri = explode('/', substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']) -1));
echo var_dump($Uri);