<?php
require 'header.php';?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container mt-5">    

        <h1 class="mt-5">Enregistrez-vous</h1>

            <form action="signin.php" method="POST">

                <div class="form-group">
                    <label for="">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-inline">
                    <div class="form-group mb-2">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control ml-2"/>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="">Confirmez le mot de passe</label>
                        <input type="password" name="confirm_password" class="form-control ml-2"/>
                    </div>
                    <button type="submit" value="Connect" class="btn btn-primary mb-2">S'enregistrer</button>
                </div>
            </form>
    </div>
</div>

<?php require 'footer.php';?>
