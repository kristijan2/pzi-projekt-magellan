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
		
		
		$link = mysqli_connect("localhost", "fpmoz042019", "csdigital2019", "fpmoz042019");
		
		if (mysqli_connect_error()) {
			
			die("There was an error connecting to the database");
			echo "databaseror";
			
		}
		
		$sql = "SELECT odrediste, cijena, datum, opis, slika FROM putovanje";
		
		$result = $link->query($sql);

		
		if(@$_POST['emailk'] == '') {
			
			$error= "Unesite email";
			
		} else if($_POST['odredistee'] == '') {
			
			$error= "Unesite odrediste";
			
		}else {
			
			$query = "INSERT INTO prijava (odredistee, korisnik_email) VALUES ('".mysqli_real_escape_string($link, $_POST['odredistee'])."','".mysqli_real_escape_string($link, $_POST['emailk'])."')";
							
				if (mysqli_query($link, $query)) {
					
					echo " Prijavili ste se.";
					
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
			
		#slika {
			width:100%;
			}
			
		#link {
			text-decoration:none;
			color:white;
			}
			
		#tablicaput {
			width:1050px;
			margin-left:100px;
		}
		
		#tablicaslike{
			width:400px;
			height:300px;
		}
		
		#prijavljivanje {
			
			margin-left:40px;
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
				<a class="nav-link active" href="putovanja.php">Putovanja<span class="sr-only">(current)</span></a>
			  </li>
			   <li class="nav-item">
				<a class="nav-link" href="registrirajse.php">Prijava/Registracija</a>
			  </li>
			</ul>
	</nav>
	
	<?php
	if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			    
		echo "<table id='tablicaput'><td id='tablicaslike'><img  src=" . $row["slika"]. "  id='slika'></td><td><div class='card-deck' id='kard'><div class='card'><div class='card-block'><h4 class='card-title'>" . $row["odrediste"]. " </h4><p class='card-text'><b>" . $row["datum"]. " " . $row["cijena"]. "</b> <br><br>".$row["opis"]."</p></div><div class='card-footer'><br><small class='text-muted'>Prijaviti se možete na dnu stranice.</small><br></div></div></td></table>";}


		} else {
		  echo "0 results";
		}
		
		
		$link->close();
		
		?>
		
	
	<br><br>
	
	<form method='post' id="prijavljivanje">
	<label>Popunite prijavu:</label> 

	<input name='odredistee' type='text' placeholder ='Unesi odredište'>
	<input name='emailk' type='text' placeholder ='Unesi svoj email'>
	<button type='submit' name='submit' class='btn btn-info' id='prijava'>Prijavi se</button>
	</form>

	
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