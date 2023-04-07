<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.html');
}

$tipo = '';
$opcion = '';
$procesar = '';
$busqueda = false;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    // actualizar (act) - consultar (con) - eliminar (eli)
    $tipo = $_GET['t'];
    // todos (t) - codigo (c) - nombre (n) - empresa (e)
    $opcion = $_GET['op'];
    $procesar = $opcion . $tipo;
    $busqueda = true;
} else {
    echo "Error en la búsqueda";
    exit;
}

include('header.php');
if ($opcion=="t"){
    header('location: procesar.php');
}
echo "<br>";
echo "<form action='procesar.php' method='post'>";

    if ($opcion=="c"){?>
    <div class="mb-4">
        <label for="codigo">Buscar por código:</label>
        <input type="number" id="codigo" name="codigo"><br>
    </div>
<?php  
    }
    if ($opcion=="e"){?>
    <div class="mb-4">
        <label for="empresa">Buscar por empresa:</label>
        <input type="text" id="empresa" name="empresa"><br>
    </div>
<?php  
    }
    if ($opcion=='n'){?>
    <div class="mb-4">
        <label for="nombre">Buscar por nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
    </div>
    
<?php  
    }
echo "<input type='hidden' id='opciones' name='opciones' value='{$procesar}'><br>";
echo "<button type='submit' class='btn btn-primary btn-block mb-4'>Buscar</button>";
echo "</form>";
include('footer.php');