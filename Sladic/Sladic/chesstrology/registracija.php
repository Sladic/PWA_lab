<?php 
    header('Content-Type: text/html; charset=utf-8');

    $servername = "localhost";
    $username = "root";
    $password= "";
    $basename= "vijesti";

    // Create connection

    $dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error connecting to MySQL server'.mysqli_error());
    mysqli_set_charset($dbc, "utf-8");

	
	if(isset($_POST['prijava'])){
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$username = $_POST['username'];
		$lozinka = $_POST['pass'];
		$hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);
		$razina = 0;
		$registriranKorisnik = '';
		
		$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
		$stmt = mysqli_stmt_init($dbc);
		
		if (mysqli_stmt_prepare($stmt, $sql)) {
			mysqli_stmt_bind_param($stmt, 's', $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		}
		if(mysqli_stmt_num_rows($stmt) > 0){
			$msg='Korisnicko ime vec postoji!';
		}
		else{
			$sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($dbc);
			if (mysqli_stmt_prepare($stmt, $sql)) {
				mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
				mysqli_stmt_execute($stmt);
				$registriranKorisnik = true;
			}
		}
		mysqli_close($dbc);
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chesstrology</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />   
    <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="logo.png" alt=""  height="50" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="index.php">Početna</a>
            <a class="nav-link" href="kategorija.php?id=šah">Šah</a>
            <a class="nav-link" href="kategorija.php?id=astrologija">Astrologija</a>
            <a class="nav-link" href="administracija.php">Administracija</a>
            <a class="nav-link" href="unos.php">Unos</a>
            
        </div>
        </div>
    </div>
    </nav>

    <main class="container">
        <div class="row col-6">
        <form enctype="multipart/form-data" action="" method="POST">
            <div class="form-group">
                <span id="porukaIme" class="bojaPoruke"></span>
                <label for="title">Ime: </label>
                    <input type="text" name="ime" id="ime" class="form-control">
            </div>
            <div class="form-group">
                <span id="porukaPrezime" class="bojaPoruke"></span>
                <label for="about">Prezime: </label>
                    <input type="text" name="prezime" id="prezime" class="form-control">
            </div>
            <div class="form-group">
                <span id="porukaUsername" class="bojaPoruke"></span>
                <label for="content">Korisničko ime:</label>
                    <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <span id="porukaPass" class="bojaPoruke"></span>
                <label for="pphoto">Lozinka: </label>
                    <input type="password" name="pass" id="pass" class="form-control">
            </div>
            <div class="form-group">
                <span id="porukaPassRep" class="bojaPoruke"></span>
                <label for="pphoto">Ponovite lozinku: </label>
                    <input type="password" name="passRep" id="passRep" class="form-control">
            </div>
            <div class="form-item">
                <button class="btn btn-light" type="submit" value="prijava" id="stil"><a href="administracija.php">Prijava</a></button>
                <button class="btn btn-dark" type="submit" value="Prijava" name="prijava" id="slanje">Registriraj se</button>
            </div>   
        </form>
        </div>
        <script type="text/javascript">
            document.getElementById("slanje").onclick = function(event) { 
                var slanjeForme = true;
                // Ime korisnika mora biti uneseno
                var poljeIme = document.getElementById("ime");
                var ime = document.getElementById("ime").value;
                if (ime.length == 0) {
                    slanjeForme = false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } else {
                    poljeIme.style.border="1px solid green";
                    document.getElementById("porukaIme").innerHTML="";
                }
                 // Prezime korisnika mora biti uneseno
                var poljePrezime = document.getElementById("prezime");
                var prezime = document.getElementById("prezime").value;
                if (prezime.length == 0) {
                    slanjeForme = false;
                    poljePrezime.style.border="1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
                    
                } else {
                    poljePrezime.style.border="1px solid green";
                    document.getElementById("porukaPrezime").innerHTML="";
                }
                 // Korisničko ime mora biti uneseno
                var poljeUsername = document.getElementById("username");
                var username = document.getElementById("username").value;
                if (username.length == 0) {
                    slanjeForme = false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
                   
                } else {
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("porukaUsername").innerHTML="";
                }
                // Provjera podudaranja lozinki
                var poljePass = document.getElementById("pass");
                var pass = document.getElementById("pass").value;
                var poljePassRep = document.getElementById("passRep");
                var passRep = document.getElementById("passRep").value;
                if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                    slanjeForme = false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
                    document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
                    return false;
                } else {
                    poljePass.style.border="1px solid green";
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                    document.getElementById("porukaPassRep").innerHTML="";
                }
            }
            if (slanjeForme != true) {
                event.preventDefault();
            }
        </script>
    </main>
    <footer class="text-center p-4 mt-auto" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
        <a class="text-reset fw-bold">Dimitar Sladić</a>
    </footer>
</body>
</html>