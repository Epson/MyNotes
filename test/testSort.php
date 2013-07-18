<?php


require_once("../php/Algorithm.php");

$qs = new Algorithm();

$data = array(7,2,5,4,3,6,1,8,9);

$qs->quickSort($data, 0, 8);

print_r($data);

?>