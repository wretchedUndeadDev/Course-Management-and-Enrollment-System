<?php
//Get Database Class
include_once '../../config/Database.php';
//Get Course Class
include_once '../../models/Course.php';

if (isset($_POST["submit"])) {
  echo "Course created";
  $course_id = $_POST["course_id"];
  $name = $_POST["name"];
  $level = $_POST["level"];
  $description = $_POST["description"];
  $credit = $_POST["credit"];
  $faculty = $_POST["faculty"];
  $program = $_POST["program"];
  $concentration = $_POST["concentration"];
  $admin = $_POST["admin"];

  require_once 'add_course.php';

  if (emptyInputCreateCourse($course_id, $name, $level, $description, $credit, $faculty, $program, $concentration, $admin) !== false) {
    header("location: ../adminAddCourses.php?error=emptyinput");
    exit();
  }

  if (invalidAdminID($admin) !== false) {
    header("location: ../adminAddCourses.php?error=invalidAdminID");
    exit();
  }

  if (courseIDExist($conn, $course_id) !== false) {
    header("location: ../adminAddCourses.php?error=courseIDtaken");
    exit();
  }

  createCourse($conn, $course_id, $name, $level, $description, $credit);
} else {
  header("location: ../adminAddCourses.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>
    Course Management and Enrollment System | Admin Course Creation
  </title>

  <!--Styling for index.html uses .css file in the 'Styles' folder of this project by defualt
        to make further changes to this styling simply insert whatever required styling here as internal css
        under the '<style>' tag-->
  <link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL . 'Styles/bootstrap.css' ?>" />
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
          <h1 id="mainTitle1">Course Creation</h1>
        </div>
      </header>

      <hr id="line1" />

      <div id="card1" class="card text-white bg-success mb-3" style="width: 68rem;">

        <form id="formPadding" action="includes/add_course.php" method="post">
          <h4 class="responsiveTitle">Course general information:</h4>
          <div class="row">
            <div class="col">
              <label for="course_id" class="control-label">Course ID</label>
            </div>
            <div class="col">
              <label for="name" class="control-label">Name</label>
            </div>
            <div class="col">
              <label for="level" class="control-label">Level</label>
            </div>
            <div class="col">
              <label for="description" class="control-label">Description</label>
            </div>
            <div class="col">
              <label for="credit" class="control-label">Credit</label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="course_id" />
            </div>
            <div class="col">
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="col">
              <input type="number" class="form-control" name="level" />
            </div>
            <div class="col">
              <input type="text" class="form-control" name="description" />
            </div>
            <div class="col">
              <input type="number" class="form-control" name="credit" />
            </div>
          </div>
          <br>
          <h4 class="responsiveTitle">Course program information:</h4>
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
            <div class="col">
              <label class="control-label"></label>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="faculty" />
            </div>
            <div class="col">
              <input type="text" class="form-control" name="program" />
            </div>
            <div class="col">
              <input type="text" class="form-control" name="concentration" />
            </div>
            <div class="col">
              <input type="password" class="form-control" name="admin" />
            </div>
            <div class="col">

            </div>
          </div>
          <br>
          <button id="createButton" type="submit" class="btn btn-primary" name="submit">Create Course</button>
      </div>

      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p>Fill in all fields!</p>";
        } else if ($_GET["error"] == "invalidAdminID") {
          echo "<p>Enter a valid Admin ID!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
          echo "<p>Something went wrong!</p>";
        } else if ($_GET["error"] == "none") {
          echo "<p>Course created!</p>";
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