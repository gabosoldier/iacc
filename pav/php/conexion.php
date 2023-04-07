<?php

$server = 'localhost:3306';
$user = 'root';
$pass = '123456';
$db = 'semana9';

$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");
