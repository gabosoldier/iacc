<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.html');
}

include('conexion.php');
include('insumo.php');

$codigo = '';
$insumo = new Insumo();
$ok = false;
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $codigo = $_GET["codigo"];
    $sql = "DELETE FROM insumos WHERE id = {$codigo}";
    
    $result = $mysqli->query($sql);
    if ($result==TRUE){
        $ok = true;
        $mensaje = "Registro eliminado correctamente";
    }else {
        $mensaje = "Ha ocurrido un problema";
    }
}

if (!empty($mensaje)){
    if (!$ok){
        echo "<div class='alert alert-WA'>";
        echo $mensaje;    
        echo "</div>";
    } else {
        echo "<div class='alert alert-WA'>";
        echo $mensaje;    
        echo "</div>";
    }
}