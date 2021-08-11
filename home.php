<?php 

require 'abre_conexao.php';

session_start();

if($_SESSION['login'] != 'SKJDKSJKDS-DSAJDKSJDKS-DJSKDJSAK-LJDSJSJLJ'){
  header('Location: index.php');
}

//ID do usuario que ira vir de uma sessao
$id_usuario = $_SESSION['ID'];

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d/m/Y');

//Busca todos os endereços da data de hoje
try {
  $sql = 'SELECT * FROM entrega WHERE DATA = (?) AND FK_MOTO = (?)';
  $busca = $pdo->prepare($sql);
  $busca->bindValue(1, $dataAtual, PDO::PARAM_STR);
  $busca->bindValue(2, $id_usuario, PDO::PARAM_STR);
  $busca->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
} 

//Conta quantos pedidos teve no dia de hoje
$entrega = 0;

try {
  $sqlCount = 'SELECT COUNT(ID) FROM entrega WHERE DATA = (?) AND FK_MOTO = (?)';
  $b = $pdo->prepare($sqlCount);
  $b->bindValue(1, $dataAtual, PDO::PARAM_STR);
  $b->bindValue(2, $id_usuario, PDO::PARAM_STR);
  $b->execute();

  while ($count = $b->fetch(PDO::FETCH_ASSOC)) {
    $entrega = $count['COUNT(ID)'];
  }

} catch (PDOException $e) {
  echo $e->getMessage();
}

//Soma o valor total das entregas
$value = 0;

try {
  $sqlCusto = 'SELECT * FROM entrega WHERE DATA = (?) AND FK_MOTO = (?)';
  $buscaCusto = $pdo->prepare($sqlCusto);
  $buscaCusto->bindValue(1, $dataAtual, PDO::PARAM_STR);
  $buscaCusto->bindValue(2, $id_usuario, PDO::PARAM_STR);
  $buscaCusto->execute();

  while($custo = $buscaCusto->fetch(PDO::FETCH_ASSOC)){
    $value += $custo['CUSTO'];
  }

} catch (PDOException $e) {
  echo $e->getMessage();
}

$formatValue  = number_format($value, 2);
$totalValue = str_replace('.', ',', $formatValue );

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Font-awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <title>Controle de motoboy</title>
  </head>
  <body>
    
    <header>
      <div class="container">
        <span><?php echo $dataAtual ?></span>
        <h2>Controle de motoboy</h2>
      </div>
    </header>

    <main>
      <div class="container">

        <div class="content">

          <section class="circulo"></section>

          <div class="total">
              <p>R$ <?php echo $totalValue; ?></p>
          </div>

        </div>

        <br>

        <div>
            <?php
              echo '<p style="margin: 0; color: white;">Total de entregas no dia '.$entrega.'</p>';
            ?>
        </div>

        <section class="lista">

          <?php 
            while ($entrega = $busca->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="mt-3">';
              echo '<p>'. $entrega['END'] .'</p>';
              echo '<div>';
              echo '<p>R$ '.  $entrega['CUSTO'] .'</p>';
              echo '<a href="excluir.php?n='.$entrega['ID'].'"><i class="fas fa-trash-alt" style="color: red;"></i></a>';
              echo '</div>';
              echo '</div>';
            }
          ?>

        </section>

      </div>

      <a id="button-fixed" href="form-add.php">
        <i class="fas fa-plus"></i>
      </a>

      <a id="button-fixed-logout" href="logout.php">
        <i class="fas fa-power-off"></i>
      </a>

    </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-
    
  </body>
</html>
