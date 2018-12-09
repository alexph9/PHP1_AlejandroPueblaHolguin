<?php $section ='delete_users'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/delete_users.php" method="POST" class="form-signin text-left">
                <h1> Eliminar usuarios</h1>
                <div class="col-md-12">
                    Se dispone a eliminar todos los usuarios. Si está seguro pulse el botón Eliminar.
                </div>
                <div class="col-md-12 mt-4">
                    <button id="delete_users_btn" type="submit" class="btn btn-primary btn-md">Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>