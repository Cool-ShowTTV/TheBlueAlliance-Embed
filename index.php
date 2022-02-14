<?php
include "requests.php";
$year = date("Y");//Get current year
$svgTextSpace = 15;



if (isset($_GET['num']) || isset($_GET['team'])){
    header('Content-Type: image/svg+xml');
    echo '<svg
        height="45"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >';

    // The messiest way to get input I have ever done don't look
    if (isset($_GET['num'])){
        $number = $_GET['num'];
    }elseif (isset($_GET['team'])){
        $number = $_GET['team'];
    }
    
    // Check if user put a custom color
    if (isset($_GET['color'])){
        $svgColor = $_GET['color'];
    }else{
        $svgColor = "d7d3cb";
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

        // Old output
        //echo "$formatedName $formatedStartDate-$formatedEndDate<br>\n";

        // Output the list of events with Start and End date in SVG format
        echo "<text y=\"$svgTextSpace\"  font-size=\"15\" font-family=\"Courier, Monospace\" fill=\"#$svgColor\">$formatedName $formatedStartDate-$formatedEndDate</text>\n";
        $svgTextSpace += 15;
    }
    // End SVG file
    echo '</svg>';
}else{
    // I am going to add a home page one I get a chance but for now it's going to out and error
    http_response_code(400);
    echo json_encode(array("Error"=>"Failed: no 'num' status", "Note"=>"A home page is coming soon I just have not done it yet"),JSON_PRETTY_PRINT);
}
