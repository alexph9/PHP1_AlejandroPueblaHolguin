<?php
/**
 * PHP version 7.2
 *
 * @category Scripts
 * @author   Alejandro Puebla Holguin <a.pueblah@alumnos.upm.es>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
 */

use MiW\Results\Entity\Result;
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

    Usage: $fich <ResultId> <UserId> <Result>

MARCA_FIN;
    exit(0);
}

$resultId = (int) $argv[1];
$userId = (int) $argv[2];
$results = (int) $argv[3];
$resultRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);
$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if ($result === null) {
    echo 'Result with ID ' . $resultId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}
if ($user === null) {
    echo 'User with ID ' . $userId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}

$result->setUser($user);
$result->setResult($results);

try {
    $entityManager->persist($result);
    $entityManager->flush();
    echo 'Result with ID  ' . $result->getId()
        . ' was updated.' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}

