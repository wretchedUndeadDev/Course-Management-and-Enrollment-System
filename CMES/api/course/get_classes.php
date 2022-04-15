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

    //Get student_id from url and set student objects student_id attribute to it
    $course->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    //Retrieve Student Addresses
    $result = $course->get_classes();
    $num = $result->rowCount();
    if ($num > 0) {
        //There are addresses for this student
        $result_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row contents extracted to variables $parent_course_id, $class_num, $room_num, $seat_num,
            //$waitlist_num, $start_time, $end_time, $class_type, $instructor, $ta, $supervisor
            $item = array('parent_course_id' => $parent_course_id,
                            'class_num' => $class_num,
                            'room_num' => $room_num,
                            'seat_num' => $seat_num,
                            'waitlist_num' => $waitlist_num,
                            'start_time' => $start_time,
                            'end_time' => $end_time,
                            'class_type' => $class_type,
                            'instructor' => $instructor,
                            'ta' => $ta,
                            'supervisor' => $supervisor
            );
            
            array_push($result_arr, $item);
        }

        //return Json ( retrieved from calling webpage via file_get_contents() )
        print_r(json_encode($result_arr));

    } else {
        //There are NO addresses for this student
        print_r(json_encode(
            array('message'=>'No Classes for this course Found')
        ));
    }
