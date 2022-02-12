<?php
include "requests.php";
$year = date("Y");//Get current year

// Checks if the user gives a team number
if (isset($_GET['num']) || isset($_POST['num']) || isset($_GET['team']) || isset($_POST['team'])){
    // The messiest way to get input I have ever done
    if (isset($_POST['num'])){
        $number = $_POST['num'];
    }elseif (isset($_GET['num'])){
        $number = $_GET['num'];
    }elseif (isset($_POST['team'])){
        $number = $_POST['team'];
    }elseif (isset($_GET['team'])){
        $number = $_GET['team'];
    }

    $teamInfo = getTeamInfo(4272,false);
    $upcomingEvents = getTeamInfo(4272,false);
    echo $teamInfo;
    echo "\n";
    echo $upcomingEvents;
}else{
    echo json_encode(array("Error"=>"Failed: no 'num' status"));
}

?>
