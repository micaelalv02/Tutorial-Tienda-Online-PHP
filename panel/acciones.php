<?php

/*print '<pre>';
print_r($_POST); 
print_r($_FILES);*/

require '../vendor/autoload.php';

$pelicula = new classes\Pelicula;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['action'] === 'Registrar') {


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
            'image' => uploadImage(),
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'date' => date('Y-m-d')
        );

        $respuesta = $pelicula->registrar($parametro);

        if ($respuesta) {
            header('Location: peliculas/index.php');
        } else {
            print('Error al registrar la pelicula');
        }
    }

    if ($_POST['action'] === 'Actualizar') {

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
            'price' => $_POST['price'],
            'category_id' => $_POST['category_id'],
            'date' => date('Y-m-d'),
            'id' => $_POST['id']

        );

        if (!empty($_POST['img_tmp'])) {
            $parametro['image'] = $_POST['img_tmp'];
        }


        if (!empty($_POST['image']['name'])) {
            $parametro['image'] = uploadImage();
        }


        $respuesta = $pelicula->actualizar($parametro);

        if ($respuesta) {
            header('Location: peliculas/index.php');
        } else {
            print('Error al actualizar la pelicula');
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];

    $respuesta = $pelicula->eliminar($id);

    if ($respuesta) {
        header('Location: peliculas/index.php');
    } else {
        print('Error al eliminar la pelicula');
    }
}




function uploadImage()
{
    $folder = __DIR__ . '/../upload/';

    $file = $folder . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $file);

    return $_FILES['image']['name'];
}
