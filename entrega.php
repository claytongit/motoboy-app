<?php 

require 'abre_conexao.php';

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d/m/Y');

$moto       = isset($_GET['n'])?$_GET['n']:null;
$inputRua   = isset($_POST['entrega'])?$_POST['entrega']:null;
$inputValor = isset($_POST['custo'])?$_POST['custo']:null;

$rua   = htmlspecialchars(addslashes($inputRua));
$valor = htmlspecialchars(addslashes($inputValor));

try {
	$sql = 'INSERT INTO entrega ( DATA, END, CUSTO, FK_MOTO ) VALUES (:d, :e, :c, :f)';
	$inserir = $pdo->prepare($sql);
	$inserir->bindValue(':d', $dataAtual);
	$inserir->bindValue(':e', $rua);
	$inserir->bindValue(':c', floatval($valor));
	$inserir->bindValue(':f', $moto);
	$inserir->execute();	
} catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: home.php");