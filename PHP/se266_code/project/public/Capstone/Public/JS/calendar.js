$(document).ready(function(){

   
		
    var d 	= new Date();
    var mth = d.getMonth()+1;
    var yr 	= d.getFullYear();

    $("#leftarrow").click(function(){
        mth--;
        if(mth == 0)
        {
            yr--;
            mth=12;
        }
        
        showCalendar(mth, yr);
        

    });
    $("#rightarrow").click(function(){
        mth++;
        console.log(mth);
        if(mth == 13)
        {
            yr++;
            mth=1;
        }
        showCalendar(mth, yr);
    });
    $("#year").val(yr);
    showCalendar (mth, yr);

    $("#month,#year").change(function(e) {
        showCalendar ($("#month").val(), $("#year").val());
    });
});

function daysInMonth(anyDateInMonth) {
    return new Date(anyDateInMonth.getYear(), anyDateInMonth.getMonth()+1, 0).getDate();
}

function showCalendar (mth, yr) {
   //Display Month
    var months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	$("#month").html(months[mth]);
   $('#year').html(yr);

    var firstDayOfMonth = mth + "/1/" + yr;
    var d = new Date( firstDayOfMonth );
    var numberOfDaysInMonth = daysInMonth(d);
    var firstDayOfWeek = d.getDay();
    var str="";
    met_goal(yr, mth, 01);
        var day=1;
        //console.log(numberOfDaysInMonth + firstDayOfWeek);
        for(var i =1; i < 43; i++)
        {
       
            
            if (i > firstDayOfWeek && day <= numberOfDaysInMonth)
            {
                
                //console.log(yr + "/" + mth + "/" + day);
                str+=  '<div class="day">'+ day + '</div>';
                day++;
            }
            else{
                str += '<div class="day"></div>';
            }
           if (day > numberOfDaysInMonth && i %7 == 0)
           {
           break;
           }
        }
      //7
        
        str+= "</div>";
    
      str+= "</div>";
    $("#days").html(str);

}



////////////////////////////////////////
i=0;
function met_goal(y, m, d){
      var display = document.getElementById("content");
      var xmlhttp = new XMLHttpRequest();
      var myjson=[];
      xmlhttp.open('GET', '../Models/MYSQLQueries/MYSQLQueries.php?d=' + encodeURIComponent(d) + '&m=' + encodeURIComponent(m) + '&y=' + encodeURIComponent(y));
      xmlhttp.send();
      
      
      xmlhttp.onreadystatechange = function() {
          i++;
          console.log(i);
        if (this.readyState === 4 && this.status === 200) {
        display = document.getElementById("resultDiv");
        console.log(this.responseText);
        
         myjson = JSON.parse(this.responseText);
         
         if(myjson != null)
         {
         days = $(".day");
         console.log(myjson);
         for (i = 0; i < myjson.length; i++)
        {
         for(j = 0; j < days.length; j++ )
         {
            if(myjson[i]["calories"] < myjson[i]["caloriegoal"] && days[j].innerHTML == myjson[i]["Day"] )
            {
                
            
            //console.log(myjson[i]["calories"]);
                days[j].style.backgroundColor = "green";
                days[j].style.color = "white";
               days[j].setAttribute("data-obj",y+'/'+m+'/'+ days[j].innerHTML);
            }
            else if (myjson[i]["calories"] > myjson[i]["caloriegoal"]&& days[j].innerHTML == myjson[i]["Day"])
            {
                 days[j].style.backgroundColor = "red";
                 days[j].style.color = "white";
                 days[j].setAttribute("data-obj",y+'/'+m+'/'+ days[j].innerHTML);
            }
            
            
          }
          }
         }
        } else {
         //alert('There was a problem with the request.');
        };  
        $(".day").click(function(){
            
            if ($(this).attr("data-obj").valueOf() != null)
            {
                datedata = $(this).attr("data-obj").valueOf();
                //console.log(datedata);
                ReMakeList(datedata);
            }
            
                
           
      
      
  });
      } 
  
}

function ReMakeList(date)
{
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    if(dd <= 10)
    {
        mm = dd[1];
    }
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    if(mm <= 10)
    {
        mm = mm[1];
    }
    var yyyy = today.getFullYear();

    today = yyyy + '/' + mm + '/' + dd;
    
if (date == null)
{
    date = today;
}

    date = date.trim();
    //console.log(date + "trimmed");

var str="";
$("#content").html(str);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open('GET', '../Models/MYSQLQueries/MYSQLQueries.php?date=' + encodeURIComponent(date));
      xmlhttp.send();
      
      
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        //display.innerHTML = this.responseText;
         var listjson=[];
         listjson = JSON.parse(this.responseText);
         //console.log(listjson)
         if(listjson != null)
         {
         //console.log(listjson);
         
         for (i = 0; i < listjson.length; i++)
        {
            //console.log(myjson[i]);
            str+= '<div class="item">';
            str+= '<img src="'+ listjson[i]["foodpic"] +'" alt="Search" class="FoodPicItem"/>';
            str+= '<div class="FoodInfoItem">';
            str+= '<p class="FoodNameItem">' + listjson[i]["foodname"] + '</p>';
            str+= '<p class="TotalCalItem">Total Calories: ' + listjson[i]["TotalCal"] + '</p>';
            str+= '</div>';
            console.log(date + ' todayv is:' + today);
            if(date == today)
            {
                str+= '<form method="post" action="../Controllers/MainController.php"><input type="hidden" name="action" value="Editf"><input type="hidden" name="fitem" value="'+ listjson[i]["id"] +'"><input type="image" src="../Public/Images/Edit-Icon.png" alt="Search" class="EditItem"/></form>';
                str+= '<form method="post" action="../Controllers/MainController.php"><input type="hidden" name="action" value="Removef"><input type="hidden" name="fitem" value="'+ listjson[i]["id"] +'"><input type="image" src="../Public/Images/Cancel-Icon.png" alt="Search" class="RemoveItem"/></form>';
            
             }
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