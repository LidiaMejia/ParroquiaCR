<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formulario de Solicitud</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="imgs/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="public/css/mainsoli_sacra.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="background">

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					SOLICITUD DE INFORMACION SOBRE SACRAMENTO
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Por favor ingrese su Nombre">
					<span class="label-input100">Nombre del solicitante</span>
					<input class="input100" type="text" name="name" placeholder="Ingrese su Nombre">
				</div>

				<div class="wrap-contact100-form-radio">
					<span class="label-input100">Genero</span>

					<div class="contact100-form-radio m-t-15">
						<input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical" checked="checked">
						<label class="label-radio100" for="radio1">
							Masculino
						</label>
					</div>

					<div class="contact100-form-radio">
						<input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
						<label class="label-radio100" for="radio2">
							Femenino
						</label>
					</div>

				</div>


				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Ingrese su Email (e@a.x)">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Ingrese su Email ">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Ingrese su Edad">
					<span class="label-input100">Edad</span>
					<input class="input100" type="text" name="phone" placeholder="Ingrese su Edad">
				</div>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Sacramento del que desea informacion</span>
					<div>
						<select class="js-select2" name="service">
							<option>Elija uno</option>
							<option>Bautismo</option>
							<option>Primera Comunion</option>
							<option>Confirmacion</option>
							<option>Eucaristia</option>
	            <option>Orden Sacerdotal</option>
	            <option>Matrimonio</option>
	            <option>Uncion de los enfermos</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-alert-validate" data-validate = "Por favor ingrese sus dudas">
					<span class="label-input100">Deje sus dudas o sugerencias</span>
					<textarea class="input100" name="message" placeholder="Escriba un comentario u observacion"></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Ingrese
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


</div>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Por favor elija una opcion") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="public/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
