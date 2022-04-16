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

//Get student_id from url and set student objects student_id attribute to it
$admin->admin_id = isset($_GET['admin_id']) ? $_GET['admin_id'] : die();

//Retrieve Student Addresses
$result = $admin->get_addrs();
$num = $result->rowCount();
if ($num > 0) {
    //There are addresses for this student
    $result_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        //row contents extracted to variables $address
        $item = array('address' => $address);

        array_push($result_arr, $item);
    }

    //return Json ( retrieved from calling webpage via file_get_contents() )
    print_r(json_encode($result_arr));
} else {
    //There are NO addresses for this student
    print_r(json_encode(
        array('message' => 'No Addresses Found')
    ));
}
