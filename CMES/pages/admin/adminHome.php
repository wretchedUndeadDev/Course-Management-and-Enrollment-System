<?php
include('../../config/config.php');

//Retrieve admin_id in Cookie
if (isset($_COOKIE['admin_id'])) {

    $admin_id = $_COOKIE['admin_id'];

    //Call API and get admin information
    $admin_data = json_decode(file_get_contents(ROOT_URL . 'api/admin/get_gen_info.php?admin_id=' . $admin_id . ''));
    $admin_addresses = json_decode(file_get_contents(ROOT_URL . 'api/admin/get_addrs.php?admint_id=' . $admin_id . ''));
    $admin_phone_numbers = json_decode(file_get_contents(ROOT_URL . 'api/admin/get_phnNums.php?admin_id=' . $admin_id . ''));
    $admin_emails = json_decode(file_get_contents(ROOT_URL . 'api/admin/get_emails.php?admin_id=' . $admin_id));

    //DEBUGGING
    /*print_r($admin_data->admin_id);
        print_r($admin_data->assigned_enrollment_date);
        print_r($admin_data->Fname);
        print_r($admin_data->Lname);
        print_r($admin_data->bio);
        print_r($admin_data->primary_faculty_name);
        foreach ($admin_addresses as $a) {
            print_r($a->address);
        }
        foreach ($admin_phone_numbers as $a) {
            print_r($a->phone_num);
        }
        */
}
// Raise Error, cookie data should be available here, admin_id from cookie requried to display admin home

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Course Management and Enrollment System | Admin Home</title>

    <!--Styling for index.html uses .css file in the 'Styles' folder of this project by defualt
        to make further changes to this styling simply insert whatever required styling here as internal css
        under the '<style>' tag-->
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL . 'Styles/bootstrap.css' ?>">
    <style>
        /*https://stackoverflow.com/questions/3525581/how-to-align-footer-div-to-the-bottom-of-the-page*/
        html,
        body {
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

        /*pagelayout (Grids)*/
        #mainGridWrapper {
            display: grid;

            grid-template-rows: auto auto auto;

            justify-content: start;
            column-gap: 3vw;
            row-gap: 2vw;
            width: 100vw;
        }

        #adminPersonalCard {
            grid-column: 1;
            grid-row: 1 / span 3;
            left: 2%;
            aspect-ratio: auto;
        }

        /*https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout#:~:text=CSS%20Grid%20Layout%20excels%20at%20dividing%20a%20page,author%20to%20align%20elements%20into%20columns%20and%20rows.*/
        #grid1Wrapper {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-template-rows: auto auto auto auto auto;
            align-content: center;
            justify-content: start;
            column-gap: 2vw;
            row-gap: 1vw;
        }

        #grid1_sec1 {
            grid-column: 1;
            grid-row: 1 / span 2;
        }

        #grid1_sec2 {
            grid-column: 2;
            grid-row: 1;
        }

        #grid1_sec3 {
            grid-column: 3;
            grid-row: 1;
        }

        #grid1_sec4 {
            grid-column: 2 / span 2;
            grid-row: 2;
        }

        #grid1_sec5 {
            grid-column: 2 / span 2;
            grid-row: 3;
        }

        #grid1_sec6 {
            grid-column: 2 / span 2;
            grid-row: 4;
        }

        #grid1_sec7 {
            grid-column: 2 / span 2;
            grid-row: 5;
        }

        #grid1_sec8 {
            grid-column: 1;
            grid-row: 3 / span 3;
        }

        #coursesCard {
            grid-column: 2;
            grid-row: 1;
        }

        #programsCard {
            grid-column: 2;
            grid-row: 2;
        }

        #academHistCard {
            grid-column: 2;
            grid-row: 3;
        }

        #buttonSpacer {
            display: block;
        }

        /*Content-Responsivness*/
        .responsiveText {
            font-size: 1.2vw;
        }

        .responsiveTitle {
            font-size: 2vw;
        }

        .responsiveButton {
            font-size: 1.2vw;
            width: 20vw;
            height: 5vw;
        }
    </style>
</head>

<body>
    <div id="mainContentWrapper">
        <div id="mainContentContainer">
            <header>
                <div class="card text-white bg-primary mb-3">
                    <h1 id="mainTitle1">Welcome <?php echo $admin_data->Fname . ' ' . $admin_data->Lname ?></h1>
                    <a id="signOutButtonOuter" href="<?php echo ROOT_URL . 'pages/admin/adminLogin.php' ?>">
                        <button id="signOutButtonInner" class="btn btn-warning responsiveButton">Sign Out</button>
                    </a>
                </div>
            </header>
            <hr id="line1" />

            <div id="mainGridWrapper">
                <!--ADMIN PERSONAL SECTION-->
                <div id="adminPersonalCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div id="grid1Wrapper">
                            <div id="grid1_sec1">
                                <img id="profilePic" src="<?php echo ROOT_URL . 'Images/icons8-test-account-80.png' ?>" style="width: 10vw; height: auto;">
                            </div>

                            <div id="grid1_sec2" class="responsiveGridCell">
                                <h5 id="adminName" class="responsiveText"><?php echo $admin_data->Fname . ' ' . $admin_data->Lname ?>
                                </h5>
                            </div>

                            <div id="grid1_sec3" class="responsiveGridCell">
                                <h5 id="adminID" class="responsiveText"><?php echo $admin_data->admin_id ?></h5>
                            </div>

                            <div id="grid1_sec4" class="responsiveGridCell">
                                <h6 id="enrollLabel" class="responsiveText">Faculty:</h6>
                                <h6 id="enrollDate" class="responsiveText">
                                    <?php echo $admin_data->faculty ?>
                                </h6>
                            </div>

                            <div id="grid1_sec5" class="responsiveGridCell">
                                <h6 id="address" class="responsiveText">Addresses</h6>
                                <ol>
                                    <?php foreach ($admin_addresses as $a) : ?>
                                        <li class="responsiveText"><?php echo $a->address ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>

                            <div id="grid1_sec6" class="responsiveGridCell">
                                <h6 id="phoneNum" class="responsiveText">Phone Numbers</h6>
                                <ol>
                                    <?php foreach ($admin_phone_numbers as $a) : ?>
                                        <li class="responsiveText"><?php echo $a->phone_num ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>

                            <div id="grid1_sec7" class="responsiveGridCell">
                                <h6 id="email" class="responsiveText">Email Addresses</h6>
                                <ol>
                                    <?php foreach ($admin_emails as $a) : ?>
                                        <li class="responsiveText"><?php echo $a->email ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>

                            <div id="grid1_sec8" class="responsiveGridCell">
                                <h5 id="bioLabel" class="responsiveText">Bio</h5>
                                <p class="responsiveText">
                                    <?php echo $admin_data->bio; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END OF ALUMNI PERSONAL SECTION-->

                <!--COURSES SECTION-->
                <div id="coursesCard" class="card text-white bg-info mb-3">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <span class="buttonSpacer">
                            <a href="<?php echo ROOT_URL . 'pages/admin/adminAddCourses.php' ?>">
                                <button class="btn btn-warning responsiveButton">Add Course</button>
                            </a>
                        </span>
                        <span>
                            <a href="<?php echo ROOT_URL . 'pages/admin/adminSearchCourse.php' ?>">
                                <button class="btn btn-warning responsiveButton">Search Course</button>
                            </a>
                        </span>
                    </div>
                </div>

                <!--ADMIN SECTION-->
                <div id="programsCard" class="card text-white bg-info mb-3">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        <span>
                            <a href="<?php echo ROOT_URL . 'pages/admin/adminAddStudents.php' ?>">
                                <button class="btn btn-warning responsiveButton">Add Student</button>
                            </a>
                        </span>
                        <span>
                            <a href="<?php echo ROOT_URL . 'pages/admin/adminStudentBrowser.php' ?>">
                                <button class="btn btn-warning responsiveButton">Search Student</button>
                            </a>
                        </span>
                    </div>
                </div>

                <!--COURSE REVIEWS SECTION-->
                <div id="academHistCard" class="card text-white bg-info mb-3">
                    <div class="card-header">Course Reviews</div>
                    <div class="card-body">
                        <span>
                            <a href="<?php echo ROOT_URL . 'pages/admin/adminCourseReview.php' ?>">
                                <button class="btn btn-warning responsiveButton">Course Review</button>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--MainContentContainer-->
    </div>
    <!--MainContentWrapper-->

    <footer id="footer">
        <div id="footerContent" class="card text-white bg-primary mb-3">
            Copyright &copy; 2022 Brett Gattinger, Melissa Hoang, Munhib Saaid
        </div>
    </footer>
</body>

</html>