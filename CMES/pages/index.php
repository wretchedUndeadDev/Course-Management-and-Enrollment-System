<?php
    include('../config/config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="The entry portal for a Course Management and Enrollment System" />
        <meta name="authors" content="Brett Gattinger, Melissa Hoang, Munhib Saaid" />

        <title>Course Management and Enrollment System | Portal</title>

        <!--Styling for index.html uses .css file in the 'Styles' folder of this project by defualt
        to make further changes to this styling simply insert whatever required styling here as internal css
        under the '<style>' tag-->
        <link rel="stylesheet" type="text/css" href="../Styles/bootstrap.css">
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
            #mainTitle1, #subTitle1, #subTitle2 {
                text-align: center;
            }

            #line1 {
                background-color: #4582ec;
                height: 50px;
            }

            #adminButtonContainer, #studentButtonContainer {
                text-align: center;
                padding: 30px;
            }

            #adminButton, #studentButton {
                width: 300px;
                height: 100px;
            }
        </style>
    </head>

    <body>

        <div id="mainContentWrapper">

            <div id="mainContentContainer">
                <header>
                    <div class="card text-white bg-primary mb-3">
                        <h1 id="mainTitle1">Course Management and Enrollment System</h1>
                    </div>
                </header>

                <hr id="line1">

                <h2 id="subTitle1">Welcome to the Course Management and Enrollment System!</h2>
                <h2 id="subTitle2">Are you a Student or an Administrator?</h2>

                <div id="adminButtonContainer">
                    <a href="<?php echo ROOT_URL.'pages/admin/adminLogin.php' ?>">
                        <button id="adminButton" class="btn btn-lg btn-primary" type="button">
                            Administrator
                        </button>
                    </a>
                </div>

                <div id="studentButtonContainer">
                    <a href="<?php echo ROOT_URL.'pages/student/studentLogin.php' ?>">
                        <button id="studentButton" class="btn btn-lg btn-primary" type="button">Student</button>
                    </a>
                </div>

            </div> <!--mainContentContainer-->

        </div> <!--mainContentWrapper-->

        <footer id="footer">
            <div id="footerContent" class="card text-white bg-primary mb-3">
                Copyright &copy; 2022 Brett Gattinger, Melissa Hoang, Munhib Saaid
            </div>
        </footer>


    </body>
</html>