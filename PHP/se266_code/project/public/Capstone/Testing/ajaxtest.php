<?php


?>
<style>
    #content{height: 100px;}
    
</style>
<div id="content"> </div>

<script>
    day = 0;
    m= 0;
    
    y= 0;
        for(var i =1; i < 43; i++)
        {    
                refreshData(2019, 8, day);
                day++;
              
            

    
   
}
    
    
    
    
    
     function refreshData(y, m, d){
      var display = document.getElementById("content");
      var xmlhttp = new XMLHttpRequest();
      var myjson=[];
      xmlhttp.open('GET', '../Models/MYSQLQueries/MYSQLQueries.php?d=' + encodeURIComponent(d) + '&m=' + encodeURIComponent(m) + '&y=' + encodeURIComponent(y));
      xmlhttp.send();
      
      
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
         display.innerHTML = this.responseText;
         myjson = JSON.parse(this.responseText);
         
         if(myjson != null)
         {
         console.log(myjson[0]);
            if(myjson[0]["calories"] < myjson[0]["caloriegoal"])
            {
                display.style.backgroundColor = "green";
            }
            else if (myjson[0]["calories"] > myjson[0]["caloriegoal"])
            {
                 display.style.backgroundColor = "red";
            }
         }
        } else {
          display.innerHTML = "Loading...";
        };
      }
    }
</script>
