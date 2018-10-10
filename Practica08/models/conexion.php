<?php

class Conexion{
	public static $base_de_datos="";
    public static function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=practica08", "root", "usbw");
        return $link;
    }
   

}

