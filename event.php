<?php
require 'header.php';
?>

<?php if(isset($_SESSION['auth'])): ?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container mt-5">
            <h3 class="mt-5">Bienvenue <?= $_SESSION['username'] ?></h3>
        </div>
    </div>
<?php endif; ?>

    <?php
    $currentDate = new DateTime();
    $euDate = $currentDate->format('d-m-Y');
    require_once 'db.php';
    $reponse = $pdo->prepare("SELECT id, DATE_FORMAT(dateHour, '%d-%m-%Y') AS dateHour, DATE_FORMAT(dateHour, '%m-%Y') AS dateD, title, content, photo FROM events ORDER BY dateD");
    $reponse->execute();
    while ($donnees = $reponse->fetch())
    {
    ?>
    <div class="jumbotron jumbotron text-center text-white bg-dark">
        <div class="container">
    <?php 
        $dateEvent = $donnees['dateHour'];
        $dEvent = explode("-", $dateEvent);
        $dDate = explode("-", $euDate);
        $finalEventDate = $dEvent['2'].$dEvent['1'].$dEvent['0'];
        $finalDate = $dDate['2'].$dDate['1'].$dDate['0'];
        if($finalEventDate > $finalDate): 
    ?>
            <h1 class="display-4 mt-5">Le prochain événement à la Casa di Bino</h1>
            <?php else: ?>
            <h1 class="display-4 mt-5">Les événements précédents à la Casa di Bino</h1>
        <?php endif; ?>
            <p class="lead"><?= $donnees['dateHour'] ?></p>
            <hr class="my-4">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="<?= $donnees['photo'] ?>" class="card-img-top" alt="atelier enfant">
            </div>
            <p><?= $donnees['title'] ?></p>
            <a class="btn btn-info btn-lg" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Plus d'info</a>
        </div>
    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $donnees['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?= $donnees['content'] ?></p>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="img/sable.jpg" class="d-block w-100" alt="atelier sable">
                            </div>
                            <div class="carousel-item">
                            <img src="img/sable2.jpg" class="d-block w-100" alt="atelier sable">
                            </div>
                            <div class="carousel-item">
                            <img src="img/sable3.jpg" class="d-block w-100" alt="atelier sable">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
                </div>
            </div>
        </div>                
    <?php } ?>
<?php require 'footer.php';?>