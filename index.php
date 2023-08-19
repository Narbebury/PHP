<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("SELECT * FROM persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);

?>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col md-7 pt-4">
            <!-- Inicio Alerta -->
            <?php
            //Si existe la variable que llega via get y la variable falta
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Rellena todos los campos!</strong>
                </div>
            <?php
            }
            ?>

            <?php
            //Si existe la variable que llega via get y la variable falta
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Registrado!</strong> Se agregaron los datos
                </div>
            <?php
            }
            ?>

            <?php
            //Si existe la variable que llega via get y la variable falta
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Error!</strong> Vuelve a intentar
                </div>
            <?php
            }
            ?>

            <?php
            //Si existe la variable que llega via get y la variable falta
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Edición exitosa!</strong>
                </div>
            <?php
            }
            ?>

            <?php
            //Si existe la variable que llega via get y la variable falta
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Los datos fueron borrados!</strong>
                </div>
            <?php
            }
            ?>
            <!-- <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script> -->

            <!-- Fin Alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <div class="table-responsive aling-middle">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signo</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($persona as $dato) {

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $dato->codigo ?></td>
                                        <td><?php echo $dato->nombre ?></td>
                                        <td><?php echo $dato->edad ?></td>
                                        <td><?php echo $dato->signo ?></td>
                                        <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Estas seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo ?>>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col md-5 pt-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus require>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>