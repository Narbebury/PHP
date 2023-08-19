<?php include 'template/header.php' ?>
<?php include 'template/footer.php'?>

<?php 
    if (!isset($_GET['codigo'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare("SELECT * FROM persona WHERE codigo = ?");
    $sentencia->execute([$codigo]);
    //guardo los datos que trae el codigo
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus require value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus require value="<?php echo $persona->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus require value="<?php echo $persona->signo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>