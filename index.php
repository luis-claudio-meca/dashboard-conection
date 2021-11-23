<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if (empty($_SESSION["login"]))
    header('Location: /dashboard-conection/login');
?>

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
    <link rel="icon" type="image/png" href="./img/chama.jpg" />
    <style>
        * {
            box-sizing: border-box;
        }



        .loading {
  align-items: center;
  display: flex;
  justify-content: center;
  min-height: 100vh;
  transform: scale(5);
}


        .c-loader {
            animation: is-rotating 1s infinite;
            border: 6px solid #e5e5e5;
            border-radius: 50%;
            border-top-color: #51d4db;
            height: 50px;
            width: 50px;
        }

        @keyframes is-rotating {
            to {
                transform: rotate(1turn);
            }
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #5A5757;
            background: #fff;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #169b6b;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #001;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #001
        }

        a .img-profile {
            height: 3rem;
            width: 3rem;
        }

        .lift {
            box-shadow: 0 .15rem 1.75rem 0 rgba(33, 40, 50, .15);
            transition: transform .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .lift:hover {
            transform: translateY(-.3333333333rem);
            box-shadow: 0 .5rem 2rem 0 rgba(33, 40, 50, .25)
        }

        .lift:active {
            transform: none;
            box-shadow: 0 .15rem 1.75rem 0 rgba(33, 40, 50, .15)
        }

        .card.lift {
            text-decoration: none;
            color: inherit
        }

        .o-hidden {
            overflow: hidden !important
        }

        .dropdown-menu {
            background-color: #CAE1FF;
        }

        .edit {
            background-color: #FFF68F;
            width: 90%;
            margin: auto;
            border-radius: 5%;
            text-align: center;
            font-weight: bold;
            font-size: 1rem;

        }

        .del {
            background-color: #FA8072;
            width: 90%;
            margin: auto;
            border-radius: 5%;
            text-align: center;
            font-weight: bold;
            font-size: 1rem;

        }
    </style>


</head>

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
                </div>

                <div class="loading" id="loading"> <div class="c-loader"></div></div>

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <!-- Content Row -->
                    <div class="row d-flex justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow-lg h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Atendidos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-900" id="realizados">531</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow-lg h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Não Atendidos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-900" id="naorealizados">65</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow-lg h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total de formulários
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-900" id="indicerealizados">89</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                  
                   



                    <!-- Select Unidade -->
                    <!-- Button - Modo Apresentação -->
                    <button type="button" class="btn btn-lg float-right col-10  col-lg-3 col-xl-3 col-md-3 col-sm-4" onclick="Apresentation()" style="font-size: 17px ;color: #fff;  margin: 12px auto; background-color: #000;">
                        <i class="fas fa-chart-line"></i>
                        Estatísticas
                    </button>
                    <div class="input-group" style="width: 300px; margin-left: 20px;margin-top: 20px;margin-bottom: 15px; height: 30px;">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" style="background-color:#848aa1;color:black;">Filtar:</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="0" selected>Todos...</option>
                            <option value="1">Não Atendidos</option>
                            <option value="2">Atendidos</option>


                        </select>
                    </div>



                    <!--Testandooooooooooooo-->
                    <div id="regForm">

                        <div class="tab">
                            <h3 style="text-align: center;width: 100%; font-weight:bold;">Formulários Enviados</h3>
                            <div class="row" id="root-1">


                            </div>
                        </div>
                    </div>
    

                        <div style="overflow:auto;">
                            <div style="float:right; margin-right: 4%">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:20px;">
                            <span class="step"></span>
                        </div>
                   

                    <!--FIM Testandooooooooooooo-->


                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Chama Tech 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded-circle" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <div id="root">


            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            <script src="js/sweetalert/sweetalert2.all.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="./back/tratamentodedados.js"></script>


            <script>
                var currentTab = 0; // Current tab is set to be the first tab (0)
                showTab(currentTab); // Display the current tab

                function showTab(n) {
                    // This function will display the specified tab of the form...
                    var x = document.getElementsByClassName("tab");
                    let z = document.getElementsByClassName("card");
                    x[0].style.display = "block";
                    //... and fix the Previous/Next buttons:
                    if (n == 0) {
                        document.getElementById("prevBtn").style.display = "none";
                    } else {
                        document.getElementById("prevBtn").style.display = "inline";
                    }
                    //... and run a function that will display the correct step indicator:
                }

                function nextPrev(n) {
                    // This function will figure out which tab to display
                    

                    // Exit the function if any field in the current tab is invalid:
              
                    // Hide the current tab:
                    
                    // Increase or decrease the current tab by 1:
                    currentTab += n;
                    nextJS(currentTab).then((result)=>{
                        if (result) {
                            document.getElementById("root-1").innerHTML = '<h1>Sem formulários...</h1>';
                            document.getElementById("nextBtn").style.display = "none";
                        }else{
                        showTab(currentTab);
                        document.getElementById("nextBtn").style.display = "inline";         
                        }
                    })               
                }

                
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>







</body>

<script>
    function Apresentation() {
        location.replace('./statistic.php')
    }
</script>


</html>