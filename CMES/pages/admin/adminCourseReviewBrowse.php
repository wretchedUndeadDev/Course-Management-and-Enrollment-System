<?php
//Get Database Class
include_once '../../config/Database.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Course Management and Enrollment System | Administrator | Course Review Browser</title>

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

        /*Content Grid Alignment*/
        #mainGridWrapper {
            display: grid;
            /*Specify number of grid-templat-rows + grid-templat-cols*/
            row-gap: .5vw;
            margin-left: 2vw;
            margin-right: 2vw;
        }

        /*place styling/positioning for grid elements here*/



        /*PLACE ANY CUSTOM SYTLING FOR PAGE HERE*/

        #searchBarInner {
            min-width: 100%;
        }

        #searchBarOuter {
            width: 92.5%;
        }

        #searchBarButton {
            width: 10%
        }

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

        .hide {
            display: none !important;
        }

        .show {
            display: block !important
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
                    <h1 id="mainTitle1">Course Review Browser</h1>
                </div>
            </header>
            <hr id="line1">

            <div id="mainGridWrapper">

                <div id="searchBarCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">Search</h4>
                    </div>
                    <div class="card-body">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                            <div class="container-fluid">
                                <form id="searchBarOuter" class="d-flex">
                                    <input id="searchBarInner" class="form-control me-sm-2" type="text" placeholder="Search">
                                    <button id="searchBarButton" class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>

                <div id="searchResultCard" class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <h4 class="responsiveTitle">Results</h4>
                    </div>
                    <div class="card-body">
                        <div class="tableFixedHead">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Student Author</th>
                                        <th>Student ID</th>
                                        <th>Review Title</th>
                                        <th>Review ID</th>
                                        <th>
                                            <!--Empty header column to house the buttons column-->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review1')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review1" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review2')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review2" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review3')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review3" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review4')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review4" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review5')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review5" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review6')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review6" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&lt;Student_Name&gt;</td>
                                        <td>&lt;Student_ID&gt;</td>
                                        <td>&lt;Review_Title&gt;</td>
                                        <td>&lt;Review_ID&gt;</td>
                                        <td>
                                            <span>
                                                <button onclick="displayReview('review7')" class="btn btn-primary">Read</button>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div id="review7" class="courseReviewContent hide">
                                                <p>
                                                    Donec consequat orci sit amet odio condimentum auctor. Morbi aliquam, diam quis dapibus bibendum,
                                                    dolor lorem efficitur velit, sit amet dignissim turpis metus volutpat arcu. Vestibulum nec venenatis
                                                    diam. Ut lacus lectus, lobortis sed condimentum at, volutpat vitae velit. Sed congue arcu non lorem
                                                    olutpat pellentesque id nec risus. Sed vitae nibh sit amet enim tincidunt imperdiet. Sed at leo non dui
                                                    laoreet suscipit. In neque velit, ullamcorper non sollicitudin id, varius ac ipsum. Nulla facilisi. Donec
                                                    id risus tincidunt, mattis odio eu, interdum enim. Etiam in tempus orci. Maecenas hendrerit mattis accumsan.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!--Table w/ fixed head-->

                        <script>
                            function displayReview(id) {
                                var x = document.getElementById(id);
                                if (x.className.indexOf("show") == -1) {
                                    x.className += " show";
                                } else {
                                    x.className = x.className.replace(" show", "");
                                }
                            }
                        </script>

                    </div>
                </div>


                <!--Define webpage elements within the grid and then use internal css styling above
                    to organize the layout of webpage elements-->




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