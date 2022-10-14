<?php
require '../../vendor/autoload.php';
$pelicula = new classes\Pelicula;
$category = new classes\Categoria; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $resultado = $pelicula->GetById($id);

    if (!$resultado) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
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
                        <a href="../pedidos/index.php" class="btn">Pedidos</a>
                    </li>
                    <li class="active">
                        <a href="index.php" class="btn">Peliculas</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="main">
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>Datos de la pelicula</legend>
                    <form action="../acciones.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php $resultado['id'] ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input value="<?php print $resultado['title'] ?>" type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="description" id="" cols="3" required><?php print $resultado['description'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">--SELECCIONE--</option>
                                        <?php
                                        $infocategory = $category->mostrar();
                                        $cantidad = count($infocategory);
                                        for ($x = 0; $x < $cantidad; $x++) {
                                            $item = $infocategory[$x];
                                        ?>
                                            <option value="<?php print $item['id'] ?>" <?php print $resultado['category_id'] == $item['id'] ? 'selected' : '' ?>>
                                                <?php print $item['name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" class="form-control" name="image">
                                    <input type="hidden" name="img_tmp" value="<?php print $resultado['image'] ?>" width="50">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input value="<?php print $resultado['price'] ?>" type="text" class="form-control" name="price" placeholder="0.00" required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" name="action" value="Actualizar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>

                    </form>
                </fieldset>
            </div>
        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>