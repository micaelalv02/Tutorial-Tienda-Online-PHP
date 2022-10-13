<?php

namespace classes;

use PDOException;

class Pelicula
{
    private $config;
    private $connect = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');
        $this->connect = new \PDO($this->config['dns'],$this->config['usuario'],$this->config['clave'],
            array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,\PDO::ATTR_EMULATE_PREPARES => false
            ));
    }

    public function registrar($param)
    {
        //var_dump($param);
        $sql = "INSERT INTO `mica`.`peliculas` (`title`, `description`, `image`, `price`, `category_id`, `date`) VALUES ('".$param['title']."','".$param['description']."','".$param['image']."','".$param['price']."','".$param['category_id']."','".$param['date']."')";
        var_dump($sql);
        $resultado = $this->connect->prepare($sql);
        
        $array = array(
            ":title" => $param['title'],
            ":description" => $param['description'],
            ":image" => $param['image'],
            ":price" => $param['price'],
            ":category_id" => $param['category_id'],
            ":date" => $param['date']
        );
        try{
            
            $resultado->execute(); 
            //var_dump($resultado->execute());
            return true; 

        }catch(PDOException $e){
            var_dump($e);
        return false;
        }
    }

    public function actualizar($param)
    {
        $sql = "UPDATE `mica`.`peliculas` SET `title`=:title,`description`=:description,`image`=:image,`price`=:price,`category_id`=:category_id,`date`=:date WHERE `id`=:id";

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

    public function eliminar($id)
    {
        $sql = "DELETE FROM `mica`.`peliculas` WHERE `id`=:id";

        $resultado = $this->connect->prepare($sql);

        $array = array(
            ":id" => $id
        );

        if ($resultado->execute($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        /*$sql="SELECT peliculas.*, categorias.name AS category_title, categorias.id AS category_id FROM `mica`.`peliculas` 
        INNER JOIN `mica`.`categorias` ON peliculas.category_id = categorias.id ORDER BY peliculas.id DESC";*/
        
        $sql="SELECT peliculas.id, title, description, image, name, price, date, state FROM `mica`.`peliculas` 
        INNER JOIN `mica`.`categorias` ON peliculas.category_id = categorias.id ORDER BY peliculas.id DESC";
        

        $resultado=$this->connect->prepare($sql);

        if($resultado->execute()){ 
            return $resultado->fetchAll((\PDO::FETCH_ASSOC));
        }else{
            return false;
        }
    }
    
    public function GetById($id)
    {
        $sql="SELECT * FROM `mica`.`peliculas` WHERE `id`=:id";

        $resultado=$this->connect->prepare($sql);
        
        $array=array(
            ":id"=>$id
        );

        if($resultado->execute($array)){
            return $resultado->fetch();
        }else{
            return false;
        }
    }
}
