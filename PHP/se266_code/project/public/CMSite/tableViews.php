<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php 
function viewtable($data, $keys,$view)
{
   include'view.php'; 
?>

<form method="post" action="controller.php">
<table class="table table-hover">
      <h3>CM Table </h3><br>
      <input type="text" name="filter">
      <button type="submit" name="view" value="<?php echo($view . "Filtered") ?>">Search for <?php echo($keys[0]) ?></button>
  <thead>
    <tr>
       <?php foreach($keys as $key){?>
      <th scope="col"><?php echo($key)?></th>
       <?php }?>
    </tr>
  </thead>
  <tbody>
      <?php
      
      foreach($data as $value)
      {
          echo'<tr>';
          foreach($keys as $key){
          ?>
        
        <td><?php echo($value[$key]);?></td>

        
 
          <?php
        }
      echo'</tr>';
      }
      
      ?>
 </tbody>
</table>
    <?php
}

    
      