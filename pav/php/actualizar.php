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
    $sql = "SELECT * FROM insumos WHERE id = {$codigo}";
    
    $result = $mysqli->query($sql);
    if ($result==TRUE){
        while($row = $result->fetch_assoc()) {
            $codigo = $row['id'];
            $insumo->setEmpresa($row['empresa']);
            $insumo->setNombre($row['nombre']);
            $insumo->setPrecio($row['precio']);
            $insumo->setCantidad($row['cantidad']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $insumo = new Insumo();
    $insumo->setEmpresa($_POST["empresa"]);
    $insumo->setNombre($_POST["nombre"]);
    $insumo->setPrecio($_POST["precio"]);
    $insumo->setCantidad($_POST["cantidad"]);
    $codigo = $_POST["codigo"];

    $sql = "UPDATE insumos SET empresa = '{$insumo->getEmpresa()}', nombre = '{$insumo->getNombre()}', precio = {$insumo->getPrecio()}, cantidad = {$insumo->getCantidad()} WHERE id = {$codigo}";

    $result = $mysqli->query($sql);
    if ($result==TRUE){
        $ok = true;
        $mensaje = "Datos actualizados correctamente";
    }else {
        $mensaje = "Ha ocurrido un problema";
    }
}

include('header.php');

?>
    <br>
    <form action="actualizar.php" method="POST">
      
      <label for="codigo">Código:</label>
      <input type="text" id="codigo" name="codigo" value="<?php echo $codigo ?>" readonly><br>

      <label for="empresa">Empresa:</label>
      <input type="text" id="empresa" name="empresa" value="<?php echo $insumo->getEmpresa() ?>"><br>

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $insumo->getNombre() ?>"><br>

      <label for="cantidad">Cantidad:</label>
      <input type="number" id="cantidad" name="cantidad" value="<?php echo $insumo->getCantidad() ?>"><br>

      <label for="precio">Precio unidad:</label>
      <input type="number" id="precio" name="precio" value="<?php echo $insumo->getPrecio() ?>"><br>

      <input type="submit" class="btn btn-primary btn-block mb-4" value="Actualizar insumo">
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