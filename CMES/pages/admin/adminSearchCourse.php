<?php
//Get Database Class
include_once '../../config/Database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>
        Course Management and Enrollment System | Admin | Search Courses
    </title>

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
            grid-template-rows: auto auto;
            row-gap: 0.5vw;
            margin-left: 2vw;
            margin-right: 2vw;
        }

        #termSelectionCard {
            grid-row: 1;
        }

        #courseSearchCard {
            grid-row: 2;
        }

        #courseSelectionCard {
            grid-row: 3;
        }

        /*Term Section*/
        #termScroller {
            background-color: #f0ad4e;
            border: 0.5vw solid #20c997;
            border-radius: 0.5vw;
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
            border: 0.5vw solid #f0ad4e;
            border-radius: 0.5vw;
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
            width: 100%;
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
            border: 0.5vw solid #02b875;
            border-radius: 0.5vw;
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
                    <h1 id="mainTitle1">Edit Courses</h1>
                </div>
            </header>
            <hr id="line1" />

            <div id="mainGridWrapper">
                <!--TERM SELECTION CARD-->
                <div id="termSelectionCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">Select a Term</h4>
                    </div>
                    <div class="card-body">
                        <div id="termScroller">
                            <span class="termSpacer">
                                <button class="btn btn-success">&lt;Some_Term&gt;</button>
                            </span>
                            <span class="termSpacer">
                                <button class="btn btn-success">&lt;Some_Term&gt;</button>
                            </span>
                            <span class="termSpacer">
                                <button class="btn btn-success">&lt;Some_Term&gt;</button>
                            </span>
                            <span class="termSpacer">
                                <button class="btn btn-success">&lt;Some_Term&gt;</button>
                            </span>
                            <span class="termSpacer">
                                <button class="btn btn-success">&lt;Some_Term&gt;</button>
                            </span>
                        </div>
                    </div>
                </div>
                <!--COURSE SEARCH CARD-->
                <div id="courseSearchCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">Search Courses</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group rounded">
                                <div class="input-group">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-outline-primary">
                                        search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--COURSE SELECTION CARD-->
                <div id="courseSelectionCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">
                            &lt;Selected_Term&gt; &lt;Selected_Course&gt;
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="tableFixedHead">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Instructor</th>
                                        <th>Room #</th>
                                        <th>Time</th>
                                        <th>Days</th>
                                        <th>
                                            <!--Empty header column to house the buttons column-->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&lt;Course_Name&gt;</td>
                                        <td>&lt;Instructor_Name&gt;</td>
                                        <td>&lt;Room_#&gt;</td>
                                        <td>&lt;Some_Time&gt;</td>
                                        <td>&lt;Some_Days&gt;</td>
                                        <td>
                                            <span>
                                                <button class="btn btn-primary">Details</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Table w/ fixed head-->

                        <div id="bottomButtonContainer">
                            <button class="btn btn-warning">View Schedule</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--MainGridWrapper-->
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