<?php

include('conexion.php');

session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "select id from usuarios where usuario = '$username' and password = '$password'";
    $result = $mysqli->query($sql);

    if ($result==TRUE){
        $_SESSION['username'] = $username;
        header('Location: inicio.php');
        exit;
    } else {
        $mensaje = 'Nombre de usuario o contraseña incorrectos.';
    }
}

if (isset($mensaje)){
    echo $mensaje;
}