<?php 

session_start();

if($_SESSION['login'] != 'SKJDKSJKDS-DSAJDKSJDKS-DJSKDJSAK-LJDSJSJLJ'){
  header('Location: index.php');
}

//ID do usuario que ira vir de uma sessao
$id_usuario = $_SESSION['ID'];

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
    <link rel="stylesheet" type="text/css" href="css/form-add.css">

    <title>Controle de motoboy</title>
  </head>
  <body>

    <header>

      <section class="container">

        <a href="home.php">
          <i class="fas fa-arrow-left"></i>
          <span>Voltar</span>
        </a>

      </section>

    </header>

    <div id="img">
      <img src="http://soloprodst.blob.core.windows.net/uploads/2017/01/10/4b254b63-632c-4b36-8c2f-cd503494bda2/f0864a4e-ec29-46e5-91e5-625a55bb719a.png">
    </div>

    <main>

      <section class="container">

        <form action="entrega.php?n=<?php echo $id_usuario ?>" method="POST" >

          <div>
            <label for="entrega">Informe o endereço da entrega</label>
            <input type="text" name="entrega" id="entrega" required >
          </div>

          <div>
            <label for="custo">Valor da entrega</label>
            <input type="number" name="custo" id="custo" placeholder="Ex: 5" required >
          </div>

          <input type="submit" name="" value="Adicionar">

        </form>

      </section>

    </main>

     <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script type="text/javascript">
      $('form').validate({
        messages: {
          entrega: "Campo obrigatório *",
          custo: "Campo obrigatório *"
        }
      })
    </script>
    
  </body>
</html>