<?php 

require 'abre_conexao.php';

$id = isset($_GET['n'])?$_GET['n']:null;

$sql = "DELETE FROM ENTREGA WHERE ID = (?)";

$delete = $pdo->prepare($sql);

$delete->bindValue(1, $id, PDO::PARAM_STR);

$delete->execute();

header("Location: home.php");