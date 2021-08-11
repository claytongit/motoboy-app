<?php 

session_start();

require 'abre_conexao.php';

function validateInput($method){
	$value = isset($method)?$method:null;
	$input = htmlspecialchars(addslashes($value));
	return $input;
}

$nome   = validateInput($_POST['nome']);
$cpf    = validateInput($_POST['cpf']);
$tel    = validateInput($_POST['tel']);
$codigo = validateInput($_POST['codigo']);
$senha  = validateInput($_POST['senha2']);

$senhaHash = password_hash($senha, PASSWORD_ARGON2I);

$sqlMoto = 'INSERT INTO moto (NOME, CPF, WAAP, SENHA, COD_DEL) VALUES (:nome, :cpf, :waap, :senha, :cod)';

$inserirMoto = $pdo->prepare($sqlMoto);

$inserirMoto->bindValue(':nome',  $nome);
$inserirMoto->bindValue(':cpf',   $cpf);
$inserirMoto->bindValue(':waap',  $tel);
$inserirMoto->bindValue(':senha', $senhaHash);
$inserirMoto->bindValue(':cod',   $codigo);

if($inserirMoto->execute()){
	$_SESSION['novoMoto'] = true;
	header("Location: index.php");
}else{
	echo '<script>alert("Erro ao registrar motoboy, tente novamente mais tarde!")</script>';
}
?>