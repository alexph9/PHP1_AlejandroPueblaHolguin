<?php $section ='list_results'; ?>
<?php require 'header.php' ?>
<?php require 'scripts/php/list_results.php' ?>

<div class="container">
    <div>
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="row">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Result</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($results as $result) { ?>
                    <tr>
                        <th> <?php echo $result->getId() ?></th>
                        <th> <?php echo $result->getUser() ?></th>
                        <th> <?php echo $result->getResult() ?></th>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
