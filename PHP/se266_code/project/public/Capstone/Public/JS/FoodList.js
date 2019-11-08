function MakeList(date)
{
if (date == null)
{
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

date = yyyy + '/' + mm + '/' + dd + '/';
}
//console.log(date);
      var xmlhttp = new XMLHttpRequest();
      var myjson=[];
      xmlhttp.open('GET', '../Models/MYSQLQueries/MYSQLQueries.php?date=' + encodeURIComponent(date));
      xmlhttp.send();
      
      
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        //display.innerHTML = this.responseText;

         var myjson = JSON.parse(this.responseText);
         
         if(myjson != null)
         {
         var days = $(".day");
         console.log(myjson);
         var str="";
         $("#content").html(str);
         for (i = 0; i < myjson.length; i++)
        {
            //console.log(myjson[i]);
            str+= '<div class="item">';
            str+= '<img src="'+ myjson[i]["foodpic"] +'" alt="Search" class="FoodPicItem"/>';
            str+= '<div class="FoodInfoItem">';
            str+= '<p class="FoodNameItem">' + myjson[i]["foodname"] + '</p>';
            str+= '<p class="TotalCalItem">Total Calories: ' + myjson[i]["TotalCal"] + '</p>';
            str+= '</div>';
            str+= '<form method="post" action="../Controllers/MainController.php"><input type="hidden" name="action" value="Editf"><input type="hidden" name="fitem" value="'+ myjson[i]["id"] +'"><input type="image" src="../Public/Images/Edit-Icon.png" alt="Search" class="EditItem"/></form>';
            str+= '<form method="post" action="../Controllers/MainController.php"><input type="hidden" name="action" value="Removef"><input type="hidden" name="fitem" value="'+ myjson[i]["id"] +'"><input type="image" src="../Public/Images/Cancel-Icon.png" alt="Search" class="RemoveItem"/></form>';
            str+= '</div>';
        }
        }
        $("#content").html(str);
         }
        else {
         //alert('There was a problem with the request.');
        };  
      } 
  
  }