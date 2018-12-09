<?php
/**
 * PHP version 7.2
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

if ($argc !== 2) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <UserId> 

MARCA_FIN;
    exit(0);
}

$userId = (int) $argv[1];

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'User with ID ' . $userId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}

try {
    $entityManager->remove($user);
    $entityManager->flush();
    echo 'User with ID  ' . $userId
        . ' was deleted.' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}
