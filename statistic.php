<?php
session_start();
if (empty($_SESSION["login"]))
    header('Location: /login');
?>
<!DOCTYPE html>
<html lang="pt-br">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Conection</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/statistic.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./img/chama.jpg" />



</head>
<script>
    var screenWidth = screen.width;
    console.log(screenWidth)
</script>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Logo e cabeçalho -->
            <div id="content">
                <div style="width: 100%; height: 180px;background-color: #000;">
                    <div class="d-flex flex-wrap ">
                        <img src="./img/chama.jpg" alt="" style=" height: 80px; margin:20px;" id="admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./login/php/bd.php" id="sair">Sair</a>
                        </div>
                        <h4 class="text-white " style=" width: 50%;  margin:20px;">Dashboard Conection</h4>
                    </div>
                    <div class="contorno" style="width:100%;height: 60px;background-color: #f8f9fc; border-top-left-radius: 100px;border-top-right-radius: 100px;"></div>
                    <button type="button" class="btn btn-sm float-right col-3" onclick="Apresentation()" style="font-size: 17px ;color: #fff;  margin: 12px 10px; background-color: #000009;">
                        <i class="fas fa-undo"></i>
                        Voltar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-3">
            <div class="col">
                <h3>Formulários por Culto</h3>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chBar" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-3">
            <div class="col">
                <h3>Como conheceu a igreja</h3>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="padding: 0.25rem;height: 23rem;">
                        <canvas id="chBar-1"></canvas>
                        <script>
                            if (screenWidth > 900) {
                                document.getElementById("chBar-1").setAttribute("height", "100")
                            }else{
                                document.getElementById("chBar-1").setAttribute("height", "300")
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-3">
            <div class="col">
                <h3>Próximos passos</h3>
            </div>
        </div>
        <div class="col my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chBar-2" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col my-3">
            <div class="col">
                <h3>Sexo</h3>
            </div>
        </div>
        <div class="col my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="padding: 0.25rem;height: 23rem;">
                        <canvas id="chBar-3" ></canvas>
                        <script>
                            if (screenWidth > 900) {
                                document.getElementById("chBar-3").setAttribute("height", "100")
                            }else{
                                document.getElementById("chBar-3").setAttribute("height", "300")
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col my-3">
            <div class="col">
                <h3>Estado Civil</h3>
            </div>
        </div>
        <div class="col my-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chBar-4" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script src="js/chart.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    function Apresentation() {
        location.replace('./')
    }
</script>



</html>