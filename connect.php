<?php
require 'header.php';
require_once 'db.php'; ?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container mt-5">
        <h1>Connexion Admin</h1>
            <div class="userLog"> 
                <form action="login.php" method="POST">
                    <label>Nom d'utilisateur</label>
                        <input type="text" name="username"/>
                    <label>Mot de passe</label>
                        <input type="password" name="password"/>
                        <input type="submit" value="Connect"/>
                </form>
            </div>
    </div>
</div>

<?php require 'footer.php';?>