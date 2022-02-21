<?php
$year = date("Y");//Get current year
$svgTextSpace = 15;

function createSVG($number,$svgColor,$fontName){
    global $svgTextSpace, $year;
    // Get a list of all upcoming events for a team number
    $upcomingEvents = getEventInfo($number,$year,true);

    // Convert to colums for each needed data type
    $nameColumns = array_column($upcomingEvents,'name');
    $startDateColumns = array_column($upcomingEvents,'start_date');
    $endDateColumns = array_column($upcomingEvents,'end_date');

    $outPut = "";

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
        $outPut = "$outPut\t<text y=\"$svgTextSpace\"  font-size=\"15\" font-family=\"$fontName\" fill=\"#$svgColor\">$formatedName $formatedStartDate-$formatedEndDate</text>\n";
        $svgTextSpace += 15;
    }

    echo "<svg height=\"$svgTextSpace\" width=\"100%\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
    echo $outPut;
    // End SVG file
    echo '</svg>';
}