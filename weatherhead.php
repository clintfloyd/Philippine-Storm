<?php
$file = file_get_contents("http://localhost/weatherapi.php?location=Philippines&view=today",true);
print_r($file);
?>