<?php

namespace classes;

class Categoria
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
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_EMULATE_PREPARES => false
            )
        );
    }


    public function mostrar()
    {
        $sql="SELECT * FROM `mica`.`categorias`";

        $resultado = $this->connect->prepare($sql);

        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }
    }
}
