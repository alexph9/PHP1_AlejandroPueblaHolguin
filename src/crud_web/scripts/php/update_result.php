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

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$resultId = (int) $_POST['resultid'];
$userId = (int) $_POST['userid'];
$results = (int) $_POST['result'];

$resultRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);
$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

$result->setUser($user);
$result->setResult($results);

try {
    $entityManager->persist($result);
    $entityManager->flush();
    /*echo 'Result with ID  ' . $result->getId()
        . ' was updated.' . PHP_EOL;*/
    header('Location: ../../update_result.php');
} catch (Exception $exception) {
    // echo $exception->getMessage();
    header('Location: ../../update_result.php');
}

