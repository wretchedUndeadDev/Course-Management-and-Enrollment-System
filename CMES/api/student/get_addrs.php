<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //Get Database Class
    include_once '../../config/Database.php';
    //Get Student Class
    include_once '../../models/Student.php';

    // Instantiate Database object and connect to actual database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Student object and give it connection to database
    $student = new Student($db);

    //Get student_id from url and set student objects student_id attribute to it
    $student->student_id = isset($_GET['student_id']) ? $_GET['student_id'] : die();

    //Retrieve Student Addresses
    $result = $student->get_addrs();
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
            array('message'=>'No Addresses Found')
        ));
    }
