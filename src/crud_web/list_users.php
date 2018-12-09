<?php $section = 'list_users'; ?>
<?php require 'header.php' ?>
<?php require 'scripts/php/list_users.php' ?>

<div class="container">
    <div>
        <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="row">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Enabled</th>
                    <th scope="col">Admin</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <th> <?php echo $user->getId() ?></th>
                        <th> <?php echo $user->getUsername() ?></th>
                        <th> <?php echo $user->getEmail() ?></th>
                        <th> <?php echo ($user->isAdmin()) ? '1' : '0' ?></th>
                        <th> <?php echo ($user->isAdmin()) ? '1' : '0' ?></th>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

