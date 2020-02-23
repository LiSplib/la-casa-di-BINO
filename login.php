<?php

if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db.php';
    $req = $pdo->prepare('SELECT * FROM user');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
        if(password_verify($_POST['password'], $user->password)){
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
            header('Location: event.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        }




}
   

