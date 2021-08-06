<!DOCTYPE html>
<html lang="en">
<head>
	<title>Agricultura Inteligente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/static/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/static/vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/static/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/static/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/static/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url()?>/static/images/background.jpg');">
		<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Registro
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

                    <div class="wrap-input100 validate-input" data-validate="nombre">
						<input class="input100" type="text" id="nombre" placeholder="Nombre completo">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "correo">
						<input class="input100" type="text" id="correo" placeholder="Correo electrónico">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="contraseña">
						<input class="input100" type="password" id="contrasenia" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div id="mensaje"></div>
					<div class="container-login100-form-btn m-t-32" id="div-registrar" ></div>
					<div class="container-login100-form-btn m-t-32">
						<button type="button" class="login100-form-btn" id="btn-registrar">
							Registrar
						</button>
					<div class="container-login100-form-btn m-t-32">
						<a href="<?= base_url()?>agricultura/iniciosesion">¿Tienes cuenta? Inicia sesión aquí</a>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Mensaje-->
    <div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensajeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title" id="modalMensajeTittle" 
			style="font-size: 1.3em; font-family: Calibri;"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalMensajeBody" style="font-size: 1.1em; font-family: Calibri;">
        </div>
        <div class="modal-footer">
            <a class="btn btn-success text-white" href="<?= base_url() ?>/agricultura/iniciosesion">Aceptar</a>
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

	<script src="<?= base_url()?>static/js/registro.js"></script>
	<script src="<?= base_url()?>static/js/error.js"></script>
	<script src="<?= base_url()?>static/js/mensajes.js"></script>
	<script>
        var appData = {
            base_url : "<?= base_url() ?>agricultura"
        };
    </script>
</body>
</html>