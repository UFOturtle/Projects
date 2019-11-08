<?php 
	 if (isset($_GET['d'])) 
	 {
     	getData();
	 }
	function Get_Data() 
	{
	    
	    global $db;
	    $config = array(
	        'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_001408918',
	        'DB_USER' => 'se266_001408918',
	        'DB_PASSWORD' => '001408918'
	    );
	    
	    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
	    $db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	    
	    return $db;
	}

	function ExecuteQuery($sqlString)
	{
	    $db = Get_Data();
	    
	    $stmt = $db->prepare($sqlString);

	    if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
	    {
	        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
	             
	    }

	    if(!empty($results))
	    {
	      	return $results;
	    }

	    else
	    {
	        return null;
	    }
	         
	}

	function getData()
	{

	 $data = ExecuteQuery("SELECT calories, date FROM calories");
	 

	 if (isset($_GET['d'])) {
	     $cal = filter_input(INPUT_GET, 'd');
	     var_dump($cal);
	     
	 }


?>