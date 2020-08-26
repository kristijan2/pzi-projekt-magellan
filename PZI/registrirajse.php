<?php

	session_start();
	
	$error= "";
	$noterror="";
	
	if(array_key_exists("logout", $_GET)) {
			
			unset($_SESSION['id']);
			setcookie("id", "", time () - 60*60);
			$_COOKIE["id"] = "";
			
		} else if (array_key_exists("id", $_SESSION) OR array_key_exists("id", $_SESSION)) { 
			
			header("Location: putovanja.php");
		}
		
		
	if(array_key_exists("submit", $_POST)) {	 
		$link = mysqli_connect("localhost", "fpmoz042019", "csdigital2019", "fpmoz042019");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			
		}

		
		if ($_POST['email'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite email. </div>";
			
		}else if ($_POST['lozinka'] == '') {
			
			$error= "<div class='alert alert-danger' role='alert'> Molimo unesite lozinku. </div>";
			
		}else {
			
			if ($_POST['signUp'] == '1') {
			
			$query = "SELECT id FROM korisnik WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
			
			$result = mysqli_query($link, $query);
			
			if (mysqli_num_rows($result) > 0) {
				
				$error = "Email adresa je zauzeta.";
				
			}else {
			
				$query = "INSERT INTO korisnik (email, lozinka) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['lozinka'])."')";
							
				if (!mysqli_query($link, $query)) {
					
					$error="Dogodila se neka greška. Molimo pokušajte ponovo.";
				
				}else{
					
				$query= "UPDATE korisnik SET lozinka = '".md5(md5(mysqli_insert_id($link)).$_POST['lozinka'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
				
				mysqli_query($link,$query);
				
				$_SESSION['id'] = mysqli_insert_id($link);
				
				if($_POST['ostaniprijavljen'] == '1') {
					
					setcookie("id", mysqli_insert_id($link), time() + 60*60);
				}
				
				$noterror = "Uspješno ste registrirani."; 
				
				if($_POST['email'] == "admin@gmail.com") {
					
						header("Location:magadmin.php");
				
				} else {
						header("Location:putovanja.php");
					}
					
				
				}
					
				}
			}else {
				$query = "SELECT * FROM korisnik WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
				
				$result= mysqli_query($link, $query);
				
				//print_r($result);
				
				$row = mysqli_fetch_array($result);
				
				if(isset($row)) {
					
					$hashedPassword = md5(md5($row['id']).$_POST['lozinka']);
					
					print_r($hashedPassword);
					
					print_r ("---");
					print_r($row['lozinka']);
					
					if ($hashedPassword == $row['lozinka']) {
						
						$_SESSION['id'] = $row['id'];
						
						if($_POST['ostaniprijavljen'] == '1') {
					
							setcookie("id", mysqli_insert_id($link), time() + 60*60);
					
						} if($_POST['email'] == "admin@gmail.com") {
					
							header("Location:magadmin.php");
				
						} else {
							
							header("Location:putovanja.php");
							
							}
						
					}else {
						
						$error = "Netočna lozinka";
						
					}
					
				} else {
					
					$error = "Netočan email";
				}
			}
		}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Magellan</title> 
		<meta charset="UTF-8">
		
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		
	<style>
		#naslov {
			font-size:30px;
			font-family:Cambria;
			letter-spacing:7px;
		}
		
		#kard {
			margin:50px 25px 50px 25px;}
			
		#registracija {
			margin:50px 25px 50px 25px;
			background-image: url('pozadin.jpg');
			background-repeat: no-repeat;
			background-size:100%
		}
	</style>
	
	<body>
	
	<img src="naslovnaa.jpg" class="img-fluid" alt="Responsive image" width="100%">
	
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="naslov">
			<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Naslovna<span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="putovanja.php">Putovanja<span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="registrirajse.php">Prijava/Registracija</a>
			  </li>
			</ul>
	</nav>
	
	
	<?php 
	if($error != ""){
		echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
	}else {
		echo " ";
	}

	if($noterror != ""){
		echo "<div class='alert alert-success' role='alert'>".$noterror."</div>";
	}else {
		echo " ";
	}?>
	

		
	
	<div class="container" id="registracija">
	<form method="post">
		<div class="form-group row">
		<label for="example-text-input" class="col-2 col-form-label">Email:</label>
			<div class="col-8">
				<input name="email" class="form-control" type="text" placeholder="Unesi svoje korisničko ime" id="example-text-input">
			</div>
		</div>

		<div class="form-group row">
		  <label for="example-password-input" class="col-2 col-form-label">Lozinka:</label>
			  <div class="col-8">
				<input name="lozinka"class="form-control" type="password" placeholder="..." id="example-password-input">
			  </div>
		</div>
		<br>
			<p> <input type="checkbox" name="ostaniprijavljen" value=1> Ostani prijavljen. </p>
		<br>
		<input type="hidden" name="signUp" value="1">
		<button name="submit" type="submit" class="btn btn-outline-info" id="dugme">Registriraj se</button>
		
		</div>
		</form>
	</div>
	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<p class="lead"> Registraciju obavljate jedan put. Nakon toga svaki sljedeći put idite na <i>'Prijavi se'</i></p>
		</div>
	</div>
	
		<div class="container" id="registracija">
	<form method="post">
		<div class="form-group row">
		<label for="example-text-input" class="col-2 col-form-label">Email:</label>
			<div class="col-8">
				<input name="email" class="form-control" type="text" placeholder="Unesi svoje korisničko ime" id="example-text-input">
			</div>
		</div>

		<div class="form-group row">
		  <label for="example-password-input" class="col-2 col-form-label">Lozinka:</label>
			  <div class="col-8">
				<input name="lozinka" class="form-control" type="password" placeholder="..." id="example-password-input">
			  </div>
		</div>
		<br>
			<p> <input type="checkbox" name="ostaniprijavljen" value=1> Ostani prijavljen. </p>
		<br>
		
		<input type="hidden" name="signUp" value="0">
		<button name="submit" type="submit" class="btn btn-outline-info" id="dugme">Prijavi se</button>
		
		</div>
		</form>
	</div>
	
	
	
	<div class="card card-outline-primary mb-3 text-center" id="kard">
	  <div class="card-block">
		<blockquote class="card-blockquote">
		  <p><b>-Kontakt-</b></p>
		  <p>Email: magellan@gmail.com<br>
		  Telefon: 0038763190821 <br>
		  Adresa: Stjepana Radića 84A 88000 Mostar </p>
		</blockquote>
	  </div>
	</div>

	
	</body>
	
	
</html>