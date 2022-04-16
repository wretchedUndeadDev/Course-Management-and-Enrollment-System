<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');

    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    //Get Database Class
    include_once '../../config/Database.php';
    //Get Student Class
    include_once '../../models/Student.php';

    // Instantiate DB and connect
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
    if($student->enrl_cls($class_course_id, $class_num)) {
        echo json_encode(
            array('message'=> 'Student successfully enrolled in class')
        );
    } else {
        echo json_encode(
            array('message'=> 'Student could not be enrolled in class')
        );
    }
