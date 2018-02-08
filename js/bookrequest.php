<?php

$request = file_get_contents("php://input");
$POST_data = json_decode($request);
print_r(($POST_data)); die;
?>