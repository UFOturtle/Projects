fetch(' http://ict.neit.edu/evanrense/salaries.php')
.then(function(response) {
    return response.json();
})
.then(function(myjson) {
//VARIABLES
var averagesalary = [0,0,0];
var total = [0,0,0];
var webDevelopers = [];
var softwareDevelopers = [];
var databaseAnalyst = [];
var webSalaries = []
var people = [];
var search = document.querySelector("#search-submit");
var searchOutput = document.querySelector(".output");
var listDA = document.querySelector("#list-database-analyst");
var listWD = document.querySelector("#list-web-developer");
var listSE = document.querySelector("#list-software-engineer");
var listArea = document.querySelector("#list-area").querySelector(".output");

for(let i = 0; i < myjson.length; i++)
{
    people.push(myjson[i]);
}

console.log(people);

for ( i = 0; i < myjson.length; i++)
{
    if (myjson[i].jobTitle === "Web Developer")
    {
        console.log(i);
        webDevelopers.push(myjson[i]);
    }

    if (myjson[i].jobTitle === "Software Developer")
    {
        console.log(i);
        softwareDevelopers.push(myjson[i]);
    }

    if (myjson[i].jobTitle === "Database Analyst")
    {
        console.log(i);
        databaseAnalyst.push(myjson[i]);
    }
}

for (let i=0; i < webDevelopers.length; i++)
    {
        total[0] += Number(webDevelopers[i].salary);
        webSalaries[i] = Number(webDevelopers[i].salary);
    }

for (let i=0; i < softwareDevelopers.length; i++)
    {
        total[1] += Number(softwareDevelopers[i].salary);

        //console.log(softwareDevelopers[i].salary);
    }

for ( let i=0; i < databaseAnalyst.length; i++)
    {
        total[2] += Number(databaseAnalyst[i].salary);
    }

    var size = [webDevelopers.length, softwareDevelopers.length, databaseAnalyst.length]
    for (let i=0; i < 3; i++)
    {
        averagesalary[i] = total[i]/size[i]
    }

    //console.log(averagesalary[1]);

    var webave = document.querySelector("h3.analyst-average");
    var softwareave = document.querySelector("h3.software-average");
    var analystarea= document.querySelector("h3.web-average");
    
    webave.innerHTML = Math.floor(averagesalary[2]);
    softwareave.innerHTML = Math.floor(averagesalary[1]);
    analystarea.innerHTML = Math.floor(averagesalary[0]);
    //console.log(averagesalary[0]);





    var dataArea = document.querySelector("#database-analyst-area");
    var webArea = document.querySelector("#web-developer-area");
    var softwareArea = document.querySelector("#software-engineer-area");

     //console.log(webmax);
    var webmax = webDevelopers[0].salary;
    var webmaxIndex = 0;

    for (var i = 1; i < webDevelopers.length; i++) 
    {
        if (Number(webDevelopers[i].salary) > webmax) {
            webmaxIndex = i;
            webmax = webDevelopers[i].salary;
        }
    }


    var datamax = 0;
    var datamaxIndex = 0;

    for (let i = 0; i < databaseAnalyst.length; i++) 
    {
        if (databaseAnalyst[i].salary > datamax) {
            datamaxIndex = i;
            datamax = databaseAnalyst[i].salary;
            //console.log()
        }
    }

    var softwaremax = 0;
    var softwaremaxIndex = 0;

    for (let i = 0; i < softwareDevelopers.length; i++) 
    {
        if (softwareDevelopers[i].salary > softwaremax) {
            softwaremaxIndex = i;
            softwaremax = softwareDevelopers[i].salary;
            //console.log()
        }
    }

    dataArea.querySelector(".analysthighest").innerHTML = datamax;
    webArea.querySelector(".highest").innerHTML = webmax;
    softwareArea.querySelector(".highest").innerHTML = softwaremax;

    dataArea.querySelector(".first").innerHTML = databaseAnalyst[datamaxIndex].name.first;
    webArea.querySelector(".first").innerHTML = webDevelopers[webmaxIndex].name.first;
    softwareArea.querySelector(".first").innerHTML = softwareDevelopers[softwaremaxIndex].name.first;

    dataArea.querySelector(".last").innerHTML = databaseAnalyst[datamaxIndex].name.last;
    webArea.querySelector(".last").innerHTML = webDevelopers[webmaxIndex].name.last;
    softwareArea.querySelector(".last").innerHTML = softwareDevelopers[softwaremaxIndex].name.last;

    search.addEventListener("click", function(e){
        var inputFirst = document.querySelector("#first-name").value;
        var inputLast = document.querySelector("#last-name").value;

        

        for (let i = 0; i < people.length; i++)
        {

            if (people[i].name.first === inputFirst && people[i].name.last === inputLast)
            {
                searchOutput.innerHTML = "Name: " + people[i].name.first + " " + people[i].name.last + " <br>Job Title: " + people[i].jobTitle + "<br>Salary: $" + people[i].salary;
            }
        }

    });

    listDA.addEventListener("click", function(e){ 
        listArea.innerHTML = "";
        for(let i = 0; i < databaseAnalyst.length; i++)
        {
            
            listArea.innerHTML += "<pre> Name: " + databaseAnalyst[i].name.first  + " " + databaseAnalyst[i].name.last + "    Job Title: " + databaseAnalyst[i].jobTitle + "    Salary: $" + databaseAnalyst[i].salary + " </pre> <br>";
        }
    });

    listSE.addEventListener("click", function(e){
        listArea.innerHTML = "";
        for(let i = 0; i < softwareDevelopers.length; i++)
        {
            listArea.innerHTML += "<pre> Name: " + softwareDevelopers[i].name.first  + " " + softwareDevelopers[i].name.last + "    Job Title: " + softwareDevelopers[i].jobTitle + "    Salary: $" + softwareDevelopers[i].salary + " </pre> <br>";
        }
    });

    listWD.addEventListener("click", function(e){
        listArea.innerHTML = "";
        for(let i = 0; i < webDevelopers.length; i++)
        {
            listArea.innerHTML += "<pre> Name: " + webDevelopers[i].name.first  + " " + webDevelopers[i].name.last + "    Job Title: " + webDevelopers[i].jobTitle + "    Salary: $" + webDevelopers[i].salary + " </pre> <br>";
        }
    });
});