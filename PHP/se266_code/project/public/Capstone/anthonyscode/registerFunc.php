<?php
    session_start(); 

    include 'MysqlQueries.php';

    $db = ConnectToDB();

    
    if(isset($_POST['register']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $caloriegoal = $_POST['caloriegoal'];
        $c = Create_Account($fname, $lname, $uname, $gender, $age, $weight, $height, $email, $password,$caloriegoal);
        if ($c) 
        {
            // Auth:success
            $_SESSION["isLoggedIn"] = true;
            header('Location: http://ict.neit.edu/001408918/Capstone/LACalorie/Capstone/capstone/index.php');
        } 
        else 
        {
            //Auth:failure
            $_SESSION["isLoggedIn"] = false;
            header('Location: http://ict.neit.edu/001408918/Capstone/LACalorie/Capstone/capstone/register.php');
        }
    }
?>