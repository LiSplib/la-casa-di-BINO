<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require'header.php'?>

    <h3 class="mt-5">Bienvenue <?= $_SESSION['username'] ?></h3>

        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-4 mt-5">Le prochain événement à la Casa di Bino</h1>
                <p class="lead">date</p>
                <hr class="my-4">
                <div class="card" style="width: 18rem; margin: auto;">
                    <img src="atelier.jpg" class="card-img-top" alt="atelier enfant">
                </div>
                <p>Info sur l'événement</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Plus d'info</a>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h1 class="display-4 mt-5">Les événements précédents à la Casa di Bino</h1>
                <p class="lead">Samedi 14 Décembre 2019</p>
                <hr class="my-4">
                <div class="card" style="width: 18rem; margin: auto;">
                    <img src="complet.jpg" class="card-img-top" alt="atelier enfant">
                </div>
                <p>Atelier « sablés de Noël » pour les enfants</p>
                <a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Plus d'info</a>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atelier « sablés de Noël » pour les enfants</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="sable.jpg" class="d-block w-100" alt="atelier sable">
                            </div>
                            <div class="carousel-item">
                            <img src="sable2.jpg" class="d-block w-100" alt="atelier sable">
                            </div>
                            <div class="carousel-item">
                            <img src="sable3.jpg" class="d-block w-100" alt="atelier sable">
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

<?php require'footer.php';?>