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
    $course = new Course($db);

    //Get course_id from url and set student objects student_id attribute to it
    $course->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    //get class type
    $class_num = isset($_GET['class_num']) ? $_GET['class_num'] : die();

    //Retrieve Student Addresses
    $result = $course->get_crs_cls_days($class_num);
    $num = $result->rowCount();
    if ($num > 0) {
        //There are days for this courses class
        $result_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row contents extracted to variables $day
            $item = array('day' => $day);
            
            array_push($result_arr, $item);
        }

        //return Json ( retrieved from calling webpage via file_get_contents() )
        print_r(json_encode($result_arr));

    } else {
        //There are NO days for this courses class
        print_r(json_encode(
            array('message'=>'No Days for this course\'s class Found')
        ));
    }
