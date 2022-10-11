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

    public function registrar($param)
    {
        $sql = "INSERT INTO `peliculas`(`title`, `description`, `image`, `price`, `category_id`, `date`) VALUES (:title,:description,:image,:price,:category_id,:date)";
        
        $resultado = $this->connect->prepare($sql);

        $array = array(
            ":title" => $param['title'],
            ":description" => $param['description'],
            ":image" => $param['image'],
            ":price" => $param['price'],
            ":category_id" => $param['category_id'],
            ":date" => $param['date']
        );

        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($param)
    {
        $sql = "UPDATE `peliculas` SET `title`=:title,`description`=:description,`image`=:image,`price`=:price,`category_id`=:category_id,`date`=:date WHERE `id`=:id";

        $resultado = $this->connect->prepare($sql);

        $array = array(
            ":title" => $param['title'],
            ":description" => $param['description'],
            ":image" => $param['image'],
            ":price" => $param['price'],
            ":category_id" => $param['category_id'],
            ":date" => $param['date'],
            ":id" => $param['id']
        );

        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id, $param)
    {
        $sql = "DELETE FROM `peliculas` WHERE `id`=:id";

        $resultado = $this->connect->prepare($sql);

        $array = array(
            ":id" => $param['id']
        );

        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        $sql="SELECT peliculas.id, title, description, image, name, price, date, state FROM peliculas 
        INNER JOIN categorias ON peliculas.category_id = categorias.id ORDER BY peliculas.id DESC";

        $resultado=$this->connect->prepare($sql);

        if($resultado->execute()){
            return $resultado->fetchAll();
        }else{
            return false;
        }
    }
    

    public function GetById($id,$param)
    {
        $sql="SELECT * FROM `peliculas` WHERE `id`=:id";

        $resultado=$this->connect->prepare($sql);
        
        $array=array(
            ":id"=>$param['id']
        );

        if($resultado->execute($array)){
            return $resultado->fetch();
        }else{
            return false;
        }
    }
}
