<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <title>Joana d'Arc</title>
  <meta name="keywords" content="Joana d'Arc"/>
  <meta name="description" content="Site sobre Joana d'Arc"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"/>
  <link rel="icon" href="../images/joana-darc.png" type="image/x-icon" />
  <link href="../css/normalize.css" rel="stylesheet"/>
  <link href="../css/styles.css" rel="stylesheet"/>     
</head>
<body>
  <?php
  $connection = mysqli_connect("localhost", "root", "", "darc");

  if ((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['message']))) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $message = $_POST['message']; 
    
    $sql = "INSERT INTO enrollments (name, email, password, message, profile) VALUES ('$name','$email','$password','$message', 1);";
    
    if (mysqli_query($connection, $sql)) {
  	  echo '<p class="text-center">Obrigado pela visita! Cadastro realizado com sucesso!</p>';
      echo '<p class="text-center"><a href="../html/home.html"> Voltar</a></p>';
    } else {
      echo '<p class="text-center">Erro ao cadastrar no Banco de Dados.</p>';
      echo '<p class="text-center"><a href="../html/home.html"> Voltar</a></p>';
    }
  } else {
    echo '<p class="text-center">Cadastro não efetuado.<br/>Favor preencher todos os campos.</p>';
    echo '<p class="text-center"><a href="../html/contact.html"> Voltar</a></p>';  
  }  	    
  ?>
</body>
</html>







