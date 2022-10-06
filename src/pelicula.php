<?php

namespace classes;

class Pelicula
{
    private $config;
    private $connect = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');
        $this->connect = new \PDO(
            $this->config['dns'],
            $this->config['usuario'],
            $this->config['clave'],
            array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            )
        );
    }

    public function registrar($param){
        $sql = "INSERT INTO `peliculas`(`title`, `description`, `image`, `price`, `category_id`, `date`, `state`) VALUES (:title,:description,:image,:price,:category_id,:date,:state)";
        $resultado=$this->connnect->prepare($sql);

        $array=array(
            ":title"=>$param['title'],
            ":description"=>$param['description'],
            ":image"=>$param['image'],
            ":price"=>$param['price'],
            ":category_id"=>$param['category_id'],
            ":date"=>$param['date'],
            ":state"=>$param['state'],
        );

        if($resultado->execute($array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar(){
        


    }

    public function eliminar()
    {
    }

    public function mostrar()
    {
    }

    public function mostrarPorId()
    {
    }
}
