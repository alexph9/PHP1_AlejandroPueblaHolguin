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

if ($argc !== 6) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <UserId> <Username> <Email> <Password> <Enabled>

MARCA_FIN;
    exit(0);
}

$userId = (int) $argv[1];
$username = $argv[2];
$email =  $argv[3];
$password = $argv[4];
$enabled = $argv[5];

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if ($user === null) {
    echo 'User with ID ' . $userId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}

$user->setUsername($username);
$user->setEmail($email);
$user->setPassword($password);
switch ($enabled){
    case '0':
    case 'false':
        $user->setEnabled(false);
        break;
    case '1':
    case 'true':
        $user->setEnabled(true);
        break;
    default:
        $user->setEnabled(false);
        break;
}

try {
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'User with ID ' . $user->getId() .
       'was updated.' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}


