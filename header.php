<?php if(session_status() == PHP_SESSION_NONE){
    session_start();}?>
    
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Evénements</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link href="style.css" rel="stylesheet"> -->
    </head>
    <body style="background : url('img/bg.jpg') fixed;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <a class="navbar-brand" href="event.php"><h1>La Casa di Bino</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="index.amp.html">Accueil</a>
                    <?php if(isset($_SESSION['auth'])): ?>
                    <a class="nav-item nav-link" href="logout.php">Se Déconnecter</a>
                    <a class="nav-item nav-link" href="addImage.php">Ajouter une photo</a>
                    <a class="nav-item nav-link" href="addNewEvent.php">Créer un événement</a>
                    <?php else: ?>
                    <a class="nav-item nav-link" href="connect.php">Se Connecter</a>
                    <a class="nav-item nav-link" href="register.php">S'inscrire</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="container text-center">
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach($_SESSION['flash'] as $type => $message): ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        </div>
       
        