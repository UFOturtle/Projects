
class GameObject
{
    constructor(a)
    {
        this.x = 100;
        this.y = 100;
        this.w = 100;
        this.h = 100;
        this.vx = 10;
        this.vy = 0;
        this.color = "blue";
        this.angle = 0;
    }

    drawCircle = function()
    {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.angle * Math.PI/180);
        ctx.fillStyle = this.color;

        ctx.beginPath();
        ctx.arc(0,0,this.w/2,0,360 * Math.PI/180, true)
        ctx.closePath();
        ctx.fill();
        ctx.restore();
    }

    

    drawRect = function()
    {
        ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate(this.angle * Math.PI/180)
            ctx.fillStyle = this.color;
            ctx.fillRect(-this.w/2,-this.h/2, this.w, this.h);
        ctx.restore();
    }

    move = function()
    {
        this.x += this.vx;
        this.y += this.vy;
    }
}

/*function Game()

{
    this.x =
    this.y =
    this.w =
    this.h =
    this.vx =
    this.vy =
    this.color =
    
    this.drawCircle = function()
    {

    }

    this.drawRect = function()
    {

    }

    this.move = function()
}*/