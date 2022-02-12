<?php
include "requests.php";
$year = date("Y");//Get current year

if (isset($_GET['num']) || isset($_POST['num']) || isset($_GET['team']) || isset($_POST['team'])){
    // The messiest way to get input I have ever done don't look
    if (isset($_POST['num'])){
        $number = $_POST['num'];
    }elseif (isset($_GET['num'])){
        $number = $_GET['num'];
    }elseif (isset($_POST['team'])){
        $number = $_POST['team'];
    }elseif (isset($_GET['team'])){
        $number = $_GET['team'];
    }

    // Get a list of all upcoming events for a team number
    $upcomingEvents = getEventInfo($number,$year,true);

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
}else{
    // I am going to add a home page one I get a chance but for now it's going to out and error
    http_response_code(400);
    echo json_encode(array("Error"=>"Failed: no 'num' status"));
}