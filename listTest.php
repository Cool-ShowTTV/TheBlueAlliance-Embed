<?php
/*------------------------------\
|    Just to test listing so    |
|   I can tell if I broke it.   |
|All comments are same as index.|
\------------------------------*/

include "requests.php";
$year = date("Y");//Get current year

// Get event info for team 1 because yes
$upcomingEvents = getEventInfo(1,$year,true);

// Convert to colums for each needed data type
$nameColumns = array_column($upcomingEvents,'name');
$startDateColumns = array_column($upcomingEvents,'start_date');
$endDateColumns = array_column($upcomingEvents,'end_date');

// Loop for each event
foreach ($upcomingEvents as $x => $val) {
    // Remove anything that talks about what district it is or what event it is to make it look cleaner
    $formatedName = html_entity_decode(ltrim(stristr($nameColumns[$x], "District "),"District "));
    $formatedName = substr($formatedName, 0, strpos($formatedName, "Event")+5);

    // Format into "Month day" and "day" to be able to list the start and end days
    $formatedStartDate = date_format(date_create($startDateColumns[$x]), "F j");
    $formatedEndDate = date_format(date_create($endDateColumns[$x]), "j");
    
    // Output the list of events with Start and End date
    echo "$formatedName $formatedStartDate-$formatedEndDate<br>\n";
}