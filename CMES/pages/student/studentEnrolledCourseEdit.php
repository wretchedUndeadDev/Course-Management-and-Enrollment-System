<?php
    include('../../config/config.php');

    //Retrieve student_id in Cookie
    if (isset($_COOKIE['student_id'])) {
        $student_id = $_COOKIE['student_id'];

        //Retrieve course_id from post
        if (isset($_POST['Edit'])) {
            $course_id = $_POST['Edit'];

            //Call api and get students enrolled course information
            $all_enrolled_course_classes = json_decode(file_get_contents(ROOT_URL.'api/course/get_classes.php?course_id='.$course_id.''));
            $general_course_data = json_decode(file_get_contents(ROOT_URL.'api/course/get_gen_info.php?course_id='.$course_id.''));
            $course_prereqs = json_decode(file_get_contents(ROOT_URL.'/api/course/get_prereqs.php?course_id='.$course_id.''));
            $course_antireqs = json_decode(file_get_contents(ROOT_URL.'/api/course/get_antireqs.php?course_id='.$course_id.''));
            $student_taken_courses = json_decode(file_get_contents(ROOT_URL.'/api/student/get_tkn_crs?student_id'.$student_id.''));

        }
    }
    //Page requires student_id and course_id to display, raise error otherwise

    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Course Management and Enrollment System | Student | Course Information</title>

        <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL.'Styles/bootstrap.css'?>">

        <style>
            /*https://stackoverflow.com/questions/3525581/how-to-align-footer-div-to-the-bottom-of-the-page*/
            html, body {
                margin: 0px;
                padding: 0px;
                min-height: 100%;
                height: 100%;
            }
            #mainContentWrapper {
                min-height: 100%;
                height: auto !important;
                margin-bottom: -50px;
            }
            #mainContentWrapper:after {
                content: "";
                display: block;
                height: 50px;
            }
            #mainContentContainer {
                height: 100%;
            }
            #footer {
                height: 50px;
            }
            #footerContent {
                text-align: center;
                border: 2px solid #4582ec;
                height: 32px;
                padding: 8px;
            }

            /*Center Align main titles*/
            #mainTitleContainer {
                flex-direction: row;
                justify-content:center;
                padding: 1%;
            }
            #mainTitle1 {
                margin-left:auto;
                text-align: center;
            }
            #homeButtonOuter {
                margin-left:auto;
            }
            #homeButtonInner {
                height: 100%;
                width: 100%;
            }
            #line1 {
                background-color: #4582ec;
                height: 2vw;
            }

            /*Content Grid Alignment*/
            #mainGridWrapper {
                display: grid;
                /*Specify number of grid-templat-rows + grid-templat-cols*/
                row-gap: .5vw;
                margin-left: 2vw;
                margin-right: 2vw;
            }


            /*PLACE ANY CUSTOM SYTLING FOR PAGE HERE*/
            #courseInfoGrid {
                display: grid;
                grid-template-rows: auto auto auto auto;
                align-content: center;
                column-gap: 2vw;
                row-gap: 1vw;
            }
            #courseInfoGrid_courseID_section {
                grid-row: 1;
            }
            #courseInfoGrid_courseID_section h5 {
                display: inline;
            }
            #courseInfoGrid_courseLevel_section {
                grid-row: 2;
            }
            #courseInfoGrid_courseLevel_section h5 {
                display: inline;
            }
            #courseInfoGrid_courseCredit_section {
                grid-row: 3;
            }
            #courseInfoGrid_courseCredit_section h5 {
                display: inline;
            }
            #courseInfoGrid_courseDesc_section {
                grid-row: 4;
            }
            #courseInfoGrid_courseDesc_section p {
                margin-left: 2.5%;
            }


            /*Content-Responsivness*/
            .responsiveText {
                font-size: 1.2vw;
            }
            .responsiveTitle {
                font-size: 2vw;
            }
            .responsiveButton {
                font-size: 1vw;
            }
        </style>

    </head>
    <body>
        <div id="mainContentWrapper">
            <div id="mainContentContainer">
                <header>
                    <div id="mainTitleContainer" class="card text-white bg-primary mb-3">
                        <h1 id="mainTitle1">Enrolled Courses</h1>
                        <a id="homeButtonOuter" href="<?php echo ROOT_URL.'pages/student/studentHome.php' ?>">
                            <button id="homeButtonInner" class="btn btn-warning responsiveButton">Home</button>
                        </a>
                    </div>
                </header>
                <hr id="line1">

                <div id="mainGridWrapper">

                    <div id="generalCourseInfoCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle"><?php echo $general_course_data->course_name; ?></h4>
                        </div>
                        <div class="card-body">
                            <div id="courseInfoGrid">

                                <div id="courseInfoGrid_courseID_section">
                                    <h5 id="courseID_label" class="responsiveText">Course ID:</h5>
                                    <h5 id="courseID" class="responsiveText"><?php echo $general_course_data->course_id; ?></h5>
                                </div>

                                <div id="courseInfoGrid_courseLevel_section">
                                    <h5 id="courseLevel_label" class="responsiveText">Level:</h5>
                                    <h5 id="courseLevel" class="responsiveText"><?php echo $general_course_data->course_level; ?></h5>
                                </div>

                                <div id="courseInfoGrid_courseCredit_section">
                                    <h5 id="courseCredit_label" class="responsiveText">Credit:</h5>
                                    <h5 id="courseCredit" class="responsiveText"><?php echo $general_course_data->course_credit; ?></h5>
                                </div>

                                <div id="courseInfoGrid_courseDesc_section">
                                    <h5 id="courseDesc_label" class="responsiveText">Description:</h5>
                                    <p id="courseDesc" class="responsiveText">
                                        <?php echo $general_course_data->course_description; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Need to get students taken courses and courese prereqs and antireqs-->

                    <div id="coursePrereqCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Course Prerequisites</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach($course_prereqs as $cp) : ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?php echo $cp->course_name?>
                                        <?php if (in_array($cp->course_prereq_id, (array)$student_taken_courses)) : ?>
                                            <span class="badge rounded-pill bg-success">
                                                Course Completed
                                            </span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill bg-danger">
                                                Course not Completed
                                            </span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>



                    <div id="courseAntireqCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Course Antirequisites</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                            <?php foreach($course_antireqs as $cp) : ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?php echo $cp->course_name?>
                                        <?php if (in_array($cp->course_prereq_id, (array)$student_taken_courses)) : ?>
                                            <span class="badge rounded-pill bg-success">
                                                Course Completed
                                            </span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill bg-danger">
                                                Course not Completed
                                            </span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>



                    <div id="courseLectureCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Please select from one of the following lectures</h4>
                        </div>
                        <div class="card-body">
                            <div id="lectureSelection" class="form-group">
                                <label for="lectureSelect" class="form-label mt-4">Available Lectures</label>    
                                <select class="form-select" id="lectureSelect">
                                    <?php 
                                        $lectures = json_decode(file_get_contents(ROOT_URL.'api/course/get_avlbl_class?course_id='.$course_id.'&type=L')); 
                                        foreach($lectures as $lec) :
                                            $days = json_decode(file_get_contents(ROOT_URL.'api/course/get_crs_cls_days?course_id='.$course_id.'&class_num='.$lec->class_num.''));
                                            
                                    ?>
                                    <option>
                                        <span>Class Number: <?php echo $lec->class_num; ?></span>
                                        <span>Instructor: <?php echo $lec->instructor; ?></span>
                                        <span>Room Number: <?php echo $lec->room_num; ?></span>
                                        <span>Time: <?php echo $lec->start_time.'-'.$lec->end_time; ?></span>
                                        <span>Days: 
                                            <?php foreach($days as $day) : 
                                                if (array_key_exists('day',$day)) :
                                                    echo $day->day;
                                                else:
                                                    echo "no days for this class scheduled"; 
                                                endif;
                                            endforeach; ?>
                                        </span>
                                    </option>
                                    <?php endforeach; ?>
                                </select>    
                            </div>
                        </div>
                    </div>

                    <div id="courseLabCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Selected Lab</h4>
                        </div>
                        <div class="card-body">
                        <?php foreach($student_enrolled_course_classes as $class) : ?>
                                <?php if ($class->class_type = 'A') : ?>
                                    <span class="badge bg-warning">Class Number: 
                                        <?php echo $class->class_num; ?>
                                    </span>
                                    <span class="badge bg-warning">Supervisor: 
                                        <?php echo $class->instructor; ?>
                                    </span>
                                    <span class="badge bg-warning">Room: 
                                        <?php echo $class->room_num; ?>
                                    </span>
                                    <span class="badge bg-warning">Time: 
                                        <?php echo $class->start_time.' - '.$class->end_time; ?>
                                    </span>
                                    <span class="badge bg-warning">Class Days: 
                                        <?php
                                            $class_days = json_decode(file_get_contents(ROOT_URL.'api/student/get_enrld_crs_cls_days.php?student_id='.$student_id.'&class_course_id='.$course_id.'&class_num='.$class->class_num.''));
                                            foreach($class_days as $cd) {
                                                echo $cd->day;
                                            }
                                        ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div id="courseTutorialCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Selected Tutorial</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach($student_enrolled_course_classes as $class) : ?>
                                <?php if ($class->class_type = 'T') : ?>
                                    <span class="badge bg-warning">Class Number: 
                                        <?php echo $class->class_num; ?>
                                    </span>
                                    <span class="badge bg-warning">TA: 
                                        <?php echo $class->instructor; ?>
                                    </span>
                                    <span class="badge bg-warning">Room: 
                                        <?php echo $class->room_num; ?>
                                    </span>
                                    <span class="badge bg-warning">Time: 
                                        <?php echo $class->start_time.' - '.$class->end_time; ?>
                                    </span>
                                    <span class="badge bg-warning">Class Days: 
                                        <?php
                                            $class_days = json_decode(file_get_contents(ROOT_URL.'api/student/get_enrld_crs_cls_days.php?student_id='.$student_id.'&class_course_id='.$course_id.'&class_num='.$class->class_num.''));
                                            foreach($class_days as $cd) {
                                                echo $cd->day;
                                            }
                                        ?>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div><!--MainGridWrapper-->
            </div><!--MainContentContainer-->
        </div><!--MainContentWrapper-->

        <footer id="footer">
            <div id="footerContent" class="card text-white bg-primary mb-3">
                Copyright &copy; 2022 Brett Gattinger, Melissa Hoang, Munhib Saaid
            </div>
        </footer>

    </body>
</html>