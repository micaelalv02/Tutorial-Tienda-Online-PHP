<?php

session_start();
require 'funciones.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $pelicula = new classes\Pelicula;
    $resultado = $pelicula->GetById($id);

    if (!$resultado) {
        header('Location: index.php');
    }

    if (isset($_SESSION['carrito'])) { //SI EL CARRITO EXISTE
        //SI EL PELICULA EXISTE EN EL CARRITO
        if (array_key_exists($id, $_SESSION['carrito'])) {
            updatePelicula($id);
        } else {
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            addPelicula($resultado, $id);
        }
    } else {
        //  SI EL CARRITO NO EXISTE
        addPelicula($resultado, $id);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kawschool Store</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Kawschool Store</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="" class="btn">CARRITO <span class="badge">0</span></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container" id="main">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pelicula</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $indice => $value) {
                        $total =floatval($value['price']) * floatval($value['cantidad']); ?>
                        <tr>
                            <form action="actualizarcarrito.php" method="POST">
                                <td><?php print $value['title'] ?></td>
                                <td>
                                    <?php
                                    $image = 'upload/' . $value['image'];
                                    if (file_exists($image)) {
                                    ?>
                                        <img src="<?php print $image; ?>" class="imagen">
                                    <?php } else { ?>
                                        <img src="assets/imagenes/not-found.jpg" class="imagen">
                                    <?php } ?>
                                </td>
                                <td><?php print $value['price'] ?></td>
                                <td>
                                    <input type="hidden" name="id" value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                </td>

                                <td><?php print $total ?></td>

                                <td>
                                    <button type="submit" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-refresh"></span></button>
                                    <a href="eliminarcarrito.php?id=<?php print $value['id'] ?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </form>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7">No hay productos en el carrito.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>