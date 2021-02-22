<!<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="public/css/login.css" th:href="@{/css/index.css}">
</head>
<body>
<div class="text-center container">
        <h1>PRACTICA 1</h1><smal>Elige una de las opciones</smal>
        <br><br>
        <a href="index.php?controller=Celulares&action=comparacion" type="button" class="btn btn-outline-primary" ><i class="fas fa-fighter-jet"></i>  Comparativa entre 2 celulares </a><br><br>
		<a href="index.php?controller=Celulares&action=busqueda" type="button" class="btn btn-outline-success"><i class="fas fa-search"></i> Busqueda de registro</a><br><br>
		<a href="index.php?controller=Celulares&action=registro" type="button" class="btn btn-outline-secondary"><i class="fas fa-mobile-alt"></i> Registro de nuevo celular</a>

</div>
</body>
</html>