<?php $section ='create_result'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/create_result.php" method="POST" class="form-signin text-left">
                <h1> Crear resultado</h1>
                <div class="col-md-12">
                    <label for="result"></label>
                    <input id="result" class="form-control" name="result" type="text" placeholder="Resultado" required>
                </div>
                <div class="col-md-12">
                    <label for="userid"></label>
                    <input id="userid" class="form-control" name="userid" type="text" placeholder="User Id" required>
                </div>
                <div class="col-md-12 mt-4">
                    <button id="create_result_btn" type="submit" class="btn btn-primary btn-md">Crear resultado
                    </button>
                </div>
            </form>
        </div>
    </div>
