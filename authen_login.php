<?php
/**
 * Description of FacultyView
 *
 * @author Lim Jia Wei
 */
    require('db_connect.php');

    if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {

// Assigning POST values to variables.
        $username = $_POST['user_id'];
        $password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `users` WHERE username='$username' and Password='$password'";

        $result = mysqli_query($dbConn, $query) or die(mysqli_error($dbConn));
        $count = mysqli_num_rows($result);

        if ($count == 1) {

//echo "Login Credentials verified";
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
            if($username == admin){
                header("Location: http://localhost/Testing1stPhpProject/addFaculty.php");
            }else{
                header("Location: http://localhost/Testing1stPhpProject/editDepartmentInfo.php");
            }
        } else {
            echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
        }
    }
    ?>