<?php


namespace Practica1;


class Celulares extends Conexion
{
    //Datos a usar
    public $id_celular;
    public $nombre;
    public $marca;
    public $modelo;
    public $ram;
    public $procesador;
    public $fechaRegistro;

    public function __construct()
    {
        parent::__construct();
    }
    //Funcion para registrar
    function crear(){
        $pre = mysqli_prepare($this->con, "INSERT INTO celulares(nombre,marca,modelo,ram,procesador,fecha_registro) VALUES (?,?,?,?,?,?)");
        $pre-> bind_param("sssiss",$this->nombre,$this->marca,$this->modelo,$this->ram,$this->procesador,$this->fechaRegistro);
        $pre-> execute();
    }
    //Esta Funcion muestra todos los dispositivos
    static function mostrarDispositivos(){
        $conexion = new Conexion();
        $pre= mysqli_prepare($conexion->con, "SELECT * FROM celulares");
        $pre->execute();
        $resultado = $pre->get_result();
        while ($objeto=mysqli_fetch_assoc($resultado)) {
            $celulares[]=$objeto;
        }
        return $celulares;
    }
    //Funcion para traer registros y hacer la comparacion de ram
    static function mostrar($id1,$id2){
        $conexion = new Conexion();
        $pre= mysqli_prepare($conexion->con, "SELECT * FROM celulares WHERE id_celular=? OR id_celular=?");
        $pre-> bind_param("ii",$id1,$id2);
        $pre->execute();
        $resultado = $pre->get_result();
        $celulares=[];
        while ($objeto=mysqli_fetch_assoc($resultado)) {
            $celulares[]=$objeto;
        }
        return $celulares;
    }
    //Funcion para contar los registros que hay de una marca
    static function mostrarMarcas($marca){
        $conexion = new Conexion();
        $pre= mysqli_prepare($conexion->con, "SELECT * FROM celulares WHERE marca=?");
        $pre-> bind_param("s",$marca);
        $pre->execute();
        $resultado = $pre->get_result();
        $celulares=[];
        while ($objeto=mysqli_fetch_assoc($resultado)) {
            $celulares[]=$objeto;
        }
        return $celulares;
    }
    //Funcion para mostrar dispositivos de acuerdo a "x" semana
    static function mostrarXSemana($dato1,$dato2){

        $conexion = new Conexion();
        $pre= mysqli_prepare($conexion->con, "SELECT * FROM celulares WHERE fecha_registro BETWEEN ? and ?");
        $pre-> bind_param("ss",$dato1,$dato2);
        $pre->execute();
        $resultado = $pre->get_result();
        $celular=[];
        while ($objeto=mysqli_fetch_assoc($resultado)) {
            $celular[]=$objeto;
        }
        return $celular;
    }

}