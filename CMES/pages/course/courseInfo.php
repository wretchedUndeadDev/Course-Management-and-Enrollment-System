<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Course Management and Enrollment System | Student | Course Information</title>

        <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css">

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
            #mainTitle1 {
                text-align: center;
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
                    <div class="card text-white bg-primary mb-3">
                        <h1 id="mainTitle1">Course Information</h1>
                    </div>
                </header>
                <hr id="line1">

                <div id="mainGridWrapper">

                    <div id="generalCourseInfoCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">&lt;Course_Name&gt;</h4>
                        </div>
                        <div class="card-body">
                            <div id="courseInfoGrid">

                                <div id="courseInfoGrid_courseID_section">
                                    <h5 id="courseID_label" class="responsiveText">Course ID:</h5>
                                    <h5 id="courseID" class="responsiveText">&lt;Course_ID&gt;</h5>
                                </div>

                                <div id="courseInfoGrid_courseLevel_section">
                                    <h5 id="courseLevel_label" class="responsiveText">Level:</h5>
                                    <h5 id="courseLevel" class="responsiveText">&lt;Course_Level&gt;</h5>
                                </div>

                                <div id="courseInfoGrid_courseCredit_section">
                                    <h5 id="courseCredit_label" class="responsiveText">Credit:</h5>
                                    <h5 id="courseCredit" class="responsiveText">&lt;Course_Credit&gt;</h5>
                                </div>

                                <div id="courseInfoGrid_courseDesc_section">
                                    <h5 id="courseDesc_label" class="responsiveText">Description:</h5>
                                    <p id="courseDesc" class="responsiveText">
                                        Pellentesque tellus purus, ultricies at convallis a, consequat sed quam. 
                                        Vivamus quis imperdiet purus. Phasellus in lacinia elit. Aliquam a arcu nisi. 
                                        Vivamus ut dictum velit. Etiam nunc magna, eleifend sed velit vitae, faucibus finibus mi. 
                                        Pellentesque nisl augue, condimentum nec mi non, posuere scelerisque quam. Donec commodo quis 
                                        tellus congue porttitor. Etiam consequat volutpat nisi vitae tristique. Nullam lectus nunc, 
                                        volutpat nec orci sit amet, aliquam congue augue. Ut id sem diam. Nam gravida nunc dolor, 
                                        vel pharetra purus pulvinar et. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div id="coursePrereqCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Course Prerequisites</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CoursePrerequisite_Name&gt;
                                    <span class="badge rounded-pill bg-success">
                                        Course Completed
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CoursePrerequisite_Name&gt;
                                    <span class="badge rounded-pill bg-success">
                                        Course Completed
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CoursePrerequisite_Name&gt;
                                    <span class="badge rounded-pill bg-danger">
                                        Course not Completed
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>



                    <div id="courseAntireqCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Course Antirequisites</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CourseAntirequisite_Name&gt;
                                    <span class="badge rounded-pill bg-success">
                                        Course Not taken
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CourseAntirequisite_Name&gt;
                                    <span class="badge rounded-pill bg-success">
                                        Course Not Taken
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    &lt;CourseAntirequisite_Name&gt;
                                    <span class="badge rounded-pill bg-danger">
                                        Course Taken
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>



                    <div id="courseLectureCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Selected Lecture</h4>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-warning">Class Number: &lt;Class_Number&gt;</span>
                            <span class="badge bg-warning">Instructor: &lt;Instructor_Name&gt;</span>
                            <span class="badge bg-warning">Room: &lt;Room_#&gt;</span>
                            <span class="badge bg-warning">Time: &lt;Time&gt;</span>
                        </div>
                    </div>




                    <div id="courseLabCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Selected Lab</h4>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-warning">Class Number: &lt;Class_Number&gt;</span>
                            <span class="badge bg-warning">Supervisor: &lt;Supervisor_Name&gt;</span>
                            <span class="badge bg-warning">Room: &lt;Room_#&gt;</span>
                            <span class="badge bg-warning">Time: &lt;Time&gt;</span>
                        </div>
                    </div>




                    <div id="courseTutorialCard" class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <h4 class="responsiveTitle">Selected Tutorial</h4>
                        </div>
                        <div class="card-body">
                            <span class="badge bg-warning">Class Number: &lt;Class_Number&gt;</span>
                            <span class="badge bg-warning">TA: &lt;TA_Name&gt;</span>
                            <span class="badge bg-warning">Room: &lt;Room_#&gt;</span>
                            <span class="badge bg-warning">Time: &lt;Time&gt;</span>
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