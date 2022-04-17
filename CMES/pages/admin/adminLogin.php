<?php
include('../../config/config.php');

$attempted_login = false;
$admin_exists = false;

//Check for attempted Login
if (isset($_POST['login'])) {
    $attempted_login = true;

    //Get login form data
    $admin_id = $_POST['admin_id'];
    $Lname = $_POST['Lname'];

    //call api
    $admin_data = json_decode(file_get_contents(ROOT_URL.'api/admin/login.php?admin_id='.$admin_id.'&Lname='.$Lname));

    //DEBUGGING
    //print_r($admin_data->admin_id);

    if ($admin_data->admin_id == 0) {
        //admin does not exist, display error information
        $admin_exists = false;
    } else {
        //admin does exist
        $admin_exists = true;

        //DEBUGGING
        //echo "admin Exists!";

        //Create admin Cookie (This will be used by all following admin pages)
        setcookie("admin_id", $admin_data->admin_id, time() + 3600);

        header('Location: '.ROOT_URL.'pages/admin/adminHome.php');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="The login page for admins for a Course Management and Enrollment System" />
    <meta name="authors" content="Brett Gattinger, Melissa Hoang, Munhib Saaid" />

    <title>Course Management and Enrollment System | Portal</title>

    <!--Styling for adminLogin.html uses .css file in the 'Styles' folder of this project by defualt
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

        #mainTitle1 {
            text-align: center;
        }

        #line1 {
            background-color: #4582ec;
            height: 50px;
        }

        /*https://blog.dopinger.com/how-to-center-a-div-element-in-css#:~:text=You%20can%20center%20a%20div%20in%20three%20different,as%20well%20as%20position%2C%20top%2C%20and%20left%20properties.*/
        #adminLoginCard {
            position: absolute;
            left: 50%;
            top: 55%;
            transform: translate(-50%, -50%);
        }

        #backButton {
            background-color: #f0ad4e;
            position: relative;
            left: 10%;
        }

        #loginButton {
            background-color: #f0ad4e;
            position: relative;
            left: 65%;
        }

        /*https://stackoverflow.com/questions/7106970/how-to-make-a-div-with-rounded-corners*/
        #adminNameDataEntryField,
        #adminID_dataEntryField {
            place-items: center;
            background-color: #f0ad4e;
            /*padding: 10px;*/
            /*padding-top: 30px;*/
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            border-radius: 20px;
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

            <div id="adminLoginCard" class="card text-white bg-primary mb-3">
                <div class="card-header">Course Management and Enrollment System</div>

                <div class="card-body">
                    <h5 class="card-title">Admin Login</h5>
                    <p class="card-text">
                        Please Enter your admin Name and ID number to login to the system
                    </p>
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <div id="adminNameDataEntryField" class="form-group-row">
                            <label class="form-label mt-4">Admin Name:</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <div id="adminID_dataEntryField" class="form-group-row">
                            <label class="form-label mt-4">Admin ID:</label>
                            <input type="text" class="form-control">
                        </div>
                        <br>
                        <a href=<?php echo HOME_PAGE_LINK; ?>>
                            <button id="backButton" type="button" class="btn btn-primary">Back</button>
                        </a>
                        <button id="loginButton" type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>

            <?php if ($attempted_login && !($admin_exists)) : ?>
                <div id="invalidLoginCard" class="alert alert-dismissible alert-danger">
                    <strong>Invalid Login!</strong>
                    The login credentials you provided do not match any know admin
                </div>
            <?php endif; ?>

        </div>
    </div>

    <footer id="footer">
        <div id="footerContent" class="card text-white bg-primary mb-3">
            Copyright &copy; 2022 Brett Gattinger, Melissa Hoang, Munhib Saaid
        </div>
    </footer>


</body>

</html>
