<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.html');
}

include('conexion.php');

$sql = "Select * from insumos";
$procesar = '';
$vcodigo = '';
$vnombre = '';
$vempresa = '';
$opc = 'con';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $procesar = $_POST['opciones'];
    $opc = substr($procesar, 1, 3);
    echo $_POST['opciones'];
    if (isset($_POST['codigo'])) {
        $vcodigo = $_POST['codigo'];
        $sql = $sql . " where id = {$vcodigo}";
    }
    if (isset($_POST['nombre'])) {
        $vnombre = $_POST['nombre'];
        $sql = $sql . " where nombre like '%{$vnombre}%'";
    }
    if (isset($_POST['empresa'])) {
        $vempresa = $_POST['empresa'];
        $sql = $sql . " where empresa like '%{$vempresa}%'";
    }
}

include('header.php');
echo "<br>";
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Empresa</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
<?php
if ($result = $mysqli->query($sql)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $codigo = $row["id"];
        $empresa = $row["empresa"];
        $nombre = $row["nombre"];
        $cantidad = $row["cantidad"];
        $porecio = $row["precio"];
        echo "<tr>";
        echo "<th scope='row'>{$codigo}</th>";
        echo "<td>{$empresa}</td>";
        echo "<td>{$nombre}</td>";
        echo "<td>{$cantidad}</td>";
        echo "<td>{$porecio}</td>";
        if ($opc=='act'){
            echo "<td><a href='actualizar.php?codigo={$codigo}'>Actualizar</a></td>";
            echo "<td></td>";
        } else if ($opc=='eli'){
            echo "<td></td>";
            echo "<td><a href='eliminar.php?codigo={$codigo}'>Eliminar</a></td>";
        } else {
            echo "<td></td>";
            echo "<td></td>";
        }
        echo "</tr>";
    }
} else {
    echo "<p>Sin resultados...</p>";
}
?>        
  </tbody>
</table>
<script>
    function irActualizar(codigo) {
        alerrt('ok');
    }
</script>
<?php
include('footer.php'); 
?>