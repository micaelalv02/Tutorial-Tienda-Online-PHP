<?php

require '../vendor/autoload.php';

$pelicula = new classes\Pelicula;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {
        var_dump($_POST);

        if (empty($_POST['title'])) {
            exit('Completar titulo');
        }

        if (empty($_POST['description'])) {
            exit('Completar descripción');
        }

        if (empty($_POST['category_id'])) {
            exit('Seleccionar una categoría');
        }

        if (!is_numeric($_POST['category_id'])) {
            exit('Seleccionar una categoría válida');
        }

        $parametro = array(
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => updateImage(),
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'date' => date('YY-MM-DD')
        );

        $respuesta = $pelicula->registrar($parametro);
        var_dump($respuesta);
    }
}


function updateImage(){
    $folder=__DIR__.'/../upload/';

    $file=$folder.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$file);

    return $_FILES['image']['name'];
}