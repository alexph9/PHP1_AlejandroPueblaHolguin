<?php $section ='create_user_admin'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/create_user_admin.php" method="POST" class="form-signin text-left">
                <h1> Crear administrador</h1>
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
                    <button id="create_regular_user_btn" type="submit" class="btn btn-primary btn-md">Crear Administrador
                    </button>
                </div>
            </form>
        </div>
    </div>
