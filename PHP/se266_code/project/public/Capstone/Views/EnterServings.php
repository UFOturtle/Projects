<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<link type="text/css" rel="stylesheet" href="../Public/CSS/EnterServings.css"/>
<div id="enterS">
<form method="post" action="../Controllers/MainController.php">
    <h1 id="servingsT">Enter Servings</h1>
    <h3 id="servingsmsg">Please Enter The Number Of Servings You Want To Add</h3>
    <div id="values">
        Food: <input id= "fn"type="text" name="name" value="<?php echo$name; ?>" readonly="readonly"><br>
        Calories Per Serving: <input id="c" type="text" value="<?php echo$calories; ?>" name="calories" readonly="readonly">
    </div>
    <div id="serving-inputs">
        <input type="image" class="add" src="../Public/Images/Cancel-Icon.png" alt="Submit Form" name="cancel" value="1" id="cancel-icon" >
  </form>
    <form  method="post" action="../Controllers/MainController.php">
        <input id="servings" type="text" value="<?php echo$servings; ?>" name="servings">
        <input id= "fn"type="hidden" name="name" value="<?php echo$name; ?>" >
        <input id="c" type="hidden" value="<?php echo$calories; ?>" name="calories" >       
        <input type="hidden" value="<?php echo$_POST["action"]; ?>" name="action">
        <input type="hidden" value="<?php echo$image; ?>" name="image">
        <input type="image" class="add" src="../Public/Images/Confirm-Icon.png"  alt="Submit Form" id="confirm-icon" >
    </div>
</form>
</div>

