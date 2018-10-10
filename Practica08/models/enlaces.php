<?php


class Paginas{

    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador

    public static function enlacesPaginasModel($enlacesModel){
        //Validamos
        #echo "El enlace dice: ".$enlacesModel;
        if($enlacesModel == "ingresar" || $enlacesModel == "usuarios" || $enlacesModel == "editar" || $enlacesModel == "salir" ){
            //Mostramos el URL concatenado con la variable $enlacesModel
            if($enlacesModel=="salir"){
                session_start();//destrulle verifica la cesion 
                session_destroy();//destrulle la cesion
                $enlacesModel="ingresar";
            }
                $module = "views/modules/".$enlacesModel.".php";
            
        }

        //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
        else if($enlacesModel == "index"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "ok"){
            $module = "views/modules/registro.php";
        }
        else if($enlacesModel == "fallo"){
            $module = "views/modules/ingresar.php";
        }
        else if($enlacesModel == "cambio"){
            $module = "views/modules/usuario.php";
        }
        //Validar una LISTA BLANCA 
        else{
            $module = "views/modules/registro.php";
            #echo "ENTRA 8";
        }

        return $module;
    }

}


?>