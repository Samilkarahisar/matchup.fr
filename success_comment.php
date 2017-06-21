<?php
session_start();

$goback = $_SESSION['backhere'];
$lien = "Location: " . $goback; 
header($lien);
exit;



?>