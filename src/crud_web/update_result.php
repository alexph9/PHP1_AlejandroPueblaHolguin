<?php $section ='update_result'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/update_result.php" method="POST" class="form-signin text-left">
                <h1> Actualizar resultado</h1>
                <div class="col-md-12">
                    <label for="resultid"></label>
                    <input id="resultid" class="form-control" name="resultid" type="resultid" placeholder="Result ID" required>
                </div>
                <div class="col-md-12">
                    <label for="userid"></label>
                    <input id="userid" class="form-control" name="userid" type="text" placeholder="User ID" required>
                </div>
                <div class="col-md-12">
                    <label for="result"></label>
                    <input id="result" class="form-control" name="result" type="text" placeholder="Result" required>
                </div>
                <div class="col-md-12 mt-4">
                    <button id="update_result_btn" type="submit" class="btn btn-primary btn-md">Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

