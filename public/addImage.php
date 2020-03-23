<?php
require '../src/bootstrap.php';
render('header');

?>


<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-dark text-white text-center">
                    <div class="card-body">
                        <h1 class="card-title">Ajouter une photo</h1>
                            <form enctype="multipart/form-data" method="POST" action="addImage.php">
                                <div class="row">
                                    <div class="col">
                                        <label for="file">Photo pour l'événement</label>
                                        <input type="file" name="file" id="file">
                                        <button type="submit" class="btn btn-info mt-2">
                                            <svg class="bi bi-upload" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        <a href="event.php" class="btn btn-secondary mt-2">
                                        <svg class="bi bi-house" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
    if (!empty($_FILES['file'])){

        $destination_dir = "../img/upload/";
        $source_file = ($_FILES['file']['tmp_name']);
        $destination_file = basename($_FILES['file']['name']);
            if (move_uploaded_file($source_file, $destination_dir.$destination_file)) {
                $_SESSION['flash']['success'] = 'Transfert effectué !';
            } else {
                $_SESSION['flash']['danger'] = 'L\'envoi a échoué !';
            }
        }
        
    
    
render('footer');
?>