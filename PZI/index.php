<?php
	session_start();
	




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
			
		#sati {
			text-align:center;
			margin:50px;}
			
		#prag{
			width:100%;
			height:300px;
			}
		
		#uskoro {
			align:center;
			margin-top:50px;
			margin-bottom:50px;}
			
		#text {
			text-align:center;
			font-size:150%;
			font-family:Cambria;}
			
		#citat {
			font-size:110%;
			font-family:Cambria;}
			
		#vrijeme { 
			background-image: url('vrijemee.jpg');
			background-repeat: no-repeat;
			background-size:100%;
			padding:45px;}
           
          
        .container {
            text-align: center; }
          
          input {
              margin: 20px 0;
          }
          
          #weather {
              margin-top:15px;
          }

	</style>
	
	<body>
	
	<img src="naslovnaa.jpg" class="img-fluid" alt="Responsive image" width="100%">
	
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="naslov">
			<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link active" href="index.php">Naslovna<span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="putovanja.php">Putovanja<span class="sr-only">(current)</span></a>
			  </li>
			   <li class="nav-item">
				<a class="nav-link" href="registrirajse.php">Prijava/Registracija</a>
			  </li>
			</ul>
	</nav>
	
	
	<div class="container" id="uskoro">
		<div class="card">
		  <img class="card-img-top" src="prag.jpg" alt="UKORO" id="prag">
		  <div class="card-block">
			<p class="card-text" id="text"><b>Pažnja!</b><br><i>Ponudu naših putovanja mogu vidjeti samo registrirani korisnici. Zato požuri i registriraj se!</i></p>
			
		  </div>
		</div>
	</div>
	
	<div class="card card-inverse card-info mb-3 text-center">
	  <div class="card-block">
		<blockquote class="card-blockquote" id="citat">
		  <p>"Svako putovanje ima neku prednost. Ako putnik posjeti bolju, bogatiju zemlju, može naučit kako poboljšati svoju. A ako ode u goru, siromašniju, naučit će uživati u svojoj zemlji." -Samuel Johnson</p>
		  <footer>Putujte sa  <cite title="Source Title">Magellan-om!</cite></footer>
		</blockquote>
	  </div>
  </div>
  
	<div class="container">
	  <button class="btn btn-outline-success" onclick="this.innerHTML=Date()" id="sati">Koliko je sati?</button>
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
	
	