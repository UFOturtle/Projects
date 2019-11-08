
var a = 'String';
var b = 2;
var c = true;

console.log ("a: " + typeof a);
console.log ("b: " + typeof b);
console.log ("c: " + typeof c);

var addend1 = 5;
var addend2 = 2;

console.log (addend1 + " + " + addend2 + " = " + add(addend1, addend2));

function add(num1, num2)
{

return num1 + num2;

}

var array = [];

var i;

for (i = 0; i < 100; i++)
{
    array[i] = {index: i + 1, label:undefined} ;
    if (array[i].index %2 == 0 )
    {
        array[i].label = "fizz";
        
        if( array[i].index % 3 == 0 )
        {
        array[i].label = "fizz buzz";
        }
    }
    else if(array[i].index % 3 == 0)
    {
        array[i].label = "buzz";
    }
}

for (boogers in array)
{
    for (farts in array[boogers])
{
    console.log(boogers + ": " +farts + ": " + array[boogers][farts])
}
    
}


