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
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $_POST['password'];

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);


$user->setUsername($username);
$user->setEmail($email);
$user->setPassword($password);

try {
    $entityManager->persist($user);
    $entityManager->flush();
    /*echo 'User with ID ' . $user->getId() .
       'was updated.' . PHP_EOL;*/
    header('Location: ../../update_user.php');
} catch (Exception $exception) {
    //echo $exception->getMessage() . PHP_EOL;
    header('Location: ../../update_user.php');
}


