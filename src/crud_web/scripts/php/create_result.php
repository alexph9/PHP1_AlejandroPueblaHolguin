<?php
/**
 * PHP version 7.2
 * src/crud_cli/create_result.php
 *
 * @category Utils
 * @package  MiW\Results
 * @author   Javier Gil <franciscojavier.gil@upm.es>
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

$newResult    = (int) $_POST['result'];
$userId       = (int) $_POST['userid'];
$newTimestamp = new DateTime('now');

/** @var User $user */
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

$result = new Result($newResult, $user, $newTimestamp);
try {
    $entityManager->persist($result);
    $entityManager->flush();
    /*echo 'Created Result with ID ' . $result->getId()
        . ' USER ' . $user->getUsername() . PHP_EOL;*/
    header('Location: ../../create_result.php');
} catch (Exception $exception) {
    //echo $exception->getMessage();
    header('Location: ../../create_result.php');
}
