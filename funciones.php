<?php

function addPelicula($resultado, $id, $cantidad=1){
    $_SESSION['carrito'][$id]=array(
        'id'=>$resultado['id'],
        'title'=>$resultado['title'],
        'image'=>$resultado['image'],
        'price'=>$resultado['image'],
        'cantidad'=>$cantidad
    );
}

function updatePelicula($id,$cantidad=FALSE){
    if($cantidad){
        $_SESSION['carrito'][$id]['cantidad']=$cantidad;
    }else{
        $_SESSION['carrito'][$id]['cantidad']+=1;
    }
}

function calcularTotal(){

}

function cantidadDePeliculas(){
    
}


?>