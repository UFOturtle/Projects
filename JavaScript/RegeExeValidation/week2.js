// JavaScript Document

var input = document.querySelectorAll("input[type='text']");
var error = document.querySelectorAll("span");
var submit = document.querySelector("input[type='button'");
var confirmation = document.querySelector("#confirmation");
var emailConfirmation = document.querySelector("#email-confirmation");
var email = document.querySelector("#email");
var info = document.querySelector("#info");
var form = document.querySelector("#form");

var person = {
    fname: input[0].value,
    lname: input[1].value,
    email: input[2].value,
    phone: input[4].value
}

var validation = [
    {
        message: function (){error[0].innerHTML = "* FIRST NAME CANNOT HAVE SPECIAL CHARACTERS OR SPACES BRO"},
        regEx: RegExp(/^[A-Za-z]+$/i)
    },
    {
        message: function () {error[1].innerHTML = "* LAST NAME CANNOT HAVE SPECIAL CHARACTERS OR SPACES BRO"},
        regEx: new RegExp(/^[A-Za-z]+$/i)
    },
    {
        message: function () {error[2].innerHTML = "* ENTER A VALID EMAIL ADDRESS"},
        regEx: 	/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$$/g
    },
    {
        message: function () {error[3].innerHTML = "* ENTER A VALID EMAIL ADDRESS"},
        regEx: /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/g
    },
    {
        message: function () {error[4].innerHTML = "* ENTER A VALID PHONE #"},
        regEx: /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/i
    }
]

console.log(validation[0].regEx.test(" d s"));

submit.addEventListener("click", function (e) {
    var confirmationCounter = 0; 

    for (var i = 0; i < input.length; i++) {
        //console.log(input[i]);

        if (!validation[i].regEx.test(input[i].value) || input[i].value == "") {
            validation[i].message();
            error[i].style.color = "#ff0000";
        }
        else {
            error[i].innerHTML = "";
            confirmationCounter++;
        }
        console.log(validation[i].regEx.test(this.value));
    }

    if (confirmationCounter == input.length && email.value === emailConfirmation.value)
    {
        form.style.display = "none";
        confirmation.style.display = "block";
        
        
        info.innerHTML = "Name: " + input[0].value + " " + input[1].value + "<br> Email: " + 
        input[2].value + "<br> Phone Number: " + input[4].value;

    }
});