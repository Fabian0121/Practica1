<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="public/css/registro.css" th:href="@{/css/index.css}">
</head>
<div class="text-center container">
    <br><br>
        <form class="col-12  text-center" method="post" action="index.php?controller=Celulares&action=verificarRegistro">
            <h3>Registra un dispositivo</h3>
            <br><br>
            <label for="floatingInput">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre Ejmp: S10"  required>
            <br>
            <label for="floatingInput">Marca</label>
            <input class="form-control" type="text" name="marca" placeholder="Marca Ejemp: Samsung" required>
            <br>
            <label for="floatingInput">Modelo</label>
            <input class="form-control" type="text" name="modelo" placeholder="Modelo Ejemp:sm-g973f" required>
            <br>
            <label for="floatingInput">RAM</label>
            <input class="form-control" type="number" name="ram" placeholder="Ram" required>
            <br>
            <label for="floatingInput">Procesador</label>
            <input class="form-control" type="text" name="procesador" placeholder="Procesador" required>
            <br>
            <label for="floatingInput">Fecha</label>
            <input class="form-control" type="date" name="fechaRegistro" value="21/02/2021">
            <br>
            <input type="submit" class="btn btn-outline-primary" name="" value="Registrar" required>
        </form class="col-12">
        <br>
        <a href="index.php?controller=Celulares&action=inicio" class="btn btn-outline-secondary">Volver</a>
        <br>    
</div>
</body>
</html>