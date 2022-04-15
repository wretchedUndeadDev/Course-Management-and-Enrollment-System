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

    //Get term year and season
    $term_year = isset($_GET['term_year']) ? $_GET['term_year'] : die();
    $term_season = isset($_GET['term_season']) ? $_GET['term_season'] : die();

    $result = $student->get_enrld_term_crs($term_year, $term_season);
    $num = $result->rowCount();
    if ($num > 0) {
        //There are enrolled courses for this student in this term
        $result_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row contents extracted to variables $course_id
            $item = array('course_id' => $course_id);
            
            array_push($result_arr, $item);
        }

        //return Json ( retrieved from calling webpage via file_get_contents() )
        print_r(json_encode($result_arr));

    } else {
        //There are NO addresses for this student
        print_r(json_encode(
            array('message'=>'No Enrolled courses for this student in this term found')
        ));
    }