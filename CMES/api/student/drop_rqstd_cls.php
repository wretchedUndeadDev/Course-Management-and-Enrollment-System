<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


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
    //Get class_course_id and class_num from url
    $class_course_id = isset($_GET['class_course_id']) ? $_GET['class_course_id'] : die();
    $class_num = isset($_GET['class_num']) ? $_GET['class_num'] : die();

    //Delete student_course_class_enroll_tuple
    if($student->drop_rqstd_cls($class_course_id, $class_num)) {
        echo json_encode(
            array('message'=> 'Student requested class successfully dropped')
        );
    } else {
        echo json_encode(
            array('message'=> 'Student requested class could not be dropped')
        );
    }