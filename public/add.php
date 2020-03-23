<?php

require '../src/bootstrap.php';



$data = [
        'date' => $_GET['date'] ?? date('Y-m-d'),
        'start' => date('H:i'),
        'end' => date('H:i')
];

$validator = new \App\Validator($data);
if(!$validator->validate('date', 'date')) {
    $data['date'] = date('Y-m-d');
};

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new Date\EventValidator();
    $errors = $validator->validates($data);
    if (empty($errors)) {
        $events = new Date\Events(get_pdo());
        $event = $events->hydrate(new \Date\Event(), $data);
        $events->create($event);
        header('location: index.php');
        $_SESSION['flash']['success'] = 'L\'événement a été crée';
        exit();
    }
} 

render('header', ['title' => 'Ajouter un événement']);
?>

<?php if (!empty($errors)): ?>
    <div class="container text-center">
        <div class="alert alert-danger">
            Merci de corriger vos erreurs
        </div>
    </div>
<?php endif; ?>

<?php
$directory = "../img/upload/";
$photos = glob("$directory*.jpg");
?>

    <div class="container text-center bg-dark">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-dark text-white text-center mt-5">
                    <h1 class="card-title mt-2">Ajouter un événemment</h1>
                    <div class="card-body">
                        <form method="POST" action="">
                        <?php render('calendar/form', ['data'=> $data, 'errors' => $errors]); ?>   
                        <div class="vignettes mt-3" id="scroller">
                            <div id="thumbnail-list" class="caroussel">
                                <?php foreach($photos as $key => $photo): ?>
                                    <img class="form-control" style="width: 250px;" src="<?= $photo ?>" alt="" title="<?= $photo ?>">
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="photo">Choix photo :</label>
                                <select name="photo" id="photo">
                                    <?php foreach($photos as $key => $photo): ?>
                                        <option value="<?= $photo ?>" style="background:url('<?= $photo ?>'); width:100px; height: 100px;">
                                        <?= $photo ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-info mt-2">
                            <svg class="bi bi-upload" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 10a.5.5 0 01.5.5V14a1 1 0 001 1h12a1 1 0 001-1v-3.5a.5.5 0 011 0V14a2 2 0 01-2 2H4a2 2 0 01-2-2v-3.5a.5.5 0 01.5-.5zM7 6.854a.5.5 0 00.707 0L10 4.56l2.293 2.293A.5.5 0 1013 6.146L10.354 3.5a.5.5 0 00-.708 0L7 6.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M10 4a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 0110 4z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <a href="index.php" class="btn btn-secondary mt-2">
                                <svg class="bi bi-house" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
render('footer');