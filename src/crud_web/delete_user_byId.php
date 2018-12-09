<?php $section ='delete_user_byId'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/delete_user_byId.php" method="POST" class="form-signin text-left">
                <h1> Eliminar usuario</h1>
                <div class="col-md-12">
                    <label for="userid"></label>
                    <input id="userid" class="form-control" name="userid" type="text" placeholder="User ID" required>
                </div>
                <div class="col-md-12 mt-4">
                    <button id="delete_user_btn" type="submit" class="btn btn-primary btn-md">Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
