<?php $section ='delete_results'; ?>
<?php require 'header.php' ?>

<div class="container">
    <div>
        <div class="col-md-12 form-signin">
            <form action="scripts/php/delete_results.php" method="POST" class="form-signin text-left">
                <h1> Eliminar resultados</h1>
                <div class="col-md-12">
                    Se dispone a eliminar todos los resultados. Si está seguro pulse el botón Eliminar.
                </div>
                <div class="col-md-12 mt-4">
                    <button id="delete_results_btn" type="submit" class="btn btn-primary btn-md">Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>