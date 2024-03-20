<?php

declare(strict_types=1);

/**
 * @formatAmount: Formats the amount properly like a currency value
 * @param float $amount : Amount to be formatted
 * @return string : A formatted amount in string
 */
function formatAmount(float $amount): string
{
    $isAmountNegative = $amount < 0;

    return ($isAmountNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}


/**
 * @formatDate: Formats transactions date properly like (March 19, 2024)
 * @param string $date to be formatted
 * @return string : A formatted date string
 */
function formatDate(string $date): string
{
    return date('M j, Y', strtotime($date));
}
