$(function () {
    $("#myAlert2").click(function () {
        alert(myAlert2("Hello!")*2);
    });
    $("#func2").click(function (event) {
        event.preventDefault();
        alert(myfunction($("#str1").val(),$("#str2").val()));
    });
    $("#objbtn").click(function () {
        obj();
    });
    $("#form").submit(function (event) {
        event.preventDefault();
        checkSubmit();
    });

});
function myAlert2(aString) {
    //this function takes parameter
    // it also returns a value
    window.alert("Alerting: " + aString);
    return 34;
}
function myfunction(str1, str2) {
    return str1.toString()+"!="+str2.toString();
}

function wakeywakey() { // ALERT
    window.alert("*****************\n" + "You woke me up...\n\n" +
        "I was fast asleep\n*****************" );
}

function askName() { // CONFIRM
    if (! confirm("Will your tell me your name please?")) {
        window.alert("----------\nSob!....\nso\n" +
            "you don't want to tell me your name\n--------\n");
    } else { //PROMPT
        var n = prompt("Enter name", "Belinda");
        checkName(n);
    }
}

function checkName(name) {
    var message = "";

    if (name.match(/[aeiou]/)) {
        message = "\nYour name has a vowel in it";
    }
    window.alert("Hello there: " + name.toUpperCase() + message );
} //checkName

function redirect() {
    var dir=prompt("Where would you like to go?","");
    self.location=dir;
}

var tourOperator = "Ten Bellies Tours"; // a global variable
holidays=new Array();

// An object IS a function
function Holiday(destination, duration, cost) {
    this.destination = destination; //"this" used in same sense as Java
    this.duration    = duration;
    this.cost        = cost;
    this.agent       = tourOperator;
}

function makeHoliday(dest, dur, cost) {
    var hol = new Holiday(dest, dur, cost);
    holidays.push(hol);
    // To output one named element could use
    //document.write("Tour Agent is: " + hol.agent);
}

function outputObject(anObject) {
    for (f in anObject) {
        $("#objectAddPoint").html($("#objectAddPoint").html()+"<tr>" +
            "<td>" +
            anObject[f].destination +
            "</td>" +
            "<td>" +
            anObject[f].duration +
            "</td>" +
            "<td>" +
            anObject[f].cost +
            "</td>" +
            "<td>" +
            anObject[f].agent +
            "</td>" +
            "</tr>");
    }
}

function obj() {
    makeHoliday("Berlin","10 days","&euro;1000");
    makeHoliday("London","20 days","£1000");
    outputObject(holidays);
}

// Investigating a Form
// Some ideas here were taken from David Flanagan; "JavaScript. 3rd edition"; 1998; O'Reilly
// Another GREAT! Nutshell book.
// See Chapter 16 at ftp://ftp.oreilly.com/pub/examples/nutshell/javascript/
// I also used Sebesta; "programming the World Wide Web 2nd edition"; 2003; Addison Wesley
// and Bates; "Web Programming"; 2002; Wiley.

var word1 = "my word"; // a global variable


function checkSubmit() {

    var q = document.quiz;
    var qc = q.chat;

    window.alert("Checking submit ..." + document.quiz.watch[0].checked);


    for ( var i=0; i<q.holiday.options.length; i++)
    {
        if (q.holiday.options[i].selected)
        {
            qc.value += "Selected: " + q.holiday.options[i].value + "\n";
        }
    }

    if ( noValue(q.Personal_FirstName.value) )
    {
        qc.value += "What no name? - I shall call you Belinda\n";
        q.Personal_FirstName.value = "Belinda";
    }
    var age=q.Personal_Age.value;
    if(age.length==0||age.search(/\D/) !=-1||age<0||age>150){
            alert("Invalid Age!");
            return false;
    }
    checkText(q, qc);
    $.ajax({
        url:$("#form").attr("action")+"?"+$("#form").serialize(),
        dataType:"text"
    }).always(function (data) {
        qc.value+="******Respond of the Server************\n\n"+data;
    });
    return false;
} // checkSubmit

function myAlert(aString) {
    window.alert("Alerting" +aString);
}

function noValue(val)  {
    // javascript uses the regular expressions from perl
    // Sebesta 4.12.1
    if (val.search(/\w/) == -1) {
        return true;
    }
    return false;
} //noValue

function checkText(q, qc) {
    //Warn if text boxes are empty (any alphanumeric is OK)
    //qc.value += "checkText\n";
    for ( var i =0 ; i < q.length; i++) {
        if (noValue(q.elements[i].value)) {
            qc.value += "No value: "+ q.elements[i].name + "\n";
        }
    }

}// checkText