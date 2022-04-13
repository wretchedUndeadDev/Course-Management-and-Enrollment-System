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

    //Check for login Data
    if (isset($_POST['login'])) {
        //Get login form data
        $student_id = $_POST['student_id'];
        $Lname = $_POST['Lname'];

        if ($student->login() == true) {

        }
    }