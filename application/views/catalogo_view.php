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
    <link href="<?= base_url()?>/static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>/static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>/static/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Catálogo</h1> -->

                    <div class="row" id="catalogo">
                    </div>

                </div>

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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Mensaje-->
    <div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensajeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white" id="modalMensajeTittle">Mensaje</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalMensajeBody" style="font-size: 1.1em;">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Información-->
    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-capitalize" id="modalInfoSubtitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalInfoBody" style="text-align: justify; text-justify: inter-word;">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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

    <!-- Modal Agregar -->
    <div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="agregarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white" id="agregarSubtitle" >Agregar cultivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="agregarBody">

        <!--MODAL BODY-->
        <div>
            <div class="row" >
                <div align="right" class="col col-md-4">
                    <div class="form-group">
                        <label><strong>Cultivo:</strong></label>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div>
                        <input type="text" class="form-control" id="modal-cultivo">
                    </div>
                </div>    
            </div>

            <div class="row">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cancelar</button>
                <button type="button" class="btn btn-success" id="agregar">Agregar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url()?>static/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>static/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>static/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>static/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>static/js/animacion.min.js"></script>

    <script src="<?= base_url()?>static/js/catalogo.js"></script>
    <script src="<?= base_url()?>static/js/error.js"></script>
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