<?php 
   if(isset($_POST['prihvati'])) {
    include 'connect.php';
    $picture = $_FILES['pphoto']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $date = date('d.m.Y.');
    if(isset($_POST['archive'])) {
        $archive = 1;
    } else {
        $archive = 0;
    }

    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES['pphoto']['tmp_name'], $target_dir);

    // prepare and bind
    $stmt = $dbc->prepare("INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $date, $title, $about, $content, $picture, $category, $archive);

    // set parameters and execute
    $picture = $_FILES['pphoto']['name'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $date = date('d.m.Y.');
    $stmt->execute();

    $stmt->close();


	include 'skripta.php'; die;
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
            <a class="nav-link active" href="unos.php">Unos</a>
            
        </div>
        </div>
    </div>
    </nav>

    <main class="container">

    <h2>Nova vijest</h2>

        <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <span id="porukaTitle" class="bojaPoruke"></span>
                    <label for="title">Naslov vijesti</label>

                        <input type="text" name="title" id="title" class="form-control" required>

                </div>
                <div class="form-group">
                    <span id="porukaAbout" class="bojaPoruke"></span>
                    <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>

                        <textarea name="about" id="about" class="form-control"></textarea>

            </div>
            <div class="form-group">
                <span id="porukaContent" class="bojaPoruke"></span>
                <label for="content">Sadržaj vijesti</label>

                    <textarea name="content" id="content" class="form-control"></textarea>

            </div>
            <div class="form-group">
                <span id="porukaSlika" class="bojaPoruke"></span>
                <label for="pphoto" >Slika: </label>
 
                    <input type="file" name="pphoto" id="pphoto" class="form-control-file" accept="image/x-png,image/gif,image/jpeg">

            </div>
            <div class="form-group">
                <span id="porukaKategorija" class="bojaPoruke"></span>
                <label for="category">Kategorija vijesti</label>

                    <select name="category" id="category" class="form-control">
						<option value="izbor">Odaberite kategoriju</option>
                        <option value="šah">Šah</option>
                        <option value="astrologija">Astrologija</option>
                    </select>

            </div>
            <div class="form-group">
                <label>Spremiti u arhivu:

                        <input type="checkbox" name="archive" class="form-check-input" id="archive">

                </label>
            </div>
            <div class="form-group">
                <button type="reset"  class="btn btn-light w-25" value="Poništi">Poništi</button>
                <button type="submit" name="prihvati"  class="btn btn-dark w-25" id="slanje" value="Prihvati">Prihvati</button>
            </div>
        </form>

        <script>
            // Provjera forme prije slanja
            document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            // Naslov vjesti (5-30 znakova)
            var poljeTitle = document.getElementById("title");
            var title = document.getElementById("title").value;
            if (title.length < 5 || title.length > 30) {
            slanjeForme = false;
            poljeTitle.style.border="1px dashed red";
            document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
			} else {
            poljeTitle.style.border="1px solid green";
            document.getElementById("porukaTitle").innerHTML="";
            }

            // Kratki sadržaj (10-100 znakova)
            var poljeAbout = document.getElementById("about");
            var about = document.getElementById("about").value;
            if (about.length < 10 || about.length > 100) {
            slanjeForme = false;
            poljeAbout.style.border="1px dashed red";
            document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
			} else {
            poljeAbout.style.border="1px solid green";
            document.getElementById("porukaAbout").innerHTML="";
            }
            // Sadržaj mora biti unesen
            var poljeContent = document.getElementById("content");
            var content = document.getElementById("content").value;
            if (content.length == 0) {
            slanjeForme = false;
            poljeContent.style.border="1px dashed red";
            document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
			} else {
            poljeContent.style.border="1px solid green";
            document.getElementById("porukaContent").innerHTML="";
            }
            // Slika mora biti unesena
            var poljeSlika = document.getElementById("pphoto");
            var pphoto = document.getElementById("pphoto").value;
            if (pphoto.length == 0) {
            slanjeForme = false;
            poljeSlika.style.border="1px dashed red";
            document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
			} else {
            poljeSlika.style.border="1px solid green";
            document.getElementById("porukaSlika").innerHTML="";
            }
            // Kategorija mora biti odabrana
            var poljeCategory = document.getElementById("category");
            if(document.getElementById("category").selectedIndex == 0) {
            slanjeForme = false;
            poljeCategory.style.border="1px dashed red";

            document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
			} else {
            poljeCategory.style.border="1px solid green";
            document.getElementById("porukaKategorija").innerHTML="";
            }

            if (slanjeForme != true) {
            event.preventDefault();
        }

        };
    </script>
    </main>
    <footer class="text-center p-4 mt-auto" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
        <a class="text-reset fw-bold">Dimitar Sladić</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>