<?php
require 'app/Models/Conexion.php';
require 'app/Models/Celulares.php';
use Practica1\Celulares;
use Practica1\Conexion;

class CelularesController
{
    public function __construct(){
        if ($_GET["action"]=="inicio") {
            require 'app/Views/Inicio.php';
        }
    }
    //****COMPARAR QUE DISPOSITIVOS TIENE MAS RAM"X"****
    //Esta opcion muestra la vista para hacer la comparacion de ram de los dispositivos
    function comparacion(){
        //Llamamos a la clase estatica para mostrar todos los dispositivos que hay
        //Se muestran en un select para hacer la comparacion
        $celulares=Celulares::mostrarDispositivos();
        require 'app/Views/Comparativa.php';
    }
    //En esta funcion se realiza la comparacion de los dispositivos
    function verificarComparacion(){
        //Variables a usar
        $id1=$_POST['opcion1'];
        $id2=$_POST['opcion2'];
        //Con este if se verifica que el dispositivo a usar no sea el mismo
        if ($id1==$id2) {
            //Mensaje que manda al script en compariva para mostrar
            $mensaje= "Elige 2 dispositivos que no sean el mismo";
            //Se llama esta funcion estatica para volver a mostrar los dispositivos en el select
            $celulares=Celulares::mostrarDispositivos();
            //llamamos a la vista
            require 'app/Views/Comparativa.php';
        }else{
        //En estas variables se guardan los datos de la ram
        $ram1;
        $ram2;
        //Aqui se guardan cual dispositivo tiene mas ram
        $resultado;
        $mensaje;
        //Se llama esta funcion estatica para pasarle datos y recibir los datos de los dispositivos a comparar
        $comparacion=Celulares::mostrar($id1,$id2);
            foreach ($comparacion as $key) {
                //En este if se guardan los datos de las ram para compararla
                if ($key['id_celular']==$id1) {

                    $ram1=$key['ram'];
                }else{
                    $ram2=$key['ram'];
                }              
            }
            //En este if se comparan los tamaños de ram 
            if ($ram1>$ram2) {
                //Le damos un valor a ram
                $resultado=$ram1;
                //Se llama esta funcion estatica para volver a mostrar los dispositivos en el select
                $celulares=Celulares::mostrarDispositivos();
                require 'app/Views/Comparativa.php';
            }else{
                //Le damos un valor a ram
                $resultado=$ram2;
                //Se llama esta funcion estatica para volver a mostrar los dispositivos en el select
                $celulares=Celulares::mostrarDispositivos();
                require 'app/Views/Comparativa.php';
                //En caso que sean iguales
            }if($ram1==$ram2){
                $resultado=$ram2;
                $mensaje="Son iguales";
                $celulares=Celulares::mostrarDispositivos();
                
            }
        }

    }
    //****AVISAR CUANDO UNA MARCA YA TENGA MAS DE 10 MODELOS REGISTRADOS****
    //Esta traera la vista de registro
    function registro(){
        require 'app/Views/Registro.php';
    }
    //Esta funcion registrara el dispositivo y nos dira si esa marca ya tiene mas de 10 dispositivos registrados
    function verificarRegistro(){
        //Variables que se van a usar
        //En esta se guarda la marca
        $marca=$_POST['marca'];
        //
        $celulares = new Celulares();
        $celulares->nombre=$_POST['nombre'];
        $celulares->marca=$_POST['marca'];
        $celulares->modelo=$_POST['modelo'];
        $celulares->ram=$_POST['ram'];
        $celulares->procesador=$_POST['procesador'];
        $celulares->fechaRegistro=$_POST['fechaRegistro'];
        $celulares->crear();
        $contador=0;
        $mensaje;
        require 'app/Views/Inicio.php';
        //Se manda a ver cuantos registros de la marca que se registro reciente
        $celulares=Celulares::mostrarMarcas($marca);
        //Se usa el contador
        foreach ($celulares as $key) {
            $contador++;
        }
        //Si se tiene mas de 10 registros manda el mensaje
        if ($contador>10) {
           echo "La marca ".$marca." tiene mas de 10 registros";
        }





    }
    //--**SABER CUANTOS CELULARES SE REGISTARON EN "X" SEMANA Y QUE MODELOS FUERON**--\\
    //Esta funcion muestra la vista para elegir la fecha para mostrar los registros
    function busqueda(){
        require 'app/Views/Busqueda.php';
    }
    //Esta nos devuelve el resultado de la busqueda
    function busquedaPorFecha(){
        //Variables a usar
        $fechaInicio=$_POST['fecha1'];
        $fechaFin=$_POST['fecha2'];
        //Esta variable se usara como contador
        $cantidad=0;
        //Llamos a la clase estatica y le pasamos los datps del formulario
        $celulares=Celulares::mostrarXSemana($fechaInicio,$fechaFin);
        //Si no hay resultados esta funcion manda un mensaje diciendo que no hay resultados
        if (!$celulares) {
            $estatus= "No hay registro";
            require 'app/Views/Busqueda.php';
        //En caso de si haber resultado se retorna la vista
        //Y en la vista se imprimen los resultados
        }else{
            require 'app/Views/Busqueda.php';
        }
    }
    //ESTA FUNCION NOS RETORNA A LA PANTALLA DE INICIO
    function inicio(){

    }

}