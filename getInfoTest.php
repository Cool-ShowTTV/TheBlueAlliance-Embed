<?php
/*------------------------------\
|     Just to test info so,     |
|   I can tell if I broke it.   |
|Most comments are same as index|
\------------------------------*/

include "requests.php";
$year = date("Y");//Get current year

// Checks if the user gives a team number
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

    // Get team info as a string
    $teamInfo = getTeamInfo($number,false);
    
    // Get event info for team as a string
    $upcomingEvents = getEventInfo($number,$year,false);

    // Print out the gathered info
    echo $teamInfo;
    echo "\n";
    echo $upcomingEvents;
}else{
    // User didn't give a team number so return an error
    http_response_code(400);
    echo json_encode(array("Error"=>"Failed: no 'num' status"));
}

?>
