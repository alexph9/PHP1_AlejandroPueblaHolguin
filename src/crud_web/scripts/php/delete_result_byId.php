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

$resultRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);


try {
    $entityManager->remove($result);
    $entityManager->flush();
    /*echo 'Result with ID  ' . $resultId
        . ' was deleted.' . PHP_EOL;*/
    header('Location: ../../delete_result_byId.php');
} catch (Exception $exception) {
    //echo $exception->getMessage();
    header('Location: ../../delete_result_byId.php');
}