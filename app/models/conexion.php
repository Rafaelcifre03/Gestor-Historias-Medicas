<?php

include('config.php');

class Conexion extends PDO
{
    private static $instance;
    public $db;

    public function __construct() {
        require_once("Config.php");
        try {   
            $this->db = new PDO('mysql:host=' . Config::$db_host . ';dbname=' . Config::$db_name . '', Config::$db_username, Config::$db_password);
            $this->db->exec("set names utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            include("view/500.html");
            die();
        }
    }
/*
    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try{
            parent::__construct('mysql:host=' . Config::$db_host . ';dbname=' . Config::$db_name . '', Config::$db_username, Config::$db_password);
            parent::exec("set names utf8");
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
   } 

    //singleton.
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    //fin singleton.
*/
}