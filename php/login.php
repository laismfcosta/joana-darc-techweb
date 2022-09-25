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
	if (isset($_POST["email"])) {
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
    $profile = $_POST["profile"];
  }

	$connection = mysqli_connect("localhost","root","","darc");
	$sql = "SELECT * FROM enrollments WHERE email='$email' AND password='$password'";

  $selected = mysqli_query($connection, $sql);
    
  if (mysqli_num_rows($selected)==1) {
  	$vector = mysqli_fetch_row($selected);
 
    $persistedProfile = $vector[5];
  		
		if ($persistedProfile == 1) {
  		header("Location:../html/home.html");
		} else {
  		header("Location:../html/admin.html");
		}
  } else {
  	echo '<p>Usuário não encontrado</p>';
  	echo '<p><a href="../index.html">Voltar</a></p>';
  }
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">    
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">   
  </script>
</body>
<html>