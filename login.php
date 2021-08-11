<?php 

session_start();

require 'abre_conexao.php';

function validateInput($method){
	$value = isset($method)?$method:null;
	$input = htmlspecialchars(addslashes($value));
	return $input;
}

$usuario = validateInput($_POST['usuario']);
$senha   = validateInput($_POST['senha']);

$sqlLogin = "SELECT ID, SENHA FROM moto WHERE CPF = :usuario";

$buscaUsuario = $pdo->prepare($sqlLogin);
$buscaUsuario->bindValue(':usuario', $usuario);

$buscaUsuario->execute();

if($buscaUsuario->rowCount() > 0){

	while ($log = $buscaUsuario->fetch(PDO::FETCH_ASSOC)) {

		if(password_verify($senha, $log['SENHA'])){
			$_SESSION['login'] = 'SKJDKSJKDS-DSAJDKSJDKS-DJSKDJSAK-LJDSJSJLJ';
			$_SESSION['ID'] = $log['ID'];
			header('Location: home.php');
		}else{
			echo '<script> alert("Senha invalida"); window.location="index.php"; </script>';
		}

	}

}else{
	echo '<script> alert("Usuario não encontrado"); window.location="index.php"; </script>';
}

?>