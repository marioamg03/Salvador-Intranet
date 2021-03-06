<?php
error_reporting(1);

include "../sec/seguro.php";
include "libreria.php";
$_SESSION["ubicacion"] = "roadmap";
$_SESSION["calendar_live"] = 0;
// $arrayMenu = unserialize($_SESSION["accesos"]);
$proyectnew = "";
include "../sec/libfunc.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['e'])) { 
    $proyectnew = $_GET['e'];
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Salvador Hairdressing - RoadMap</title>

  <link href="estilos20.css" rel="stylesheet">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/material-icons.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="" background="assets/img/cover.jpg" style="background-repeat: no-repeat; background-size: cover; background-position: center;" onload="startTime()">
  <div class="wrapper" >
   <?php include "assets/side-bar.php" ?>
     <!-- FIN DEL MENU -->
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!-- <a class="navbar-brand" href="#pablo"><h1><i class="pe-7s-note2"> </i>  Roadmap  </h1></a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">!</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="width: 350;">
                 <div class="card" style="width: 270px;"> 
                  <div class="card-header card-header-info">Ultimas Actividades:</div>
                    <?php include "../cms/library/common.php"; echo rellenoActividadesUsuario($iduser); ?>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <style type="text/css">
        .text-bottom {
          position: absolute;
          bottom: 20px;
          left: 30px;
        }
      </style>
      <div class="content" id="contentRoadmap">
        <div class="text-bottom">
            <h1><b><i style="font-size: 36px;" class="material-icons">alarm</i><span id="horaactual"></span></b></h1>
            <h2><b>¡Bienvenido:</b> Enrique Bravo!</h2>
        </div>
      </div>
      <!-- End Navbar -->
    <!-- <div class="content" id="contentRoadmap">
        <div class="container-fluid row">
          <?php echo proyectos(1,$iduser); echo proyectos(3, $iduser);  ?>
        </div>
    </div> -->
    </div>
          
          
      
            <div id="minimodal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><span id="m-titulo"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <span id="m-body"></span>
                  </div>
                  
                </div>
                </div>
            </div>

            <!-- COMIENZO DE MODAL: NUEVO PROYECTO JP  -->
            <div id="newproject" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
             <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                          
                          <h4 class="modal-title"><b>  Información Detallada del Nuevo Proyecto.<span id="prtit"></span></b><span class="pe-7s-note modpr"></span></h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form method="post" action="libreria.php"> 
                        <div class="modal-body">
                        <!-- FORMULARIO NUEVO -->
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre de Proyecto</label>
                                    <input type="text" class="form-control" required name="nombrepr">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Categoria</label>
                                        <select class="form-control form-control-sm" name="categoriapr" required><option value="">Seleccionar</option>
                                              <?php echo listadocategoria(); ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Region</label>
                                    <select class="form-control form-control-sm" required name="regionpr"><option value="">Seleccionar</option>
                                      <?php echo listadoregiones(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Responsable</label>
                                    <input type="text" class="form-control" required name="responsable">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Fecha estimada de cierre</label>
                                    <br><input class="form-control" type="date" name="fechacierre" required> 
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Breve descripción: </label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea><br>
                                </div>
                            </div>
                            <input type="hidden" name="user" value="<?php echo $iduser;?>">
                            <input type="submit" name="valider" class="btn btn-info" value="Guardar"> 
                            <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
                </div> 
            </div>
            <!-- FIN DE MODAL: NUEVO PROYECTO JP -->       

  <?php include ('assets/footer.php') ?>

  <script type="text/javascript">
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('horaactual').innerHTML =
      h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
  </script>
    
  </body>
</html>