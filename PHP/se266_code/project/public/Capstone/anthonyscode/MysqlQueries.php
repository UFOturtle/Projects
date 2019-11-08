<?php
//TEST MODELS HERE
////////////////////////////////////////////////////////////////////////



 //var_dump(Get_Weight("nationaltreasure69", date("2019/08/10")));
$ID = get_ID("Leezus1");
$ID = $ID[0]['id'];

//Add_Weight($ID, 190);


//var_dump(Get_Food($ID, "2019/08/13"));

$dates = 1;
        
if (isset($_GET['d']) && isset($_GET['m']) && isset($_GET['y'])) {
     $day = filter_input(INPUT_GET, 'd');
     $month = filter_input(INPUT_GET, 'm');
     $year = filter_input(INPUT_GET, 'y');
     $date = $year . "/" . $month . "/" . $day;    
     
    //array_push($dates, $date);
     
    $results = get_calories("Leezus1", $date);
    echo json_encode($results);
    

}
$dates++;

//var_dump(get_calories("Leezus1", "2019/08/5"));
//var_dump(Get_Weight("nationaltreasure69", date("y/m/d")));

//Create_Account("'Lee'", "'Warner'", "'Leezus1'", "'Male'", 23, 170, 6, "'lwarner@email.neit.edu'", "'Oranges1'", 3200);
//var_dump(Get_Profile("Leezus1"));
//Add_Calories(3100, 3200, $ID);
//var_dump(Get_Calories("Leezus1", date("y/m/d") ));
//Add_Food("Broccoli", 4, 110, $ID);
//var_dump(Get_Food($ID, date("y/m/d")));
///////////////////////////////////////////////////////////////////
function ConnectToDB()//Connects to our database using the Login info
{
    global $db;
    $config = array(
        'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_001408918',
        'DB_USER' => 'se266_001408918',
        'DB_PASSWORD' => '001408918'
    );
try {
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    //echo "Connected successfully"; 
    return $db;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}


//Get a weight for a date and Username
function Get_Weight($username, $date)
{
    return ExecuteQuery("SELECT weight.weight 
        FROM weight
        INNER JOIN users
        ON users.id = weight.userID
        WHERE weight.date = '$date' AND username= '$username' ");
}

//adds a new weight to the weight table
function Add_Weight($id,$weight)
{
     ExecuteQuery("INSERT INTO weight(weight, date, userID ) 
        VALUES($weight, CURDATE(), $id)");
}

//Get The total calories for a specific day and username
function Get_Total_Calories($username, $date)
{
    return ExecuteQuery("SELECT calories * food.servings) AS TotalCal 
        FROM food  
        INNER JOIN users
        ON users.id = food.userID
        WHERE food.date = '$date' AND username= '$username' ");
}

function Get_Calories($username, $date)
{
    return ExecuteQuery("SELECT calories.calories, calories.caloriegoal, DAY(calories.date)AS Day, food.id AS FoodID, foodname, servings, food.calories AS CalPerServ, food.date AS fooddate
        FROM calories 
        INNER JOIN users
        ON users.id = calories.userID
        INNER JOIN food
        ON users.id = food.userID
        WHERE MONTH(calories.date) = MONTH('$date') AND username= '$username';");
}
function Add_Calories($calories, $caloriegoal, $userid)
{
    ExecuteQuery("INSERT INTO calories
(
`userID`,
`date`,
`calories`,
`caloriegoal`)
VALUES
(
$userid,
CURDATE(),
$calories,
$caloriegoal);");
}

//Gets profile info needed to generate the users profile
function Get_Profile( $username)
{
    return ExecuteQuery("SELECT firstname, lastname, gender, age, weight, height  

FROM users 

WHERE username = '$username'");
    
}
function Get_ID($username)
{
    return ExecuteQuery("SELECT id  

FROM users 

WHERE username = '$username'");
}

function Get_Food( $id, $date)
{
    return ExecuteQuery("SELECT * FROM food 

WHERE date = '$date' AND userID= '$id'");
}
function Add_Food($food, $servings, $calories, $userid)
{
    ExecuteQuery("INSERT INTO food(foodname, servings, calories, userID) 

VALUES('$food', $servings, $calories, $userid)           
");
}

//Create an account

function Create_Account($fname, $lname, $uname, $gender, $age, $weight, $height, $email, $password,$caloriegoal){
    $db = ConnectToDB();
    
    ExecuteQuery("INSERT INTO users(firstname, lastname, username, gender, age, weight, height, email, password, datejoined, caloriegoal) VALUES($fname, $lname, $uname, $gender, $age, $weight, $height, $email, $password, CURDATE(), $caloriegoal)");
}

function ExecuteQuery($sqlString)
{
    //echo $sqlString;
    $db = ConnectToDB();
    
    $stmt = $db->prepare($sqlString);
    if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);            
         }
         //var_dump($results);
         
         if (isset($results))
         {
             return $results;
         }
       
}
