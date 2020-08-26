<?php 
	
	session_start();
	
		if(array_key_exists("id", $_COOKIE)) {
			
			$_SESSION['id']=$_COOKIE['id'];
		}

		
		if(array_key_exists("id", $_SESSION)) {
			
			echo "<p> logiran si. <a href = 'registrirajse.php?logout=1'> Log out </a></p>";
			
		}else {
			
			header("Location: registrirajse.php");
		}
	
	if($_POST) {	 
		$link = mysqli_connect("localhost", "fpmoz042019", "csdigital2019", "fpmoz042019");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}
		
		$error= "";
		$noterror="";
		
		if ($_POST['odrediste'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite odredište. </div>";
			
		}else if ($_POST['datum'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite vrijeme trajanja putovanja. </div>";
			
		} else {
			
			//$query = "INSERT INTO putovanje (odrediste, cijena, datum, opis, slika) VALUES ('".mysqli_real_escape_string($link,$_POST['odrediste'])."','".mysqli_real_escape_string($link,$_POST['cijena'])."','".mysqli_real_escape_string($link,$_POST['datum'])."','".mysqli_real_escape_string($link,$_POST['opis'])."','".mysqli_real_escape_string($link,$_POST['slika'])."')";
				
			$odrediste=mysqli_real_escape_string($link,$_POST['odrediste']);
			$datum = mysqli_real_escape_string($link,$_POST['datum']);
			$query = "DELETE FROM putovanje WHERE odrediste = '$odrediste' AND datum = '$datum' LIMIT 1";
			
				if (mysqli_query($link, $query)) {
					
					$noterror= "Putovanje je obrisano.";
					
				}
		}
		
	}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <style type="text/css">
	  
	  
	  .forma {
		  margin:60px;
		  
	  }
	  </style>
  </head>
  
 <body> 
 
	<nav class="navbar navbar-inverse bg-inverse">
		<a class="navbar-brand" href="magadmin.php">Dodaj putovanje</a>
		<a class="navbar-brand" href="magadminb.php">Obriši putovanje</a>
	</nav>

	<div class= "forma">
	<form method="post">
	  <div class="form-group">
		<p> Popunite obrazac i obrišite <br><small> Molimo popunite sve informacije. </small></p> <br><br>
		
		<?php if(@$error != ""){
			echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
		}else {
				echo "<div class='alert alert-success' role='alert'>".@$noterror."</div>";
		} ?>
		<br>

		<label for="formGroupExampleInput">Odrediste putovanja</label>
		<input name="odrediste" type="varchar" class="form-control" id="formGroupExampleInput" placeholder="npr. Barcelona">
	  </div>
	  <div class="form-group">
		<label for="formGroupExampleInput">Vrijeme trajanja putovanja</label>
		<input name="datum" type="text" class="form-control" id="formGroupExampleInput" placeholder="npr 15.5.2020.-3.6.2020.">
	  </div>
	  
	  
	  <button type="submit" class="btn btn-success">Obriši putovanje</button>
	   <br><br>
	  <div class="alert alert-info" role="alert">
	  <strong>Pripazi! </strong> Putovanje se nece obrisati ako podatke ne unesete tocno onako kako ste unijeli prilikom dodavanja putovanja. <br>
	  (pripazite i na znakove interpukcije i razmake)
	</div>
	  	
 </body>