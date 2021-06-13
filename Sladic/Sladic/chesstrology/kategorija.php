<?php
    include 'connect.php';
    define('UPLPATH', 'img/');
	
	$kategorija = $_GET['id'];
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
</head>
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
        <section class="naslov">
            <h2><?php echo $kategorija; ?> svi članci</h2>
        </section>
        <section class="row">
      
            <?php
                $query = "SELECT * FROM vijesti WHERE kategorija='$kategorija'";
                $result = mysqli_query($dbc, $query);
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="card w-25 mb-5 mx-5">';
                        echo '<img src="'. UPLPATH . $row ['slika'] .'" class="card-img-top">';
                        echo '<div class="card-title">';
                        echo '<div class="card-body">';
                        echo '<a href="clanak.php?id='.$row['id'].'">';
                        echo $row['naslov'];
                        echo '</a></div>';
                        echo '</div>';
                    echo '</div>';
                    
                }
            ?>
            
                        
        </section>
    </main>
    <footer class="text-center p-4 mt-auto" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
        <a class="text-reset fw-bold">Dimitar Sladić</a>
    </footer>
</html>