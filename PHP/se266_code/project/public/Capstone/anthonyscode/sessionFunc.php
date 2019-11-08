<?php
	 session_start(); 

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


    if(isset($_POST['login']))
     {
     	$email = $_POST['email'];
     	$password = $_POST['password'];
     	var_dump(ExecuteQuery("SELECT * FROM users WHERE email = '$email' AND password = '$password'"));
        echo $email, $password;

        function ExecuteQuery($sqlString)
        {
            //echo $sqlString;
            $db = ConnectToDB();
            

            $stmt = $db->prepare($sqlString);
            if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
                     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 }


                 if (isset($results))
                 {
                    
                     return $results;
                 }

        }
  
 //    	if ($query->rowCount() == 1 ) 
 //    	{
 //    		// Auth:success
 //    		$_SESSION["isLoggedIn"] = true;
 //    		header('Location: http://ict.neit.edu/001408918/Capstone/LACalorie/Capstone/capstone/index.php');
 //    	} 
 //        else 
 //    	{
 //    		//Auth:failure
 //    		$_SESSION["isLoggedIn"] = false;
 //    	}
     }

?>