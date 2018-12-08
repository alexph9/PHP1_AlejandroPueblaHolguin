<?php
/**
 * PHP version 7.2
 * src/crud_cli/create_regular_user.php
 *
 * @category Scripts
 * @author   Alejandro Puebla Holguin <a.pueblah@alumnos.upm.es>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
 */
use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

if ($argc !== 4) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <Username> <Email> <Password>

MARCA_FIN;
    exit(0);
}

$username =  $argv[1];
$email = $argv[2];
$password = $argv[3];

$user = new User();
$user->setUsername($username);
$user->setEmail($email);
$user->setEnabled(false);
$user->setPassword($password);
$user->setIsAdmin(false);

try {
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'Created Regular User with ID ' . $user->getId()
        . ' whose username is ' . $user->getUsername() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}

