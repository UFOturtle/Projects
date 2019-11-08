var c =document.querySelector("canvas");
var ctx = c.getContext("2d");

var balls = [];
var amount = 1;
var r = "";
var g = "";
var b = "";

for (let i=0; i < amount; i++)
{
    balls[i] = new GameObject();
    balls[i].x =  c.width - (c.width/2);
    balls[i].y = 20 ;
    balls[i].w = 24;
    balls[i].h = balls[i].w;
    balls[i].vy = Math.floor(Math.random() * (10 - -10 + 1)) + -10;
    balls[i].vx = Math.floor(Math.random() * (10 - -10 + 1)) + -10;

   // balls[i].w = balls.vy;
    //balls[i].h = balls.vy;
}
main();

function main()
{
    ctx.clearRect(0,0,c.width, c.height);

    for (let i=0; i < balls.length; i++ )
    {
        balls[i].drawCircle();
        balls[i].move();
        if(balls[i].y > c.height - 24|| balls[i].y < 20) {
            
            r = Math.floor(Math.random() * Math.floor(255));
            g = Math.floor(Math.random() * Math.floor(255));
            b = Math.floor(Math.random() * Math.floor(255));

            balls[i].vy = -balls[i].vy;
           balls[i].color = "rgb(" + r + "," + g + "," + b + ")";

           console.log(Math.floor(Math.random() * (10 - -10 + 1)) + -10);
        }
        if(balls[i].x > c.width - 24|| balls[i].x < 24) {
            
            r = Math.floor(Math.random() * Math.floor(255));
            g = Math.floor(Math.random() * Math.floor(255));
            b = Math.floor(Math.random() * Math.floor(255));

            balls[i].vx = -balls[i].vx;
           balls[i].color = "rgb(" + r + "," + g + "," + b + ")";

           console.log(Math.floor(Math.random() * (10 - -10 + 1)) + -10);
        }

        
    }

    setTimeout(main, 1000/60);
}

function rand(low, high)
{
    return Math.random() * (high - low) + low;
}