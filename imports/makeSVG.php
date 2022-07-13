<?php
$year = date("Y");//Get current year
$spaceApart = 15;

function createSVG(){
    global $spaceApart, $year;

    // The messiest way to get input I have ever done don't look
    if (isset($_GET['num'])){
        $number = $_GET['num'];
    }elseif (isset($_GET['team'])){
        $number = $_GET['team'];
    }

    // Check if user put a custom color
    if (isset($_GET['color'])){
        $svgColor = $_GET['color'];
        $svgColor = htmlspecialchars($svgColor);
    }else{
        // This is just a color that I think looks good on GitHub's light and dark mode
        $svgColor = "d7d3cb";
    }

    // Check if user put a custom font name
    // I have no idea what font names are valid though
    if (isset($_GET['font'])){
        $fontName = $_GET['font'];
    }else{
        $fontName = "Courier, Monospace";
    }
    // Check if user put a custom font name
    if (isset($_GET['doubleSpace']) && $_GET['doubleSpace'] == "true"){
        $svgTextSpace = $spaceApart;
        $spaceApart = $spaceApart*2;
    }else{
        $svgTextSpace = $spaceApart;
    }

    header('Content-Type: image/svg+xml');

    // Get a list of all upcoming events for a team number
    $upcomingEvents = getEventInfo($number,$year,true);

    // Convert to colums for each needed data type
    $nameColumns = array_column($upcomingEvents,'name');
    $startDateColumns = array_column($upcomingEvents,'start_date');
    $endDateColumns = array_column($upcomingEvents,'end_date');

    $outPut = "";

    // Loop for each event
    foreach ($upcomingEvents as $x => $val) {
        $formatedName = html_entity_decode($nameColumns[$x]);
        // Remove anything that is unneeded or what event it is to make it look cleaner
        if (str_contains($nameColumns[$x], "Championship")){
            //$formatedName = ltrim(stristr($formatedName, "Championship "),"Championship ");
        }
        
        if (str_contains($nameColumns[$x], "District")){
            $formatedName = ltrim(stristr($formatedName, "District "),"District ");
        }

        // Remove FIRST from the name (may remove later)
        if (str_contains($nameColumns[$x], "FIRST")){
            $formatedName = ltrim(stristr($formatedName, "FIRST"),"FIRST");
        }

        if (str_contains($nameColumns[$x], "Event")){
            $formatedName = substr($formatedName, 0, strpos($formatedName, "Event")+5);
        }
        // Remove any double spaces
        $formatedName = str_replace("  ", " ", $formatedName);
        $formatedName = ltrim($formatedName);

        // Format into "Month day" and "day" to be able to list the start and end days
        $formatedStartDate = date_format(date_create($startDateColumns[$x]), "F j");
        $formatedEndDate = date_format(date_create($endDateColumns[$x]), "j");

        // Old output
        //echo "$formatedName $formatedStartDate-$formatedEndDate<br>\n";

        // Output the list of events with Start and End date in SVG format
        $outPut = "$outPut\t<text y=\"$svgTextSpace\"  font-size=\"15\" font-family=\"$fontName\" fill=\"#$svgColor\">$formatedName $formatedStartDate-$formatedEndDate</text>\n";
        $svgTextSpace += $spaceApart;
    }

    echo "<svg height=\"$svgTextSpace\" width=\"100%\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n";
    echo $outPut;
    // End SVG file
    echo '</svg>';
}
