<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Busqueda</title>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="public/css/busqueda.css" th:href="@{/css/index.css}">
</head>
<div class="text-center contenido1 center-block">
<div class="text-center contenido center-block mx-auto">
        <h3>Elige la fecha de la semana a buscar</h3>
        <small>Tienes que poner la fecha de inicio y una fecha final para obtener los resultados</small>
    <br><br>
        <form class="col-12  text-center form" method="post" action="index.php?controller=Celulares&action=busquedaPorFecha">
            <label>Fecha inicio</label>
            <input class="form-control" type="date" name="fecha1" value="" required>
            <label>Fecha final</label>
            <input class="form-control" type="date" name="fecha2" value="" required>
            <br><br>
            <input type="submit" class="btn btn-outline-primary" name="" value="Buscar">
        </form class="col-12">
        <br>
        <a href="index.php?controller=Celulares&action=inicio" class="btn btn-outline-secondary" >Volver</a>
        <br>
        <br>
        <?php
            //Si no se encuentra nada se imprime estatus
            if (isset($estatus)) {
               echo "$estatus";
            }
            //Si hay registro se ejecuta est IF para recorra los registros y los imprima
            if (isset($celulares)) {
                foreach ($celulares as $key) {
            ?>
    <div class="container h-100 mx-auto">
            <h6>ID: <?php echo $key['id_celular']?></h6>
            <h6>NOMBRE: <?php echo $key['nombre']?></h6>
            <h6>MARCA: <?php echo $key['marca']?></h6>
            <h6>MODELO: <?php echo $key['modelo']?></h6>
            <h6>RAM: <?php echo $key['ram']?></h6>
            <h6>PROCESADORES: <?php echo $key['procesador']?></h6>
            <h6>Fecha Registro: <?php echo $key['fecha_registro']?></h6>
        <?php
                //es el contador que se declaron en el controller este cuenta cuantas vueltas da el foreach y registra la cantidad de dispositivos que se recuperan
                $cantidad++;
                //Se cierra llave del foreach
        ?>
    </div>
        <?php
                }
        ?>
             <br><h6>Total de dispositivos registrados en los dias <?php echo "$fechaInicio"?> y <?php echo "$fechaFin"?> SON : <?php echo "$cantidad"?></h6>
        <?php 
        //Se cierra llave del if          
            }
        ?>
</div>
</div>
</body>
</html>
