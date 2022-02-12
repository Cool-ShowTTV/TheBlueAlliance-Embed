<?php
include "requests.php";
$year = date("Y");//Get current year


$upcomingEvents = getEventInfo(1,$year,true);
$nameColumns = array_column($upcomingEvents,'name');
$startDateColumns = array_column($upcomingEvents,'start_date');
$endDateColumns = array_column($upcomingEvents,'end_date');
foreach ($upcomingEvents as $x => $val) {
    $formatedName = html_entity_decode(ltrim(stristr($nameColumns[$x], "District "),"District "));
    $formatedName = substr($formatedName, 0, strpos($formatedName, "Event")+5);

    $formatedStartDate = date_format(date_create($startDateColumns[$x]), "F j");
    $formatedEndDate = date_format(date_create($endDateColumns[$x]), "j");
    echo "$formatedName $formatedStartDate-$formatedEndDate<br>\n";
}