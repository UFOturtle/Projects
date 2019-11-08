<?php
//Conect to DB
function Get_Data() {
    
    global $db;
    $config = array(
        'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=classicmodels',
        'DB_USER' => 'web_user',
        'DB_PASSWORD' => 'web_password'
    );
    
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    
    return $db;
}

//Query functions
function listCustomers()
{
    return ExecuteQuery("SELECT customerName, contactFirstName, contactLastName, phone, country FROM customers; ");
}

function listEmployees()
{
    return ExecuteQuery("SELECT e.firstName, e.lastName, concat(m.firstName, ' ', m.lastName ) As ReportsTo, e.extension, e.email, e.jobTitle, e.officeCode, offices.city, offices.state, offices.postalCode 

FROM employees e 

INNER JOIN offices  

ON e.officeCode = offices.officeCode  

INNER JOIN 

employees m  

ON m.employeeNumber = e.reportsto ");
}

function listProducts()
{
    return ExecuteQuery("SELECT productName, quantityInStock, buyPrice, MSRP, products.productLine, productLines.textDescription, productLines.htmlDescription, productLines.image 

FROM products 

INNER JOIN productlines 

ON productlines.productLine = products.productLine 

ORDER BY productLine; ");
}

function listOrders()
{
    return ExecuteQuery("SELECT orders.orderDate, orders.status, customerName, orders.shippedDate, products.productName, orderdetails.priceEach, orderdetails.quantityOrdered, Sum(orderdetails.priceEach * orderdetails.quantityOrdered) As Total 

FROM customers  

INNER JOIN orders  

ON orders.customerNumber = customers.customerNumber  

INNER JOIN orderdetails  

ON orders.orderNumber = orderdetails.orderNumber 

INNER JOIN products 

ON products.productCode = orderdetails.productCode  

GROUP BY orders.orderDate, orders.status, customerName, orders.shippedDate, products.productName, orderdetails.priceEach ORDER BY orders.orderDate DESC;  ");
}

function listTopCustomers()
{
    return ExecuteQuery("SELECT customers.customerName, customers.contactFirstName, customers.contactLastName, customers.phone, customers.country, Sum(orderdetails.priceEach * orderdetails.quantityOrdered) As Total , customers.customerNumber, MAX(orderDate) AS MostRecentOrder 

FROM customers  

INNER JOIN orders  

ON orders.customerNumber = customers.customerNumber  

INNER JOIN orderdetails  

ON orders.orderNumber = orderdetails.orderNumber  

GROUP BY  customers.customerNumber 

ORDER BY Total  

DESC 

LIMIT 10; ");
}

function listUselessCustomers()
{
    return ExecuteQuery("SELECT customers.customerName, customers.contactFirstName, customers.contactLastName, customers.phone, customers.country 

FROM customers  

LEFT JOIN orders  

ON orders.customerNumber = customers.customerNumber  

WHERE orders.customerNumber IS NULL; ");
}

function listCustomersByCountry()
{
    return ExecuteQuery("SELECT customers.country, count( distinct customers.customerNumber) as numberOfCustomers ,Sum(orderdetails.priceEach * orderdetails.quantityOrdered) As Total , customers.customerNumber 

FROM customers   

INNER JOIN orders   

ON orders.customerNumber = customers.customerNumber   

INNER JOIN orderdetails   

ON orders.orderNumber = orderdetails.orderNumber   

GROUP BY  customers.country 

ORDER BY customers.country; ");
}
  //calls to filtered functions
///////////////////////////////
//var_dump(listEmployeesFiltered("ulie"));
//var_dump(listCustomersFiltered("as"));
//var_dump(listProductsFiltered("vespa"));
//var_dump(listOrdersFiltered("2019"));
//var_dump(listTopCustomersFiltered("ali"));
//var_dump(listUselessCustomersFiltered("ar"));
//var_dump(listCustomersByCountryFilterrd("u"));
//////////////////////////////https://stackoverflow.com/questions/19474054/wildcards-in-phps-strpos-function

//Execute Query
function ExecuteQuery($sqlString)
{
    $db = Get_Data();
    
    $stmt = $db->prepare($sqlString);
    if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);            
         }
         //var_dump($results);
         return $results;
}


//Filtered Functions
function listCustomersFiltered($name)
{
    
    $results = listCustomers();
    $filter = array();
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["customerName"]), strtolower($name))!==false)
        {
            array_push($filter, $value);
        }
    }
    return $filter;
}

function listEmployeesFiltered($name)
{
    $results = listEmployees();
    $filter = array();
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["firstName"]), strtolower($name))!==false)
        {
            array_push($filter, $value);
        }
    }
    return $filter;
}

function listProductsFiltered($name)
{
    $results = listProducts();
    $filter = array();
    
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["productName"]), strtolower($name))!==false)
        {
            array_push($filter, $value);
        }
        }
        
        return $filter;
}

function listOrdersFiltered($date)
{
    return ExecuteQuery("SELECT orders.orderDate, orders.status, customerName, orders.shippedDate, products.productName, orderdetails.priceEach, orderdetails.quantityOrdered, Sum(orderdetails.priceEach * orderdetails.quantityOrdered) As Total 

FROM customers  

INNER JOIN orders  

ON orders.customerNumber = customers.customerNumber  

INNER JOIN orderdetails  

ON orders.orderNumber = orderdetails.orderNumber 

INNER JOIN products 

ON products.productCode = orderdetails.productCode  

WHERE Cast(orderDate AS CHAR) LIKE '%$date%'

GROUP BY orders.orderDate, orders.status, customerName, orders.shippedDate, products.productName, orderdetails.priceEach ORDER BY orders.orderDate DESC;  "); 
}

function listTopCustomersFiltered($name)
{
    $results = listTopCustomers();
    $filter = array();
    
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["customerName"]), strtolower($name))!==false)
        {
            array_push($filter, $value);
        }
        }
        
        return $filter;
}

function listUselessCustomersFiltered($name)
{
    $results = listUselessCustomers();
    $filter = array();
    
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["customerName"]), strtolower($name))!==false)
        {
            array_push($filter, $value);
        }
        }
        
        return $filter;
}

function listCustomersByCountryFiltered($country)
{
    $results = listCustomersByCountry();
    $filter = array();
    
        foreach($results as $value)
        {
        
        if(strpos(strtolower($value["country"]), strtolower($country))!==false)
        {
            array_push($filter, $value);
        }
        }
        
        return $filter;
}