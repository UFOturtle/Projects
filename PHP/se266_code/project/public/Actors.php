
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Add Actors</h1>
        <a href="./ViewActors.php">Click here to view the actors table</a>
        <?php
           include './Insert.php';
        /*
         * The idea here is when the user submits the form
         * we can collect the post data from the built in PHP
         * function filter_input.  The first param takes the 
         * type, the second is the attribute name from the input
         * field.
         * 
         * so <input name="dob" />
         * 
         * we get the value in PHP
         * $dob = filter_input(INPUT_POST, 'dob');
         * 
         */
        $FName = filter_input(INPUT_POST, 'fname');
        $LName = filter_input(INPUT_POST, 'lname');
        $BDay = filter_input(INPUT_POST, 'bday');
        $Height = filter_input(INPUT_POST, 'height');
        
        
       if(isset($FName)||
          isset($LName)||
          isset($BDay) ||
          isset($Height))
       {
           print_r(InsertActor($FName, $LName, $BDay, $Height));
          
       }
        
        ?>
        <form method="post" action="#">
            
            First Name <input type="text" value="" name="fname" />
            <br />
            Last Name <input type="text" value="" name="lname" />
            <br />
            Birth Day <input type="text" value="" name="bday" />
            <br />
            Height <input type="text" value="" name="height" />
            <br />
            <input type="submit" value="Submit" />
            
        </form>
        
        
        
    </body>
</html>