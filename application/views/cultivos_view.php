<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agricultura  Inteligente</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url()?>static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>static/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/cargando.css">

</head>

<body id="page-top">

<!--Cargando-->
<div id="cargando"><h1 class="text-center" style="color: black;"><i class="fas fa-spinner fa-pulse fa-2x"></i>Subiendo...</h1></div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>agricultura/inicio">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Agricultura Inteligente</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>agricultura/inicio">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú
            </div>

            <!-- Nav Item - Mis cultivos -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>agricultura/miscultivos">
                    <i class="fas fa-leaf fa-cultivo"></i>
                    <span>Mis cultivos</span></a>
            </li>

            <!-- Nav Item - Catalogo -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>agricultura/catalogo">
                    <i class="fas fa-book fa-catalogo"></i>
                    <span>Catálogo</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Mensaje-->
                    <div class="col col-md-6" id="mensaje"></div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="infoUser">
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url() ?>static/images/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <divclass="container-fluid">

                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-4 text-gray-800">Mis cultivos</h1>-->

                    <div class="row" style="padding: 2em;">
                        <table class="table table-striped" id="table-cultivos">
                        <thead>
                            <tr class="text-center">
                                <th colspan="2" rowspan="3" style="vertical-align: middle;">Cultivo</th>
                                <th colspan="4">Humedad</th>
                                <th colspan="4">Nivel</th>
                                <th colspan="2"></th>
                                <th colspan="2" rowspan="3" style="width: 13%; vertical-align: middle;">Acciones</th>
                            </tr>
                            <tr class="text-center">
                                <th colspan="2" style="width: 10%; ">Ambiente</th>
                                <th colspan="2" style="width: 10%; ">Suelo</th>
                                <th colspan="2" style="width: 10%; ">Luz</th>
                                <th colspan="2" style="width: 10%; ">Agua</th>
                                <th colspan="2" style="width: 10%; ">Temperatura</th>
                            </tr>
                            <tr class="text-center">
                                <th>Max</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Min</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                    
                    <div align="center"id="lista-vacia">
                        <img src="<?= base_url() ?>static/images/shovel.png" width="180px"; height="180px";/><br/><br/>
                        <h6>Al parecer no tienes cultivos, puedes agregar 
                            <a href="<?= base_url() ?>/agricultura/catalogo">aquí</a>
                        </h6>
                    </div>

                    <div class="row" style="margin-left: 1em;">
                        <div class="col col-md-12">   
                            <button type="button" class="btn btn-primary" onclick="registrarCultivo()" 
                                data-toggle="modal" data-target="#modalCrear">
                                Registrar cultivo</button>
                        </div>
                    </div>

                </divclass=>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Agricultura Inteligente &copy; 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="modalCrearTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modalCrearTitle text-white" id="modalCrearSubtitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--MODAL BODY-->
        <div>
            <div class="row">
                <div class="col col-md-4">
                    <div class="form-group">
                        <label><strong>Cultivo:</strong></label>
                        <input type="text" class="form-control" id="modal-cultivo">
                    </div>
                </div>
                <div class="col col-md-8" id="descripcion">
                    <div>
                        <label><strong>Descripción:</strong></label>
                        <input type="text" class="form-control" id="modal-descripcion">
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col col-md-8" id="image">
                    <div class="form-group">
                        <label><strong>Imagen:</strong></label>
                        <input type="file" accept="image/png,image/jpeg" id="modal-file">
                    </div>
                </div>  
                <div class="col col-md-4" id="btn-image">
                    <div class="form-group"><br/>
                    <button type="button" class="btn btn-success" onclick="subirArchivo()">Subir imagen</button>
                    </div>
                </div>   
            </div>

            <div class="row">
                <input type="hidden" id="accion" />
                <input type="hidden" id="modal-imageURL" />
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 40%">Factor</th>
                            <th>Máximo</th>
                            <th>Minímo</th>
                            <th>Magnitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Temperatura</th>
                            <td class="text-center"><input type="text" class="form-control" id="modal-temperatura-max"></td>
                            <td class="text-center"><input type="text" class="form-control" id="modal-temperatura-min"></td>
                            <td class="text-center">0-50°C</td>
                        </tr>
                        <tr>
                            <th>Humedad ambiente</th>
                            <td class="text-center"><input type="text" class="form-control" id="modal-humedad-max"></td>
                            <td class="text-center"><input type="text" class="form-control" id="modal-humedad-min"></td>
                            <td class="text-center">20-90%</td>
                        </tr>
                        <tr> 
                            <th>Humedad suelo</th>
                            <td class="text-center"><input type="text" class="form-control" id="modal-suelo-max"></td>
                            <td class="text-center"><input type="text" class="form-control" id="modal-suelo-min"></td>
                            <td class="text-center">0-100%</td>
                        </tr>
                        <tr>
                            <th>Nivel de agua</th>
                            <td class="text-center"><input type="text" class="form-control" id="modal-agua-max"></td>
                            <td class="text-center"><input type="text" class="form-control" id="modal-agua-min"></td>
                            <td class="text-center">0-100%</td>
                        </tr >
                        <tr>
                            <th>Nivel de luz</th>
                            <td class="text-center"><input type="text" class="form-control" id="modal-luz-max"></td>
                            <td class="text-center"><input type="text" class="form-control" id="modal-luz-min"></td>
                            <td class="text-center">0-100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cancelar</button>
            <button type="button" class="btn btn-success" id="modal-boton"></button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Eliminar-->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white" id="modalEliminarLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Desea eliminar el producto: 
			<strong><span class="text-uppercase" id="modal-producto"></span></strong>
			de su cultivo ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelarEliminar">Cancelar</button>
            <button type="button" class="btn btn-danger" id="eliminarProducto">Eliminar</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">¿Desea cerrar su sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="<?= base_url() ?>agricultura/cerrarsesion">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url()?>/static/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>/static/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>/static/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Firebase JS SDK para configuración de js con firabase -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase.js"></script> 
    
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>/static/js/animacion.min.js"></script>
    <script src="<?= base_url()?>/static/js/cultivos.js"></script>
    <script src="<?= base_url()?>/static/js/error.js"></script>
    <script src="<?= base_url()?>/static/js/mensajes.js"></script>
    <script src="<?= base_url()?>/static/js/usuario.js"></script>
    <script>
        var appData = {
            "base_url" : "<?= base_url() ?>agricultura",
            "url"      : "<?= base_url() ?>",
            "uid"      : "<?= $this->session->userdata( "uid" ) ?>",
            "correo"   : "<?= $this->session->userdata( "correo" ) ?>",
            "idToken"  : "<?= $this->session->userdata( "idToken" ) ?>"
        };
    </script>

</body>

</html>