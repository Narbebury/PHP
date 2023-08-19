<?php include 'template/header.php' ?>
<?php include 'template/footer.php'?>
<?php
// print_r($_POST)
    if (!isset($_POST['codigo'])) {
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?,signo = ? WHERE codigo = ? ");
    $resultado = $sentencia->execute([$nombre,$edad,$signo,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    }
    else {
        header('Location: index.php?mensaje=error');
    }
?>