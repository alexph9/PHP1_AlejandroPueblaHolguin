<?php
/**
 * PHP version 7.2
 * src/crud_cli/create_regular_user.php
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

if ( $argc < 2 || $argc > 3) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN

    Usage: $fich <ResultId>

MARCA_FIN;
    exit(0);
}

$resultId =  $argv[1];

$userRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);

if( $result === null) {
    echo 'Result with ID ' . $resultId
        . ' not exist. ' . PHP_EOL;
    exit(1);
}

if (in_array('--json', $argv, true)) {
    echo json_encode($result, JSON_PRETTY_PRINT);
    echo PHP_EOL;
} else {
    echo PHP_EOL
        .sprintf('%3s - %3s - %22s - %s', 'Id', 'Result', 'Username', 'Time')
        . PHP_EOL;
    /** @var Result $result */
    echo $result . PHP_EOL.PHP_EOL;
}
