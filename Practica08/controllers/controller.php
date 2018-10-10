<?php

class MvcController{ 
    //Llamar a la plantilla
    public function pagina(){
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        include "views/template.php";
    }

    //Interacción con el usuario
    public static function enlacesPaginasController(){
        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php

        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "index";
        }

        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions

        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;
    }

    public function registroUsuarioController(){
        if(isset($_POST["usuarioRegistro"])){

            //Recibe a traves del metodo POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("usuario" => $_POST["usuarioRegistro"],
                                     "password" => $_POST["passwordRegistro"],
                                     "email" => $_POST["emailRegistro"]);

            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

            //Se imprime la respuesta en la vista
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("loaction:index.php");
            }
        }
    }
#AQUI TERMINA LA FUNCION  DE registroUsuarioController()
    public function login(){
         if(isset($_POST["usuarioLogin"])){

            //Recibe a traves del metodo POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email)
            $datosController = array("usuario" => $_POST["usuarioLogin"],
                                     "password" => $_POST["passwordLogin"]);

            
            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel), que en la clase "Datos" la funcion "registrousuariomodel" reciba en sus dos parametros los valores $datosController y el nombre de la tabla a conectarnos la cual es "usuarios"
            $respuesta = Datos::LoginUsuarioModel($datosController, "usuarios");

            //Se imprime la respuesta en la vista
          if($respuesta["usuario"] == $_POST["usuarioLogin"] && $respuesta["password"] == $_POST["passwordLogin"]){//si entra en login se crea una secion

            session_start();//inicio de secion 

            $_SESSION["validar"] = true;//se establece como verdadera la secion 

            header("location:index.php?action=usuarios");//redireciona a la pagina de usuarios

          }

          else{

            header("location:index.php?action=fallo");
            //si es la informacion correcta de login retornara un fallo 

          }

            }
        }

    
}

?>