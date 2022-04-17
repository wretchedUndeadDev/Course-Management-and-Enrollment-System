<?php
    include('../../config/config.php');

    //Retrieve student_id in Cookie
    if (isset($_COOKIE['student_id'])) {
        $student_id = $_COOKIE['student_id'];

        //Call API and get student's enrolled terms
        $student_enrolled_terms = json_decode(file_get_contents(ROOT_URL.'api/student/get_enrld_term.php?student_id='.$student_id.''));
        //Load in first term and its courses by default
        $student_selected_term = $student_enrolled_terms[0];
        $student_enrolled_courses_for_selected_term = json_decode(file_get_contents(ROOT_URL.'api/student/get_enrld_term_crs.php?student_id='.$student_id.'&term_year='.$student_selected_term->season.''));

        //DEBUGGING
        /*
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        foreach ($student_enrolled_terms as $a) {
            print_r($a->year);
            print_r($a->season);
        }
        */
        
        
        foreach ($student_enrolled_terms as $term) {
            $term_button_name = $term->year."_".$term->season;
            if (array_key_exists($term_button_name, $_POST)) {

                $student_selected_term = $term;

                //DEBUGGING
                /*
                if (isset($_POST[$term_button_name])) {
                    echo "I will display courses for this term ".$selected_term->year." ".$selected_term->season;
                }
                */

                $student_enrolled_courses_for_selected_term = json_decode(file_get_contents(ROOT_URL.'api/student/get_enrld_term_crs.php?student_id='.$student_id.'&term_year='.$term->year.'&term_season='.$term->season.''));

                //DEBUGGING
                /*
                print_r($student_enrolled_courses_for_selected_term);
                foreach ($student_enrolled_courses_for_selected_term as $course) {
                    print_r($course->course_id);
                }
                */
            }
        }
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Course Management and Enrollment System | Student | Enrolled Courses</title>

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
                grid-template-rows: auto auto;
                row-gap: .5vw;
                margin-left: 2vw;
                margin-right: 2vw;
            }
            #termSelectionCard {
                grid-row: 1;
            }
            #courseSelectionCard {
                grid-row: 2;
            }

            /*Term Section*/
            #termScroller {
                background-color: #f0ad4e;
                border: .5vw solid #20c997;
                border-radius: .5vw;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
            }
            .termSpacer {
                display: inline-block;
                padding: 1vw;
            }

            /*CourseSection*/
            /*https://www.w3docs.com/snippets/html/how-to-create-a-table-with-a-fixed-header-and-scrollable-body.html*/
            .tableFixedHead {
                border: .5vw solid #f0ad4e;
                border-radius: .5vw;
                overflow-y: auto;
                overflow-x: hidden;
                height: 30vw;
            }
            .tableFixedHead thead th {
                text-align: center;
                position: sticky;
                top: 0;
            }
            .tableFixedHead table {
                border-collapse: collapse;
                width: 100%
            }
            .tableFixedHead td {
                text-align: center;
                align-items: center;
                border-bottom: 2px solid #f0ad4e;
                padding: 8px 16px;
                
            }
            .tableFixedHead th {
                background: #f0ad4e;
            }
            #bottomButtonContainer {
                border: .5vw solid #02b875;
                border-radius: .5vw;
            }


            .inlineForm {
                display:inline!important;
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

                    <!--TERM SELECTION CARD-->
                    <div id="termSelectionCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Select a Term</h4>
                        </div>
                        <div class="card-body">
                            <div id="termScroller">
                                <?php foreach($student_enrolled_terms as $term) : ?>
                                <span class="termSpacer">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <input type="submit" 
                                            name="<?php echo $term->year.'_'.$term->season?>" 
                                            class="btn btn-success"
                                            value="<?php 
                                                if ($term->season == 'F') {
                                                    echo "Fall ".$term->year;
                                                } elseif ($term->season == 'W') {
                                                    echo "Winter ".$term->year;
                                                } elseif ($term->season == 'Sum') {
                                                    echo "Summer ".$term->year;
                                                } elseif ($term->season == 'Spr') {
                                                    echo "Spring ".$term->year;
                                                }
                                            ?>"
                                        >
                                        </input>
                                    </form>
                                    
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!--COURSE SELECTION CARD-->
                    <div id="courseSelectionCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">
                                <?php 
                                    if ($student_selected_term->season == 'F') {
                                        echo "Fall ".$term->year;
                                    } elseif ($student_selected_term->season == 'W') {
                                        echo "Winter ".$term->year;
                                    } elseif ($student_selected_term->season == 'Sum') {
                                        echo "Summer ".$term->year;
                                    } elseif ($student_selected_term->season == 'Spr') {
                                        echo "Spring ".$term->year;
                                    }
                                ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="tableFixedHead">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>ID</th>
                                            <th>Level</th>
                                            <th>credit</th>
                                            <th><!--Empty header column to house the buttons column--></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($student_enrolled_courses_for_selected_term as $course) : ?>
                                            <?php $course_data = json_decode(file_get_contents(ROOT_URL.'api/course/get_gen_info.php?course_id='.$course->course_id.'')); ?>
                                            <tr>
                                                <td><?php echo $course_data->course_name ?></td>
                                                <td><?php echo $course_data->course_id ?></td>
                                                <td><?php echo $course_data->course_level ?></td>
                                                <td><?php echo $course_data->course_credit ?></td>
                                                <td>
                                                    <form method="POST" action="<?php echo ROOT_URL.'pages/student/studentEnrolledCourseInfo.php' ?>">
                                                        <span>
                                                            <form class="inlineForm" method="POST" action="<?php echo ROOT_URL.'pages/student/studentEnrolledCourseInfo.php'?>">
                                                                <input type="submit"
                                                                    class="btn btn-primary"
                                                                    value="Details"
                                                                >
                                                                </input>
                                                                <input type="hidden"
                                                                    name="Details"
                                                                    value="<?php echo $course_data->course_id?>"
                                                                >
                                                                </input>
                                                            </form>
                                                            <form class="inlineForm" method="POST" action="<?php echo ROOT_URL.'pages/student/studentEnrolledCourseEdit.php'?>">
                                                                <input type="submit"
                                                                    name="<?php echo $course_data->course_id.' Edit' ?>"
                                                                    class="btn btn-warning"
                                                                    value="Edit"
                                                                >
                                                                </input>
                                                                <input type="hidden"
                                                                    name="Edit"
                                                                    value="<?php echo $course_data->course_id?>">
                                                                </input>
                                                            </form>
                                                            <form class="inlineForm" method="POST" action="<?php echo ROOT_URL.'pages/student/studentEnrolledCourseDrop.php'?>">
                                                                <input type="submit"
                                                                    name="<?php echo $course_data->course_id.' Drop' ?>"
                                                                    class="btn btn-danger"
                                                                    value="Drop"
                                                                >
                                                                </input>
                                                            </form>
                                                        </span>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div><!--Table w/ fixed head-->

                            <div id="bottomButtonContainer">
                                <button class="btn btn-warning">View Schedule</button>
                            </div>
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