<?php
class conexion{
    public function conectar(){
        define('server',"localhost");
        define('db',"empresa");
        define('user',"root");
        define('password',"");
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND> 'SET NAMES utf8');
        try{
            $con=new PDO("mysql:host=".server.";dbname=".db,user,password,$opc);
            return $con;
        } catch(Exception $e){
            die("Error en la conexión: ".$e->getMessage());
        }
    }
}