<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.html');
}

include('conexion.php');
include('insumo.php');

$ok = false;
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $insumo = new Insumo();
    $insumo->setEmpresa($_POST["empresa"]);
    $insumo->setNombre($_POST["nombre"]);
    $insumo->setPrecio($_POST["precio"]);
    $insumo->setCantidad($_POST["cantidad"]);
    //echo $insumo->getEmpresa();

    $sql = "INSERT INTO insumos (empresa, nombre, precio, cantidad) VALUES ('{$insumo->getEmpresa()}', '{$insumo->getNombre()}', {$insumo->getPrecio()},{$insumo->getCantidad()})";

    $result = $mysqli->query($sql);
    if ($result==TRUE){
        $ok = true;
        $mensaje = "Datos ingresados correctamente";
    }else {
        $mensaje = "Ha ocurrido un problema";
    }
}

include('header.php');

?>
    <br>
    <form action="crear.php" method="POST">
      
      <label for="empresa">Empresa:</label>
      <input type="text" id="empresa" name="empresa"><br>

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre"><br>

      <label for="cantidad">Cantidad:</label>
      <input type="number" id="cantidad" name="cantidad"><br>

      <label for="precio">Precio unidad:</label>
      <input type="number" id="precio" name="precio"><br>

      <input type="submit" class="btn btn-primary btn-block mb-4" value="Crear insumo">
    </form>

<?php
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

include('footer.php'); 
?>