<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comparacion</title>
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="public/css/comparatuva.css" th:href="@{/css/index.css}">
</head>
<div class="text-center contenido h-100 mx-auto">
        <h3>Elige 2 dispositivos a comparar por 'RAM'</h3>
        <small>Tienes que elegir 2 dispositivos a comparar<br>En caso de tener la misma ram se muestran los dos dispositivos</small>
    <br><br>
        <form class="col-12  text-center" method="post" action="index.php?controller=Celulares&action=verificarComparacion">
        <?php if (isset($mensaje))
        {//Con este if se ejecuta un scrpit basico de alerta de javascript
        ?>

           <?php echo "<script> alert('".$mensaje."'); </script>" ?>

        <?php
        //Se cierra llave del if
        } 
        ?>
            <label>Dispositivo 1</label>
            <select class="form-control" name="opcion1" required>
                <option></option>
                <?php 
                //Se inicia el foreach para mostrar datos en los select
                //Se muestra el id,marca y nombre del dispositivo
                foreach ($celulares as $datos) 
                { 
                ?>
                    <option value="<?php echo $datos['id_celular']?>"><?php echo $datos['marca']." ".$datos['nombre']?></option>
                <?php } ?>    
            </select>
            
            <label>Dispositivo 2</label>
            <select class="form-control" name="opcion2" required>
                <option></option>
                <?php foreach ($celulares as $datos) { 
                ?>
                    <option value="<?php echo $datos['id_celular']?>"><?php echo $datos['marca']." ".$datos['nombre']?></option>
                <?php } ?>    
            </select>
            <br><br>
            <input type="submit" class="btn btn-primary" name="" value="Buscar">
        </form class="col-12">
        <br>
        <a href="index.php?controller=Celulares&action=inicio" class="btn btn-secondary" >Volver</a>
        <br><br>
        <?php
        //Este if determina si una variable está definida y no es null
        if (isset($comparacion))
            //Con este foreach se imprime los datos del dispositivo que tiene mas ram
            foreach ($comparacion as $key) {
                if ($key['ram']==$resultado) {
        ?>
        <h6><strong>El que tiene mas ram es</strong></h6>
        <div class="container h-100 mx-auto">
            <h6>ID: <?php echo $key['id_celular']?></h6>
            <h6>NOMBRE: <?php echo $key['nombre']?></h6>
            <h6>MARCA: <?php echo $key['marca']?></h6>
            <h6>MODELO: <?php echo $key['modelo']?></h6>
            <h6>RAM: <?php echo $key['ram']?></h6>
            <h6>PROCESADORES: <?php echo $key['procesador']?></h6>
            <h6>Fecha Registro: <?php echo $key['fecha_registro']?></h6>
        </div>
        <?php            
                }
            }   
        ?>

        
</div>
</div>
</body>
</html>
