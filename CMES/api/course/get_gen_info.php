<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //Get Database Class
    include_once '../../config/Database.php';
    //Get Student Class
    include_once '../../models/Course.php';

    // Instantiate Database object and connect to actual database
    $database = new Database();
    $db = $database->connect();

    // Instantiate Student object and give it connection to database
    $course= new Course($db);

    //Get student_id from url and set student objects student_id attribute to it
    $course->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    $result = $course->get_gen_info();
    $result_arr = array(
        'course_id' => $course->course_id,
        'course_name' => $course->course_name,
        'course_level' => $course->course_level,
        'course_description' => $course->course_description,
        'course_credit' => $course->course_credit
    );

    //return Json ( retrieved from calling webpage via file_get_contents() )
    print_r(json_encode($result_arr));