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

$resultRepository = $entityManager->getRepository(Result::class);
$results = $resultRepository->findAll();

if ($results === null) {
    echo 'Results don´t exist' . PHP_EOL;
    exit(1);
}

try {
    $items = 0;
    foreach ($results as $result) {
        $entityManager->remove($result);
        $entityManager->flush();
        $items++;
    }
    echo 'Total: ' . $items
        . ' results have been deleted.' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage();
}