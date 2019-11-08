<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<?php

include ('dbconnect.php');
$db =  dbconnect();  


function listCustomers1(){
    
    global $db;
    $sql = "SELECT customerName AS 'Customer Name', contactLastName AS 'Contact Last Name', contactFirstName AS 'Contact First Name', phone, country FROM customers ORDER BY customerName LIMIT 5;";
    $stmt = $db->prepare($sql);

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
    
}

function listEmployees1 () {
    global $db;
    $sql = "SELECT  e1.firstName, e1.lastName, e1.jobTitle, e1.extension, e1.email, o.city as Location, 
       concat(e2.firstName, ' ', e2.lastName) AS 'Manager' 
        FROM employees e1 
        LEFT OUTER JOIN employees e2 ON e1.reportsTo=e2.employeeNumber 
        INNER JOIN offices o on e1.officecode=o.officecode 
        ORDER BY e1.lastName, e1.firstName;";
    $stmt = $db->prepare($sql);

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}


function getRecords ($sql) {
    global $db;
    
    $stmt = $db->prepare($sql);

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

function listCustomers(){
    $sql = "SELECT customerName AS 'Customer Name', contactLastName AS 'Contact Last Name', contactFirstName AS 'Contact First Name', phone, country FROM customers ORDER BY customerName;";
    return (getRecords($sql));
    
}

function listEmployees(){
    $sql = "SELECT  e1.firstName, e1.lastName, e1.jobTitle, e1.extension, e1.email, o.city as Location, concat(e2.firstName, ' ', e2.lastName) AS 'Manager' FROM employees e1 LEFT OUTER JOIN employees e2 ON e1.reportsTo=e2.employeeNumber INNER JOIN offices o on e1.officecode=o.officecode ORDER BY e1.lastName, e1.firstName;";
    return (getRecords($sql));
}


function displayTable ($records) {
   $number_of_records = count ($records);
   echo "<p>$number_of_records records found.</p>";
   if ($number_of_records > 0) {
       // get headers
       $fields = array_keys ($records[0]);
      
       echo "<table border='1'>";
       echo "<thead>";
       echo "<tr>";
        foreach ($fields as $f) {
            echo "<th>$f</th>";
        }
        echo "</tr>";
        echo "</thead>";
        foreach ($records as $record) {
            echo "<tr>";
            foreach ($record as $field) {
                echo "<td>$field</td>";
            }
            echo "</tr>";

        }
        echo "</table>";
   }
   
}



?>

