<?php
require 'header.php';
require_once 'db.php';


// Create on POST req
$create_status = '';

if(!empty($_POST)){
    require_once 'db.php';

    $req = $pdo->prepare("INSERT INTO events SET dateHour = ?, title = ?, content = ?");
    $req->execute([$_POST['dateHour'], $_POST['title'], $_POST['content']]);
    $create_status = 'Votre événement a bien été créé';

} 

?>
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    if(!empty($create_status)){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= $create_status ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="card bg-dark text-white text-center">
                    <div class="card-body">
                        <h1 class="card-title">Ajouter un événemment</h1>
                            <form method="POST" action="addNewEvent.php">
                                <div class="row">
                                    <div class="col">
                                        <label for="dateHour">Date pour l'événement</label>
                                        <input type="date" class="form-control" id="date" name="dateHour">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                    <label for="title">Titre de l'événement</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                    <label for="title">Description</label>
                                        <input type="text" class="form-control" id="content" name="content">
                                    </div>
                                </div>     
                                <button type="submit" class="btn btn-info mt-2">
                                    <svg class="bi bi-upload" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
