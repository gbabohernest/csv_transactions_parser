<?php

declare(strict_types=1);


/**
 * @getCsvTransactionsFiles : Read file(s) from within a given $dirPath.
 * @param string $dirPath : Path to the directory where all the transactions file(s) are located.
 * @return array : Array containing transaction file(s).
 */
function getCsvTransactionFiles(string $dirPath): array
{
    $transactionFiles = [];
    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }
        $transactionFiles[] = $dirPath . $file;
    }
//        var_dump($file);
    return $transactionFiles;
}


/**
 * @readTransactionsFromCsvFiles : Read and extract transaction(s) data from csv file(s).
 * @param string $fileName : Name of the csv transaction file.
 * @return array : Array of extracted transactions data.
 */
function readTransactionsFromCsvFiles(string $fileName): array
{
    if (!file_exists($fileName)) {
        trigger_error('File' . $fileName . 'does not exists!!', E_USER_ERROR);
    }

    $csvFile = fopen($fileName, 'r');

    fgetcsv($csvFile); //removes top row containing headers

    $transactions = [];

    while (($transactionsData = fgetcsv($csvFile)) !== false) {
        $transactions[] = $transactionsData;
    }

    return $transactions;
}