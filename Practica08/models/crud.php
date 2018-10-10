<?php

require_once("conexion.php");

class Datos extends Conexion{
        
    #Registro de usuarios
    public static function registroUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES(:usuario, :password, :email) ");
        
        $stmt->bindParam(":usuario", $datosModel["usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();

    }
    /*AQUI SE HARA LA CONSULTA PARA SABER SI EXISTE EN LA BASE DE DATOS EL USUARIO*/
    static public function LoginUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario"); 
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

        $stmt->close();

    }

}