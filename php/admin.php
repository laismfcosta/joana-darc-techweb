<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <title>Administra Clientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>    
  <link rel="icon" href="../images/joana-darc.png" type="image/x-icon" />
	<link href="../css/normalize.css" rel="stylesheet"/>
  <link href="../css/styles.css" rel="stylesheet"/></head>
<body>
<?php
	$operation = $_POST['operation'];
	$connection = mysqli_connect('localhost', 'root', '', 'darc');

  if ($operation == 'include') {
  	if((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['message']))) {
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$password = md5($_POST['password']);
    	$message = $_POST['message']; 
    		
			$sql = "INSERT INTO enrollments (name, email, password, message, profile) VALUES('$name', '$email', '$password', '$message', 1);";
    	
			if (mysqli_query($connection, $sql)) {
  	  	echo '<p class="text-center">Obrigado por se cadastrar em nosso site!</p>';
      	echo '<p class="text-center"><a href="../html/admin.html"> Voltar</a></p>';
    	} else {
      	echo '<p>Erro ao cadastrar no Banco de Dados.</p>';
      	echo '<p><a href="../html/admin.html"> Voltar</a></p>';
    	}
  	} else {
    	echo '<p class="text-center">Cadastro não efetuado.<br/>Favor preencher todos os campos.</p>';
    	echo '<p class="text-center"><a href="../html/admin.html"> Voltar</a></p>';  
 		}
 	} elseif ($operation == 'delete') {
		$code = $_POST['code'];
		$sql = "DELETE FROM enrollments WHERE id=$code";
		
		mysqli_query($connection, $sql);
		$lines = mysqli_affected_rows($connection);

		if ($lines == 1) {
			echo '<p class="text-center">Cadastro excluído.</p>';
    	echo '<p class="text-center"><a href="../html/admin.html"> Voltar</a></p>';
		} else {
			echo '<p class="text-center">Registro não encontrado.</p>';
    	echo '<p class="text-center"><a href="../html/admin.html"> Voltar</a></p>';
		}
	} else {
		$sql = "SELECT id, name, email, message FROM enrollments";
		$selection = mysqli_query($connection, $sql);
		$selectedQuantity = mysqli_num_rows($selection);

		echo '<h1 class="text-center">Lista de Clientes</h1>';
		echo '<table class="table table-striped">';  
    echo "<thead><tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Mensagem</th></thead>";
    echo '<tbody>';
      
    for ($i = 0; $i < $selectedQuantity; $i++) {
			$vector = mysqli_fetch_row($selection);

      echo "\n<tr><td>".$vector[0]."</td>";
      echo "<td>".$vector[1]."</td>";       
      echo "<td>".$vector[2]."</td>";     
      echo "<td>".$vector[3]."</td></tr>";             
		}
    echo '</tbody></table>';
		echo '<p class="text-center"><a href="../html/admin.html">Voltar</a></p>';
	}
?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">    
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">   
  </script>
</body>
<html>






