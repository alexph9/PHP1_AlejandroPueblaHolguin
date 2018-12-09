<?php
/**
 * Created by PhpStorm.
 * User: alexp
 * Date: 09/12/2018
 * Time: 16:47
 */ ?>
<!DOCTYPE HTML>
<html lang='es'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MIW-PHP</title>
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="scripts/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet">
    <script src="scripts/js/scripts.js"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-warning" href="http://www.upm.es" target="_blank">
            <img src='imgs/upmlogo.png' id='upmlogo' alt="Responsive image">
            MIW UPM
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link <?php if ($section === 'index') echo 'active'?>"
                                        href="index.php">Inicio
                        <span class="sr-only">(current)</span></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    <?php
                    if (
                        $section === 'create_regular_user'
                        || $section === 'create_user_admin'
                        || $section === 'create_result' )
                        echo 'active'
                    ?>" data-toggle="dropdown" href="#">Create</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="create_regular_user.php" >Usuario Normal</a>
                        <a class="dropdown-item" href="create_user_admin.php" >Usuario Admin</a>
                        <a class="dropdown-item" href="create_result.php" >Resultado</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    <?php
                    if ( $section === 'list_users' || $section === 'list_results')
                        echo 'active'
                    ?>" data-toggle="dropdown" href="#">Read</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="list_users.php" >Usuarios</a>
                        <a class="dropdown-item" href="list_results.php" >Resultados</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php
                    if ($section === 'update_user' || $section === 'update_result') echo 'active' ?>"
                       data-toggle="dropdown" href="#">Update</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="update_user.php" >Usuario</a>
                        <a class="dropdown-item" href="update_result.php" >Resultado</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?php
                    if (
                        $section === 'delete_user_byId'
                        || $section === 'delete_user_byId'
                        || $section === 'delete_users'
                        || $section === 'delete_results' )
                        echo 'active'
                    ?>" data-toggle="dropdown" href="#">Delete</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="delete_user_byId.php" >Usuario por ID</a>
                        <a class="dropdown-item" href="delete_result_byId.php" >Resultado por ID</a>
                        <a class="dropdown-item" href="delete_users.php" >Todos los usuarios</a>
                        <a class="dropdown-item" href="delete_results.php" >Todos los resultados</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>



