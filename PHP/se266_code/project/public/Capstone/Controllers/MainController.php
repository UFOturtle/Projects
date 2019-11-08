<link type="text/css" rel="stylesheet" href="../Public/CSS/body.css"/>
<body>
<?php
include'../Models/MySQLQueries/MysqlQueries.php';
include'../Models/APIQueries/NutrionixAPIQueries.php';




if (isset($_SESSION['Loggedin']) && $_SESSION['Loggedin']== true || isset($_POST['action']))
{
    if(isset($_SESSION['action']))
    {
        $action = $_SESSION['action'];
        unset($_SESSION['action']);
    }
    else
    {
        //If the controller is summoned then check for an action, otherwise the app has just launched
        $action = filter_input(INPUT_POST, 'action');
        $username = $_SESSION['username'];
        $userid = $_SESSION['UserID'];
    }
}
else
{
        $action = "OpenLoginPage";
}
//all Control what happens next
Switch ($action){
    
    case "addfood";
        
        //var_dump($_POST);
        if (isset($_POST["cancel"]))
        {
            $cancel = filter_input(INPUT_POST, 'cancel');
        
        }
        else
        {
        $name = filter_input(INPUT_POST, 'name');

        if (isset($_POST["image"]))
        {
            $image = filter_input(INPUT_POST, 'image');
        }
        if (isset($_POST["calories"]))
        { 
            $calories = filter_input(INPUT_POST, 'calories');
        }
        else
        {
            $data = json_decode(SearchFood($name), true);
            //var_dump($data);
            $calories = $data['foods'][0]['nf_calories'];
        }
        echo$calories; 
       
        if(isset($_POST["servings"]))
        {
            echo 'food added';
            $servings = filter_input(INPUT_POST, 'servings');
            $username = $_SESSION['username'];
            $userid = $_SESSION['UserID'];
             Add_Food($name, $servings, $calories, $userid, $image);
             $Profile = Get_Profile($username);
             echo $username;
             echo $userid;
             $calorieEntry = Get_Todays_Calories($username, date("y/m/d") );
             //var_dump($calorieEntry);
             
             if(isset($calorieEntry))
             {
                 //var_dump($calorieEntry);
                 //echo (date("y/m/d"));
                $totalcalories = Get_Total_Calories($username, date("y/m/d"));
                
                $Calories = 0;
                foreach($totalcalories as $food)
                {
                    echo $food['TotalCal'];;
                    $Calories += $food['TotalCal'];
                }
                    echo'he';
                Update_Calories($userid, $Calories);
                 echo "<meta http-equiv='refresh' content='0'>";
             }
             else
             {
                 
                $totalcalories = Get_Total_Calories($username, date("y/m/d"));
                var_dump($totalcalories);
                $Calories = 0;
                if(isset($totalcalories))
                {
                
                foreach($totalcalories as $food)
                {
                    echo $food['TotalCal'];;
                    $Calories += $food['TotalCal'];
                }
                }
                    echo'he';
                Add_Calories($Calories, $Profile[0]['caloriegoal'], $userid);
                $_SESSION['action'] = "Launch Home";
                echo "<meta http-equiv='refresh' content='0'>";
             }
             
        }
        else
        {
            $servings = 1;
            $_POST["action"] = "addfood";
            //echo'EnterS';
            include'../Views/EnterServings.php';
        }
        
        }
        
        
        
        
    break;

    case "Launch Home";
        $username = $_SESSION['username'];
        echo "Logged in as: $username";
        
        Include '../Views/Logoutbtn.php';
        
        Include '../Views/SearchBar.php';
        
        Include '../Views/Calendar.php';
        
        include '../Views/FoodList.php';
        
        echo "<script> MakeList();</script>";
    
        //$totalcalories = Get_Total_Calories('Leezus1', date("y/m/d"));
             
        
    break;

case "OpenLoginPage";
        include'../Views/login.php';
    break;
case "Past Date";
        echo'<h1> Hi</h1>';
    break;

case "Login";
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');
        
        $result = login($email, sha1($password));
        var_dump($result);
        
        if (isset($result))
        {
            $_SESSION['Loggedin'] = true;
            
            $_SESSION['username'] = $result[0]['username'] ;
            $_SESSION['UserID'] = $result[0]['id'] ;
            
            $_SESSION['action'] = "Launch Home";
            
            
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else
        {
            
            $_SESSION['Loggedin'] = false;
            include'../Views/login.php';
            echo'<script>
                $("#login-error").html("*Please Enter A valid Email & Password");
            </script>';
            
        }
            
    break;

case "Logout";
        $_SESSION['Loggedin'] = true;
        echo "<meta http-equiv='refresh' content='0'>";
    break;

case "Lockout";
        
    break;

case "Open Create Account";
        
    break;
case "Editf";
        if (isset($_POST["fitem"]))
        {
            $itemid = filter_input(INPUT_POST, 'fitem');
            
            $Item = Get_FItem($itemid);
            
            $name = $Item[0]["foodname"];
            
            $calories = $Item[0]["calories"];
            
            $image = $Item[0]["foodpic"];
            
            $servings = $Item[0]["servings"];
            
            $_POST["action"] = "Change Servings";
            
            include'../Views/EnterServings.php';
            
            $_SESSION['Foodid'] = $itemid;
            
        }
        
        
    break;
case "Removef";
        if (isset($_POST["fitem"]))
        {
            $Profile = Get_Profile($username);
            $itemid = filter_input(INPUT_POST, 'fitem');
            RemoveFItem($itemid);
            $totalcalories = Get_Total_Calories($username, date("y/m/d"));
                $Calories = 0;
                if(isset($totalcalories))
                {
                foreach($totalcalories as $food)
                {
                    echo $food['TotalCal'];;
                    $Calories += $food['TotalCal'];
                }
                }
                    echo $Calories;
                    
                Update_Calories($userid, $Calories);
                
                $_SESSION['action'] = "Launch Home";
                
            echo "<meta http-equiv='refresh' content='0'>";
        }
    break;
    
    case "Change Servings";
        if (isset($_POST["servings"]) )
        {
            $Profile = Get_Profile($username);
            $servings = filter_input(INPUT_POST, 'servings');
            
            EditFItem($_SESSION['Foodid'], $servings );
            
            $totalcalories = Get_Total_Calories('Leezus1', date("y/m/d"));
                $Calories = 0;
                foreach($totalcalories as $food)
                {
                    echo $food['TotalCal'];;
                    $Calories += $food['TotalCal'];
                }
                    echo'he';
                Update_Calories($userid, $Calories);
            $_SESSION['action'] = "Launch Home";
            echo "<meta http-equiv='refresh' content='0'>";
        }
 
    break;
    case "cancel";
        $_SESSION['action'] = "Launch Home";
            echo "<meta http-equiv='refresh' content='0'>";
            break;
case "Register";
         $fname = filter_input(INPUT_POST, 'fname');
         $lname = filter_input(INPUT_POST, 'lname');
         $age = filter_input(INPUT_POST, 'age');
         $weight = filter_input(INPUT_POST, 'weight');
         $height = filter_input(INPUT_POST, 'height');
         $gender = filter_input(INPUT_POST, 'gender');
         $email = filter_input(INPUT_POST, 'email');
         $uname = filter_input(INPUT_POST, 'uname');
         $password = filter_input(INPUT_POST, 'password');
         
         echo $fname;
         echo $lname;
         echo $age;
         echo $weight;
         echo $height;
         echo $gender;
         echo $uname;
         echo $email;
         echo $password;
        
    break;

    default:
    include'../Views/login.php';;
        break;
}

?>
</body>