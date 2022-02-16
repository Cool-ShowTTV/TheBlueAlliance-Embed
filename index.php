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

    // Check if user put a custom font name
    // I have no idea what font names are valid though
    if (isset($_GET['font'])){
        $fontName = $_GET['font'];
    }else{
        $fontName = "Courier, Monospace";
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
        echo "<text y=\"$svgTextSpace\"  font-size=\"15\" font-family=\"$fontName\" fill=\"#$svgColor\">$formatedName $formatedStartDate-$formatedEndDate</text>\n";
        $svgTextSpace += 15;
    }
    // End SVG file
    echo '</svg>';
}else{
    // Check if home file exists and if hosted on localhost
    //if (file_exists("pages/home.html") && $_SERVER ['SERVER_NAME'] == "localhost") {
    
    // Check if home file exists and if so load it
    if (file_exists("pages/home.html")) {

        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Content-Length:".filesize("pages/home.html"));
        readfile("pages/home.html");
        die();        
    } else {
        echo("<style>
        body {
            font-family: \"Montserrat\", sans-serif;
            background-color: black;
            height: 100vh;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }
        error{
            color: red;
        }
        message{
            color: green;
        }
        </style>");
        //die("<message>Home page is in the works.</message><message>Please don't worry it will be here soon!</message>");
        die("<error>Error: The home page was not found please submit a issue on <a href='https://github.com/Cool-showTTV/TheBlueAlliance-Embed'>github</a>.</error><br><error>In the report please give the link because this is strange!</error>");
    } 
}
