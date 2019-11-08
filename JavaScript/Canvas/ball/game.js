var c =document.querySelector("canvas");
var ctx = c.getContext("2d");

var balls = [];
var amount = 1000;

console.log(rand(-12, 3));

for (let i=0; i < amount; i++)
{
    rect = new GameObject();
    rect.x = Math.round(rand(0, c.width));
    rect.y = Math.round(rand(0, c.height));
    rect.w = 24;
    rect.h = rect.w;
    rect.vy = Math.round(rand(5, 15));
    rect.vx = 0;

   // rect.w = balls.vy;
    //rect.h = balls.vy;
}
main();

function main()
{
    ctx.clearRect(0,0,c.width, c.height);

    for (let i=0; i < balls.length; i++)
    {
        rect.drawCircle();
        rect.move();
        if(rect.y > c.height + rect.h/2)
        {
            //rect.vy = -rect.vy;
            rect.y = 0 - rect.h/2;
        }
    }

    setTimeout(main, 1000/60);
}

function rand(low, high)
{
    return Math.random() * (high - low) + low;
}