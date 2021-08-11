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
		<section style="height: auto; padding: 30px 0;" >
			<div class="img">
				<img src="http://soloprodst.blob.core.windows.net/uploads/2017/01/10/4b254b63-632c-4b36-8c2f-cd503494bda2/f0864a4e-ec29-46e5-91e5-625a55bb719a.png">
			</div>
			<form id="form" action="incluirMotoboy.php" method="POST">
				<input  type="text"     name="nome"   autocomplete="off" placeholder="Nome completo"         required style="margin: 0;" />

				<input  type="text"     name="cpf"    autocomplete="off" placeholder="Informe seu CPF"       required style="margin: 0; margin-top: 20px;" id="cpf" />

				<input  type="text"     name="tel"    autocomplete="off" placeholder="Telefone para contato" required style="margin: 0; margin-top: 20px;" id="tel" />

				<input  type="text"     name="codigo" autocomplete="off" placeholder="Codigo do comercio"    required style="margin: 0; margin-top: 20px;" />

				<input  type="password" name="senha"  autocomplete="off" placeholder="Crie uma senha"        required style="margin-top: 20px;" id="senha" />

				<input  type="password" name="senha2" autocomplete="off" placeholder="Confirmar senha"       required style="margin-top: 20px;" id="senha2" />

				<button type="submit">Rgistrar</button>
			</form>
			<span><a href="index.php">Fazer login</a></span>
		</section>
	</main>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

	<script type="text/javascript">
		$('#form').validate({
			rules: {
				senha2:{
					equalTo: '#senha'
				}
			},
			messages: {
				nome: 'Campo obrigatório *',
				cpf: 'Campo obrigatório *',
				tel: 'Campo obrigatório *',
				codigo: 'Campo obrigatório *',
				senha: 'Campo obrigatório *',
				senha2: {
					required: 'Campo obrigatório *',
					equalTo: "As senhas não contem o mesmo valor"
				},
			}
		});
		$('#cpf').mask('999.999.999-99');
		$('#tel').mask('(99) 9 9999-9999');
	</script>
</body>
</html>