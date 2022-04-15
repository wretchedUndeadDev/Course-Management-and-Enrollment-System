<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//Get Database Class
include_once '../../config/Database.php';
//Get Admin Class
include_once '../../models/Admin.php';

// Instantiate Database object and connect to actual database
$database = new Database();
$db = $database->connect();

// Instantiate Admin object and give it connection to database
$admin = new Admin($db);

//Get admin_id from url and set admin objects admin_id attribute to it
$admin->admin_id = isset($_GET['admin_id']) ? $_GET['admin_id'] : die();

//Retrieve admin Basic information
$admin->get_gen_info();
$result_arr = array(
    'admin_id' => $admin->admin_id,
    'Fname' => $admin->Fname,
    'Lname' => $admin->Lname,
    'bio' => $admin->bio,
);

//return Json ( retrieved from calling webpage via file_get_contents() )
print_r(json_encode($result_arr));
