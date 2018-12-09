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

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$userRepository = $entityManager->getRepository(User::class);
$users = $userRepository->findAll();

try {
    $items = 0;
    foreach ($users as $user) {
        $entityManager->remove($user);
        $entityManager->flush();
        $items++;
    }
    /*echo 'Total: ' . $items
        . ' users have been deleted.' . PHP_EOL;*/
    header('Location: ../../delete_users.php');
} catch (Exception $exception) {
    //echo $exception->getMessage();
    header('Location: ../../delete_users.php');
}