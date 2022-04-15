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

    //Get course_id from url
    $course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    //Retrieve all classes for students enrolled course
    $result = $student->get_enrld_crs_cls($course_id);
    $num = $result->rowCount();
    if ($num > 0) {
        //There are classes for this students enrolled course
        $result_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            /* row contents extracted to variables  
                        cls.parent_course_id, cls.class_num, 
                        cls.room_num, cls.seat_num, cls.waitlist_num, 
                        cls.start_time, cls.end_time, 
                        cls.class_type, cls.instructor, cls.ta, cls.supervisor*/
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
        //There are NO classes for this students enrolled course
        print_r(json_encode(
            array('message'=>'No Classes Found')
        ));
    }
