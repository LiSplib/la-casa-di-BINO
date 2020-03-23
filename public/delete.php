<?php
require '../src/bootstrap.php';
$pdo = get_pdo();
$events = new Date\Events($pdo);

if(isset($_GET['delete'])){
    $getId = $_GET['delete'];
    $events->delete($getId);
    $_SESSION['flash']['danger'] = 'L\'événement a été supprimé';
    header('Location: index.php');
    exit();
}

