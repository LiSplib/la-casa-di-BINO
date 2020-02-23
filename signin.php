<?php


if(!empty($_POST)){

    $errors = array();

    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide!";
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide!";

    }

    if(empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']){
        $errors['password'] = "Votre password n'est pas valide!";

    }
    if(empty($errors)){
    require_once 'db.php';

        $req = $pdo->prepare("INSERT INTO user SET username = ?, password = ?, email = ?");
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $req->execute([$_POST['username'], $password, $_POST['email']]);
        die('Votre compte a bien été créé');
        header('Location: http://localhost/testco/register.php');
    }



}

