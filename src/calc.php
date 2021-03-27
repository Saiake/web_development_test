<?php
$date = $_POST['date'];
$sum = $_POST['sum'];
$term = $_POST['term'];
$rep = $_POST['rep'];
$sumpop = $_POST['sumpop'];
list($day, $month, $year) = explode('.', $date);

if ($rep == "Нет") {
    $sumpop = 0;
}

for ($i = 1; $i <= 12 * $term - 1; $i++) {

    if ($i == 1) {
        $sum = $sum + ($sum + $sumpop) * (cal_days_in_month(CAL_GREGORIAN, $month, $year) - $day + 1) * (0.1 / days_in_year($year));
        $month++;
        if ($month > 12) {
            $month = 1;
            $year++;
        }
    }
    
    if ($i == 12 * $term - 1) {
        $sum = $sum + ($sum + $sumpop) * (cal_days_in_month(CAL_GREGORIAN, $month, $year) + $day - 1) * (0.1 / days_in_year($year));
    }

    else {
        $sum = $sum + ($sum + $sumpop) * cal_days_in_month(CAL_GREGORIAN, $month, $year) * (0.1 / days_in_year($year));
        $month++;
        if ($month > 12) {
            $month = 1;
            $year++;
        }
    }
}

function days_in_year ($year) {
    $days = 0;
    for ($i = 1; $i <= 12; $i++) {
        $days += cal_days_in_month(CAL_GREGORIAN, $i, $year);
    }
    return $days;
}
echo intval($sum),' руб.';
?>