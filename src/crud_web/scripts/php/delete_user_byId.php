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


$userId = (int) $_POST['userid'];

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

try {
    $entityManager->remove($user);
    $entityManager->flush();
    /*echo 'User with ID  ' . $userId
        . ' was deleted.' . PHP_EOL;*/
    header('Location: ../../delete_user_byId.php');
} catch (Exception $exception) {
    //echo $exception->getMessage();
    header('Location: ../../delete_user_byId.php');
}
