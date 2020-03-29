<?php
/**
 * Custom PHP function that returns the date that
 * Easter Sunday fell on for a given year.
 *
 * @param bool|int $year If left as boolean FALSE, the current year will be used.
 * @return string Easter Sunday in a YYYY-MM-DD format.
 */
function getEasterDate($year = false){
    if($year === false) {
        $year = date("Y");
    }
    $easterDays = easter_days($year);
    $march21 = date($year . '-03-21');
    return date('Y-m-d', strtotime("$march21 + $easterDays days"));
}

echo getEasterDate(2020);
?>