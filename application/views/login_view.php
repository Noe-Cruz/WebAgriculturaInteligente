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
					Iniciar Sesión
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "correo">
						<input class="input100" type="text" id="correo" placeholder="Correo electrónico">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="contraseña">
						<input class="input100" type="password" id="contrasenia" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div id="mensaje"></div>
					<div class="container-login100-form-btn m-t-32" id="div-iniciosesion" ></div>
					<div class="container-login100-form-btn m-t-32">
						<button type="button" class="login100-form-btn" id="btn-iniciosesion">
							Inicar sesión
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="btn btn-lg btn-google" id="btn-iniciogoogle" >
							<i class="fab fa-google mr-2"></i> 
							Google
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<a href="<?= base_url()?>agricultura/registro">¿No tienes una cuenta? Registrate aquí</a>
					</div>


				</form>
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

	<!-- Firebase JS SDK para configuración de js con firabase -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase.js"></script> 
	<script src="<?= base_url()?>static/js/control_sesion.js"></script>
	<script src="<?= base_url()?>static/js/error.js"></script>
	<script src="<?= base_url()?>static/js/mensajes.js"></script>
    <script>
        var appData = {
            "base_url" : "<?= base_url() ?>agricultura",
            "url"      : "<?= base_url() ?>"
        };
    </script>
</body>
</html>