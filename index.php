<?php
$APIKey = getenv('API-Key');
if (isset($_GET['link'])){
    echo"Link exists";
}else{
    echo"Link doesn't exist";
}

?>
