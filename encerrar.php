<?php

require 'abre_conexao.php';

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d/m/Y');

$recebe  = isset($_GET['recebe'])?$_GET['recebe']:null;
$valor   = isset($_GET['valor'])?$_GET['valor']:null;

var_dump([$recebe, $valor]);

try {
	$sql = 'INSERT INTO ENTREGA ( DATA, TOTAL, ENTREGAS ) VALUES (:d, :t, :e)';
	$inserir = $pdo->prepare($sql);
	$inserir->bindValue(':d', $dataAtual);
	$inserir->bindValue(':t', $valor);
	$inserir->bindValue(':e', floatval($recebe));
	$inserir->execute();	
} catch (PDOException $e) {
    echo $e->getMessage();
}

header("Location: home.php");