var c =document.querySelector("canvas");
var ctx = c.getContext("2d");

var balls = [];
var amount = 10;
var r = "";
var g = "";
var b = "";

for (let i=0; i < amount; i++)
{
    balls[i] = new GameObject();
    balls[i].x = Math.floor(Math.random() * ( 775- 25 + 1)) + 25;
    balls[i].y = Math.floor(Math.random() * ( 775- 25 + 1)) + 25 ;
    balls[i].w = 22;
    balls[i].h = balls[i].w;
    balls[i].vy = Math.floor(Math.random() * (10 - -10 + 1)) + -10;
    balls[i].vx = Math.floor(Math.random() * (10 - -10 + 1)) + -10;         
            r = Math.floor(Math.random() * Math.floor(255));
            g = Math.floor(Math.random() * Math.floor(255));
            b = Math.floor(Math.random() * Math.floor(255));
    balls[i].color = "rgb(" + r + "," + g + "," + b + ")";
    
   // balls[i].w = balls.vy;
    //balls[i].h = balls.vy;
}
 
balls[1].y = 300;
main();

function main()
{
    ctx.clearRect(0,0,c.width, c.height);

    for (let i=0; i < balls.length; i++ )
    {
        
        balls[i].drawCircle();
        balls[i].move();
        if(balls[i].y > c.height - 24|| balls[i].y < 24) {
            
            r = Math.floor(Math.random() * Math.floor(255));
            g = Math.floor(Math.random() * Math.floor(255));
            b = Math.floor(Math.random() * Math.floor(255));

            balls[i].vy = -balls[i].vy;
           balls[i].color = "rgb(" + r + "," + g + "," + b + ")";

           //console.log(Math.floor(Math.random() * (10 - -10 + 1)) + -10);
        }
        if(balls[i].x > c.width - 24|| balls[i].x < 24) {
            
            r = Math.floor(Math.random() * Math.floor(255));
            g = Math.floor(Math.random() * Math.floor(255));
            b = Math.floor(Math.random() * Math.floor(255));

            balls[i].vx = -balls[i].vx;
           balls[i].color = "rgb(" + r + "," + g + "," + b + ")";

          // console.log(Math.floor(Math.random() * (10 - -10 + 1)) + -10);
        }

        
            for (let j = 0; j < balls.length; j++)
           {
               
                   if( Math.abs((balls[i].y) - (balls[j].y)) <= balls[i].vy && i !=j &&  balls[i].x + balls[i].w != c.width && balls[i].x - balls[i].w != 0 && balls[j].x + balls[j].w != c.width && balls[j].x - balls[j].w != 0) 
                   {
                    if (Math.abs((balls[i].x + balls[i].w) - (balls[j].x - balls[j].w)) <= balls[i].vx || Math.abs((balls[i].x - balls[i].w) - (balls[j].x + balls[j].w)) <= balls[i].vx)
                    {
                    console.log("Hit");
                    balls[i].vx = -balls[i].vx;
                    balls[j].vx = -balls[j].vx;
                    //balls[i].x += balls[i].vx;
                    //balls[j].x += balls[j].vx;  
                    }
                   }
               

               
                   if(Math.abs((balls[i].x - balls[j].x)) <= balls[i].vx && i !=j &&  balls[i].y + balls[i].h != c.height && balls[i].y - balls[i].h != 0 && balls[j].y + balls[j].h != c.height && balls[j].y - balls[j].h != 0) 
                   {
                    if (Math.abs((balls[i].y + balls[i].h) - (balls[j].y - balls[j].h)) <= balls[i].vy || Math.abs((balls[i].y - balls[i].h) - (balls[j].y + balls[j].h)) <= balls[i].vy)
                    {
                    console.log("Hit");
                    balls[i].vy = -balls[i].vy;
                    balls[j].vy = -balls[j].vy;
                    //balls[i].x += balls[i].vx;
                    //balls[j].x += balls[j].vx;  
                    }
                   }
               
           }
        
        
    }

    setTimeout(main, 1000/60);
}

function rand(low, high)
{
    return Math.random() * (high - low) + low;
}