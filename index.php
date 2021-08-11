<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Controle de motoboy</title>
	<link rel="stylesheet" type="text/css" href="css/styleLogin.css">
	<style type="text/css">
		label.error{
			font-size: 12px;
			color: red;
		}
	</style>
</head>
<body>
	<main>
		<section>
			<div class="img">
				<img src="http://soloprodst.blob.core.windows.net/uploads/2017/01/10/4b254b63-632c-4b36-8c2f-cd503494bda2/f0864a4e-ec29-46e5-91e5-625a55bb719a.png">
			</div>
			<form id="form" action="login.php" method="POST">
				<input type="text"     name="usuario" placeholder="Informe seu CPF" autocomplete="off" id="usuario" required />
				<input type="password" name="senha"   placeholder="Sua senha"       autocomplete="off" required />
				<button type="submit">Logar</button>
			</form>
			<span>Deseja criar uma conta? <a href="singup.php">clique aqui</a></span>
			<?php  
				if(isset($_SESSION['novoMoto'])){
			  		echo '<p style="margin-top: 5px; color: green; >Registrado com sucesso</p>';
				}
			?>			
		</section>
	</main>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

	<script type="text/javascript">

		$('#form').validate({
			messages: {
				usuario: "Campo obrigatório *",
				senha: "Campo obrigatório *"
			}
		})

		$('#form').submit(function(){
			window.location = "home.php";
		});

		$('#usuario').mask('999.999.999-99');
		
	</script>
</body>
</html>