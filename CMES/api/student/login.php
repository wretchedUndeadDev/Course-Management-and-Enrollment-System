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

    //Get student_id and Lname from url and set student objects student_id attribute to it
    $student->student_id = isset($_GET['student_id']) ? $_GET['student_id'] : die();
    $student->Lname = isset($_GET['Lname']) ? $_GET['Lname'] : die();

    //Check Student login credentials
    $student->login();
    $result_arr = array(
        'student_id'=>$student->student_id
    );

    //return Json ( retrieved from calling webpage via file_get_contents() )
    print_r(json_encode($result_arr));



