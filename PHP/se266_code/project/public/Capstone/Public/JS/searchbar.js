$("#search-text-box").keypress(function(){
                    console.log(this.value);
                    var food = this.value;
                    
                    
                    if (food != "")
                    {
                    
                    food = food.replace(/\s+/g, '+');
                    
                    httpRequest = new XMLHttpRequest();
    
                    if (!httpRequest) {
                    alert('Giving up :( Cannot create an XMLHTTP instance');
                    return false;
                    }
    
                    httpRequest.onreadystatechange = displayContents;
                    httpRequest.open('GET', '../Models/APIQueries/NutrionixAPIQueries.php?f=' + encodeURIComponent(food));
                    httpRequest.send('f=' + encodeURIComponent(food));
                }
                else
                {
                    $("#resultDiv").html("");
                }
                });
                
                
                function displayContents() {
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                    //document.getElementById("resultDiv").innerHTML = httpRequest.responseText;
                    //console.log(httpRequest.responseText);
                    myjson = JSON.parse(httpRequest.responseText);
                    console.log(myjson);
                    
                    if(myjson != null)
                    {
                        var str="";
                        for(i=0; i < myjson["common"].length; i++)
                        {
                            str+= '<div class="result"><img src="' + myjson["common"][i]["photo"]["thumb"] + '" class="foodpic"><div class="text" ><h3 class="foodname">' + myjson["common"][i]["food_name"] +'</h3>';
                            str+= '<h3 class="food info"> Serving Unit:' + myjson["common"][i]["serving_unit"] 
                            if(myjson["common"][i]["nf_calories"] != undefined)
                            {
                                str+= 'Calories: ' + myjson["common"][i]["nf_calories"] + '</div>';
                            }
                            else
                            {
                                str+= '</div>';
                            }
                            str+= '<form method="post" action="../Controllers/MainController.php"> <input type="hidden" name="name" value="' + myjson["common"][i]["food_name"] + '">' + '<input type="hidden" name="image" value="' + myjson["common"][i]["photo"]["thumb"] + '">' + '<input type="hidden" name="action" value="addfood">' + '<input type="image"  class="add" src="../Public/Images/Add-Icon.png" alt="Submit Form" /> </form>';
                            str+= '</div>';
                            str+= '<div class="result"><img src="' + myjson["branded"][i]["photo"]["thumb"] + '" class="foodpic"><div class="text" ><h3 class="foodname">' + myjson["branded"][i]["food_name"] +'</h3>';
                            str+= '<h3 class="food info"> Serving Unit:' + myjson["branded"][i]["serving_unit"] 
                            if(myjson["branded"][i]["nf_calories"] != undefined)
                            {
                                str+= 'Calories: ' + myjson["branded"][i]["nf_calories"] + '</div>';
                            }
                            else
                            {
                                str+="</div>";
                            }
                            str+= '<form method="post" action="../Controllers/MainController.php"><input type="hidden" name="name" value="' + myjson["branded"][i]["food_name"] + '"><input type="hidden" name="calories" value="' + myjson["branded"][i]["nf_calories"] + '"> ' + '<input type="hidden" name="image" value="' + myjson["branded"][i]["photo"]["thumb"] + '">'+ '<input type="hidden" name="action" value="addfood">' + '<input type="image"  class="add" src="../Public/Images/Add-Icon.png" alt="Submit Form" /> </form>';
                            str+= '</div>';
                        }
                    }
                    $("#resultDiv").html(str);
                    
                    
                    } else {
                    alert('There was a problem with the request.');
                            }
                        }
                    };


                    $(".add").click(function(){console.log("hi")});


        