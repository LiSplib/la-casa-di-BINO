<?php

require_once '../src/bootstrap.php';
$pdo = get_pdo();
$events = new Date\Events($pdo);
if(!isset($_GET['id'])) {
    header('location: /404.php');
}

try {
    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}

render('header', ['title' => $event->getTitle()]);
?>
    <div class="container text-center text-white bg-dark p-2">
        <h1><?= h($event->getTitle()); ?></h1>
        <img src="<?= $event->getPhoto() ?>" style="width: calc(33.3vw - 4% - 4px);" class="card-img-top" alt="<?= $event->getTitle() ?>">
        <div class="card mt-2">
            <div class="card-body bg-dark">
                <h5 class="card-title">
                    Date: <?= $event->getStart()->format('d/m/Y'); ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Heure de début: <?= $event->getStart()->format('H:i'); ?> - Heure de fin: <?= $event->getEnd()->format('H:i'); ?>
                </h6>
                <p class="card-text"><?= h($event->getContent()); ?></p>
                <a href="index.php" class="btn btn-secondary mt-2">
                    <svg class="bi bi-house" width="2em" height="2em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"></path>
                        <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="<?= $event->getUrl() ?>" class="btn btn-primary mt-2">
                <svg aria-hidden="true" width="2em" height="2em" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path>
                </svg>
                </a>
            </div>
        </div>
    </div>

<?php
render('footer');