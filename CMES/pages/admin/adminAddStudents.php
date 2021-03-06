<?php
//Get Database Class
include_once '../../config/Database.php';
//Get Student Class
include_once '../../models/Student.php';

if (isset($_POST["submit"])) {
    echo "Student created";
    $student_id = $_POST["student_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $faculty = $_POST["faculty"];
    $program = $_POST["program"];
    $concentration = $_POST["concentration"];
    $admin = $_POST["admin"];

    require_once 'add_student.php';

    if (emptyInputCreateStudent($student_id, $fname, $lname, $faculty, $program, $concentration, $admin) !== false) {
        header("location: ../adminAddStudents.php?error=emptyinput");
        exit();
    }

    if (studentIDExist($conn, $student_id) !== false) {
        header("location: ../adminAddStudents.php?error=studentIDtaken");
        exit();
    }

    createStudent($conn, $student_id, $fname, $lname, $faculty, $program, $concentration);
} else {
    header("location: ../adminAddStudents.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>
        Course Management and Enrollment System | Admin Student Creation
    </title>

    <!--Styling for index.html uses .css file in the 'Styles' folder of this project by defualt
        to make further changes to this styling simply insert whatever required styling here as internal css
        under the '<style>' tag-->
    <link rel="stylesheet" type="text/css" href="Styles/bootstrap.css" />
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

        #card1 {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            align-content: center;
            aspect-ratio: auto;
        }

        #courseDataEntryField {
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            border-radius: 20px;
        }

        #formPadding {
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            border-radius: 20px;
        }

        /*https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout#:~:text=CSS%20Grid%20Layout%20excels%20at%20dividing%20a%20page,author%20to%20align%20elements%20into%20columns%20and%20rows.*/
        #grid1Wrapper {
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: auto;
            align-content: center;
            justify-content: start;
            column-gap: 2vw;
            row-gap: 1vw;
        }

        #grid1_sec1 {
            grid-column: 1;
            grid-row: 1;
        }

        #buttonSpacer {
            display: block;
        }

        #createButton {
            background-color: #f0ad4e;
            position: relative;
            left: 85%;
        }


        /*Content-Responsivness*/
        .addSpace {
            width: 10px;
        }

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
                    <h1 id="mainTitle1">Student Creation</h1>
                </div>
            </header>

            <hr id="line1" />

            <div id="card1" class="card text-white bg-success mb-3" style="width: 68rem;">

                <form id="formPadding">
                    <h4 class="responsiveTitle">Student general information:</h4>
                    <div class="row">
                        <div class="col">
                            <label for="course_id" class="control-label">Student ID</label>
                        </div>
                        <div class="col">
                            <label for="fname" class="control-label">First Name</label>
                        </div>
                        <div class="col">
                            <label for="lname" class="control-label">Last Name</label>
                        </div>
                        <div class="col">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="student_id" />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="fname" />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="lname" />
                        </div>
                        <div class="col">

                        </div>

                    </div>
                    <br>
                    <h4 class="responsiveTitle">Student program information:</h4>
                    <div class="row">
                        <div class="col">
                            <label for="faculty" class="control-label">Faculty</label>
                        </div>
                        <div class="col">
                            <label for="program" class="control-label">Program</label>
                        </div>
                        <div class="col">
                            <label for="concentration" class="control-label">Concentration</label>
                        </div>
                        <div class="col">
                            <label for="admin" class="control-label">Admin ID</label>
                        </div>


                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="faculty" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="program" />
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="concentration" />
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" id="admin" />
                            </div>
                        </div>
                        <br>
                        <row>
                            <br>
                            <button id="createButton" type="submit" class="btn btn-primary">Create Student</button>
                        </row>
                    </div>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>Fill in all fields!</p>";
                        } else if ($_GET["error"] == "studentIDtaken") {
                            echo "<p>Student ID taken!</p>";
                        } else if ($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong!</p>";
                        } else if ($_GET["error"] == "none") {
                            echo "<p>Student created!</p>";
                        }
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
    </div>
    <footer id="footer">
        <div id="footerContent" class="card text-white bg-primary mb-3">
            Copyright &copy; 2022 Brett Gattinger, Melissa Hoang, Munhib Saaid
        </div>
    </footer>
</body>

</html>