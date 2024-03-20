<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);


require APP_PATH . "App.php";

$transactionsFiles = getCsvTransactionFiles(FILES_PATH);
//var_dump($transactionsFiles);


$allTransactions = [];

foreach ($transactionsFiles as $file) {
    $allTransactions = array_merge($allTransactions, readTransactionsFromCsvFiles($file, 'formatTransactionData'));
}

//print_r($allTransactions);

//pass the allTransactions to the view
require VIEWS_PATH . "transactions.php";