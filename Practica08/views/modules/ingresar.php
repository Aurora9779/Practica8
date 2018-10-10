<h1>Iniciar Sesion</h1>

<form method="post">

    <input type="text" placeholder="usuario" name="usuarioLogin" required>

    <input type="password" placeholder="contraseña" name="passwordLogin" required>
    <input type="submit" value="Ingresar">

</form>

<?php

//Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
$registro = new MvcController();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$registro -> login();


			 ?>