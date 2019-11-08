<?php
include'tableViews.php';
include 'model.php';


$view = filter_input(INPUT_POST, 'view');
$filter = filter_input(INPUT_POST, 'filter');

switch ($view) {
    case "listCustomers":
        $data = listCustomers();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    case "listEmployees":
        $data = listEmployees();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    case "listProducts":
        $data = listProducts();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
        
        case "listOrders":
        $data = listOrders();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;

        case "listTopCustomers":
        $data = listTopCustomers();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
        
        case "listUselessCustomers":
        $data = listUselessCustomers();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
        
        case "listCustomersByCountry":
        $data = listCustomersByCountry();
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    ////////////////////////////////////////////////////////////////////////////    
        
        
        
  ///////////////////////////////////////////////////////////////////////////////      
        //FILTERED CASES
        case "listCustomersFiltered":
        $data = listCustomersFiltered($filter);
            if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    case "listEmployeesFiltered":
        $data = listEmployeesFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    case "listProductsFiltered":
        $data = listProductsFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    case "listOrdersFiltered":
        $data = listOrdersFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;

    case "listTopCustomersFiltered":
        $data = listTopCustomersFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
        
    case "listUselessCustomersFiltered":
        $data = listUselessCustomersFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
        
    case "listCustomersByCountryFiltered":
        $data = listCustomersByCountryFiltered($filter);
        if(sizeof($data)== 0)
        {
            echo'Search failed!! :( <a href="javascript:history.go(-1)">Go back..</a>';
            break;
        }
        foreach($data as $value)
        {
        $keys = array_keys($value);
        }
        
        viewTable($data, $keys,$view);
        break;
    default:
        echo'Error Try going <a href="view.php"> Home</a>';
        break;
}