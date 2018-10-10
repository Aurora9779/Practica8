

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include ("valida_sesion.php");
session_unset();
session_destroy();
header("Location: ./ingresar.php");
?>
</body>
</html>