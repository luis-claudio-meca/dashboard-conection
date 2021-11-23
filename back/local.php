<?php
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

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : '';
$limite = isset($_POST["limite"]) ? $_POST["limite"] : 0;
$id = isset($_POST["id"]) ? $_POST["id"] : '';
$date = (isset($_POST['data'])) ? filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING) : '';
$sexo = (isset($_POST['sexo'])) ? filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING) : '';
$name = (isset($_POST['nome'])) ? filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) : '';
$idade = (isset($_POST['idade'])) ? filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING) : '';
$civil = (isset($_POST['civil'])) ? filter_input(INPUT_POST, 'civil', FILTER_SANITIZE_STRING) : '';
$phone = (isset($_POST['phone'])) ? filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) : '';
$bairro = (isset($_POST['bairro'])) ? filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING) : '';


$data = '';
switch ($opcion) {
    case 1:
        $consulta = " SELECT * FROM dados_visitantes limit $limite,10 ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "UPDATE dados_visitantes SET dados_visitantes.status=1  WHERE dados_visitantes.id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        break;

    case 3:
        $consulta = " SELECT * FROM dados_visitantes  WHERE dados_visitantes.id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 4:
        $consulta =  "UPDATE dados_visitantes SET  sexo='$sexo',name='$name', data = '$date',idade='$idade',civil='$civil',phone='$phone',bairro='$bairro'   WHERE dados_visitantes.id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = " SELECT * FROM dados_visitantes limit $limite,10 ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 5:
        $consulta =  "DELETE FROM dados_visitantes WHERE dados_visitantes.id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        $consulta = " SELECT * FROM dados_visitantes limit $limite,10 ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 6:
        $consulta =  "SELECT COUNT(*) AS total FROM dados_visitantes ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS atendidos FROM dados_visitantes WHERE status ='1'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS nao_atendidos FROM dados_visitantes WHERE status ='0'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;


    case 7:
        $consulta =  "SELECT COUNT(*) AS primeiro FROM dados_visitantes WHERE culto LIKE '%17hrs'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS segundo FROM dados_visitantes WHERE culto LIKE '%19hrs'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS strong FROM dados_visitantes WHERE culto LIKE '%Strong'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS familia FROM dados_visitantes WHERE culto LIKE '%Família'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS terceiro FROM dados_visitantes WHERE culto LIKE '%AME'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;

    case 8:
        $consulta =  "SELECT COUNT(*) AS primeiro FROM dados_visitantes WHERE conhecer LIKE '%Instagram%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS segundo FROM dados_visitantes WHERE conhecer LIKE '%Whatsapp%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS terceiro FROM dados_visitantes WHERE conhecer LIKE '%Youtube%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS quarto FROM dados_visitantes WHERE conhecer LIKE '%Passei em frente a igreja%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS quinto FROM dados_visitantes WHERE conhecer LIKE 'Eu fui convidado%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;

    case 9:
        $consulta =  "SELECT COUNT(*) AS primeiro FROM dados_visitantes WHERE mais LIKE '%GR%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS segundo FROM dados_visitantes WHERE mais LIKE '%SH%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS terceiro FROM dados_visitantes WHERE mais LIKE '%PDC%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS quarto FROM dados_visitantes WHERE mais LIKE '%OC%'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;

    case 10:
        $consulta =  "SELECT COUNT(*) AS primeiro FROM dados_visitantes WHERE sexo = 'Feminino'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS segundo FROM dados_visitantes WHERE sexo = 'Masculino'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;

    case 11:
        $consulta =  "SELECT COUNT(*) AS primeiro FROM dados_visitantes WHERE civil = 'Solteiro'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS segundo FROM dados_visitantes WHERE civil = 'Casado'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS terceiro FROM dados_visitantes WHERE civil = 'Divorciado'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);

        $consulta =  "SELECT COUNT(*) AS quarto FROM dados_visitantes WHERE civil = 'Viúvo'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data += $resultado->fetch(PDO::FETCH_ASSOC);
        break;

    case 12:
        $consulta = " SELECT * FROM dados_visitantes WHERE status ='1' limit $limite,10 ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 13:
        $consulta = " SELECT * FROM dados_visitantes WHERE status ='0' limit $limite,10 ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_PRETTY_PRINT);
$conexion = NULL;
