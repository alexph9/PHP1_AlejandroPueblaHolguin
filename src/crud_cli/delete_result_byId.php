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

    Usage: $fich <ResultId> 

MARCA_FIN;
    exit(0);
}

$resultId = (int) $argv[1];

$resultRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);

if ($result === null) {
    echo 'Result with ID ' . $resultId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}

try {
    $entityManager->remove($result);
    $entityManager->flush();
    echo 'Result with ID  ' . $resultId
        . ' was deleted.' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}