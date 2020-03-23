<?php

require '../src/bootstrap.php';

$pdo = get_pdo();
$events = new Date\Events($pdo);
$errors = [];

try {
    $event = $events->find($_GET['id'] ?? null);
} catch (\Exception $e) {
    e404();
} catch (\Error $e) {
    e404();
}

$data = [
        'title' => $event->getTitle(),
        'date' => $event->getStart()->format('Y-m-d'),
        'start' => $event->getStart()->format('h:i'),
        'end' => $event->getEnd()->format('h:i'),
        'content' => $event->getContent()
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new Date\EventValidator();
    $errors = $validator->validates($data);
    if (empty($errors)) {
        $events->hydrate($event, $data);
        $events->update($event);
        header('Location: event.php');
        $_SESSION['flash']['success'] = 'L\'événement a été modifié';
        exit();
    }
} 
render('header', ['title' => $event->getTitle()]);

// $directory = "../img/upload/";
// $photos = scandir($directory);

?>
    <div class="container text-center text-white bg-dark">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-dark text-white text-center mt-5">
                    <h1 class="card-title mt-2">Editer l'événement<small> : <?= h($event->getTitle()); ?></small></h1>
                    <form method="POST" action="" class="form">
                        <?php render('calendar/form', ['data'=> $data, 'errors' => $errors]); ?> 
                        <div class="row mt-2">
                            <!-- <div class="col">
                                <?php /*foreach($photos as $photo): ?>
                                    <img src="../img/<?= $photo ?>" alt="" style="height:100px;"/>
                                <?php endforeach; */?>
                                <label for="image">Lien vers l'image</label>
                                    <input type="text" class="form-control" name="photo">
                            </div> -->
                        </div>    
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
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
render('footer');
