<?php
include("imports/simple_html_dom.php") ;

$number = 254; //254 is the team number that i use to test

echo "<head>\n";
echo "<style>\n".file_get_contents("https://www.thebluealliance.com/py3_css/tba_combined_style.main.min.css")."\n</style>\n"; 
echo "</head>\n";

$html = file_get_html("https://www.thebluealliance.com/team/{$number}/history");
$data = "";
$count = $totalCount = 0;
foreach($html->find('div.banner') as $banner)
{
    if (!str_contains($banner, "hidden"))
    {   
        $data= $data . str_replace("<img src=\"/","<img src=\"https://www.thebluealliance.com/","{$banner}\n");
        $count++;
        $totalCount++;
        if ($count == 5) {$data= $data . "<br>\n"; $count = 0;}
    }
}
#$data= str_replace("     ","\n\t",$data);
$data= str_replace("     "," ",$data);
echo "<body style='padding-top:0'>\n";
echo "<div class=\"text-center\">{$data}<br>{$totalCount} total blue banners!</div>";

echo "</body>\n";
#echo $data;