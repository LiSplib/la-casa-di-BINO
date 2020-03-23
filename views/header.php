<?php if(session_status() == PHP_SESSION_NONE){
    session_start();}?>
    
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? h($title) : 'Événements' ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../public/css/calendar.css" rel="stylesheet">
    </head>
    <body style="background : url('../img/bg.jpg') fixed;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <a class="navbar-brand" href="index.php"><h1>La Casa di Bino</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="../index.amp.html">Accueil</a>
                    <?php if(isset($_SESSION['auth'])): ?>
                        <a class="nav-item nav-link" href="logout.php">Se Déconnecter</a>
                        <a class="nav-item nav-link" href="addImage.php">Ajouter une photo</a>
                        <a class="nav-item nav-link" href="add.php">Créer un événement</a>
                        <?php else: ?>
                            <button type="button" class="btn btn-dark" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            <svg aria-hidden="true" height="2em" width="2em" focusable="false" data-prefix="fas" data-icon="user-plus" class="svg-inline--fa fa-user-plus fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-right text-center">
                                <form class="p-4" action="login.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1">Utilisateur</label>
                                        <input type="text" class="form-control" id="exampleDropdownFormEmail1" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleDropdownFormPassword1">Mot de passe</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-info">Se Connecter</button>
                                </form>
                            </div>
                        
                        
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
       
        