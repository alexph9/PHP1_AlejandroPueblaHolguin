<?php $section ='delete_result_byId'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/delete_result_byId.php" method="POST" class="form-signin text-left">
                <h1> Eliminar resultado</h1>
                <div class="col-md-12">
                    <label for="resultid"></label>
                    <input id="resultid" class="form-control" name="resultid" type="text" placeholder="Result ID" required>
                </div>
                <div class="col-md-12 mt-4">
                    <button id="delete_result_btn" type="submit" class="btn btn-primary btn-md">Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>