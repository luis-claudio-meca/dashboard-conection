<?php
session_start();
class Conexion
{
    public static function Conectar()
    {
        define('servidor', 'dbconection.cqjgcxgqtekt.us-east-1.rds.amazonaws.com');
        define('nome_bd', 'dash_conection');
        define('usuario', 'admin');
        define('password', 'ChamaTech');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $conexion = new PDO("mysql:host=" . servidor . "; dbname=" . nome_bd, usuario, password, $opciones);
            return $conexion;
        } catch (Exception $e) {
            die("Erro na Conexão pode ser: " . $e->getMessage());
        }
    }
}

$objeto = new Conexion();
$conexion = $objeto->Conectar();


$user = (isset($_POST['usuario'])) ? filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING) : '';
$senha = (isset($_POST['senha'])) ? filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING) : '';


$consulta = " SELECT senha FROM login WHERE USER = '$user'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetch(PDO::FETCH_ASSOC);

if($data["senha"] == $senha){
$_SESSION["login"] = $user;
header('Location: /dashboard-conection/');
}
else
    print "Dados não cadastrados!";


if(empty($_SESSION["login"])){
session_destroy(); 
header('Location: /dashboard-conection/login');
}
?>