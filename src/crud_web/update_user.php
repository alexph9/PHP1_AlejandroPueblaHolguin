<?php $section ='update_user'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/update_user.php" method="POST" class="form-signin text-left">
                <h1> Actualizar usuario</h1>
                <div class="col-md-12">
                    <label for="userid"></label>
                    <input id="userid" class="form-control" name="userid" type="text" placeholder="User ID" required>
                </div>
                <div class="col-md-12">
                    <label for="username"></label>
                    <input id="username" class="form-control" name="username" type="text" placeholder="Username" required>
                </div>
                <div class="col-md-12">
                    <label for="email"></label>
                    <input id="email" class="form-control" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="col-md-12">
                    <label for="password"></label>
                    <input id="password" class="form-control" name="password" type="password" placeholder="Contraseña" required>
                </div>
                <div class="col-md-12 mt-4">
                    <button id="update_user_btn" type="submit" class="btn btn-primary btn-md">Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>


