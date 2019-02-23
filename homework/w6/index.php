<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-8
 * Time: 下午9:43
 */
$redirect=htmlspecialchars("/homework/w6/index.php");
include_once "../../core/util.php";
if(!isset($_COOKIE["token"])) {
    redirect("/account/login.php?redirect=" . $redirect);
    exit(0);
}
$info=get_info($_COOKIE["token"]);
if (!$info) {
    redirect("/account/login.php?redirect=" . $redirect);
    exit(0);
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Homework-week 6</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="icon" href="/resources/icon.png" />
</head>
<body>
<nav class="navbar navbar-expand navbar-dark sticky-top flex-column flex-md-row bd-navbar" style="background-color:#8c0000">
    <a class="navbar-brand" href="http://www.pku.edu.cn" target="_blank">
        <img src="/resources/pkulogo_white.png" alt="PKU" />
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://net.pku.edu.cn/~zt/wst/" target="_blank">Course Home Page<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://162.105.146.180/Phorum/index.php" target="_blank">Class Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://162.105.146.180/wst/homework/2017/homework.html" target="_blank">Class Homework Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/" target="_self">Home Page</a>
            </li>
        </ul>
    </div>
    <?php
    if(!$info):
        ?>
        <a class="btn btn-outline-light text-light" href="/account/login.php">Login</a>
        <a class="btn btn-outline-light text-light" href="/account/sign_up.php">Sign Up</a>
        <?php
    else:
        ?>
        <ul class="text-light navbar-nav">
            <li class="nav-link mt-3 mr-3">
                <p>
                    Welcome,
                    <?php
                    echo $info["name"];
                    ?>
                    !
                </p>
            </li>

        </ul>
        <a class="btn btn-outline-light text-light" href="/account/logout.php?redirect=<?php echo $redirect?>">Logout</a>
        <?php
    endif;
    ?>
</nav>

<p class="m-5">
    <h1 class="text-center text-danger">
    Homework of week 6
    </h1>
</p>

<div class="container">
    <div class="row m-2">
        <div class="col-12">
            <h3 class="text-center text-dark">
                Part 0:Q&A
            </h3>
        </div>

        <div class="col">
            <p class="text-info">Q:What are JavaScript browser sniffers?</p>
            <p>JavaScript browser sniffers are tools to determine the type and version of the client's browser (and possibly, the operation system)</p>
        </div>
        <div class="col">
            <p class="text-info">Q:Why are they so commonly used in javascripts?</p>
            <p>Because the version and type of browser is important for javascript programmers. The support of some browser-specified extensions of javascripts varies among different browsers. So it's important to detect the type of browser to provide the proper script code.</p>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class="text-center text-dark">Part 1:hiThere.html</h3>
        </div>
        <div class="col">
            <button class="btn btn-primary " data-toggle="modal" data-target="#hithere">View hiThere</button>

            <button class="btn btn-primary " data-toggle="modal" data-target="#hitheresource">View-source: hiThere</button>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class=" text-dark text-center">Part 2: function.html</h3>
        </div>
        <div class="col justify-content-center">
            <button class="btn btn-primary " id="myAlert2">Launch function 1</button>
        </div>
        <div class="col">
            <form class="form-inline">
                <input class="form-control" placeholder="First String" id="str1">
                <input class="form-control" placeholder="Second String" id="str2">
                <button class="btn btn-primary" id="func2">Launch function 2</button>
            </form>
        </div>
        <div class="col">
            <button class="btn btn-primary" data-toggle="modal" data-target="#function">View-source: function</button>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class="text-center text-dark">Part 3:popups.html</h3>
        </div>
        <div class="col justify-content-between">
            <button class="btn btn-primary" onclick="redirect()">Redirect to other places</button>
            <button class="btn btn-primary " data-toggle="modal" data-target="#popup">View popup 2</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#popupsource">View-source: popup.hhtml</button>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class="text-dark text-center">Part 4:objects.html</h3>
        </div>
        <div class="col">
            <button class="btn btn-primary" data-toggle="modal" data-target="#object" id="objbtn">View object.html</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#objectsource" >View-source: object.html</button>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class="text-center text-dark">
                Part 5:wizardForm.html
            </h3>
        </div>
        <div class="col">
            <form class="form-group" action="dump.php"  method="GET" name="quiz" id="form">
                <OL>
                    <LI><P>Please identify and describe yourself:</P>
                        <TABLE>
                            <TR>
                                <TD ALIGN="right"><EM>First Name</EM></TD>
                                <TD><INPUT  TYPE=TEXT NAME="Personal_FirstName" SIZE=25></TD>
                            </TR><TR>
                                <TD ALIGN="right"><EM>Last Name</EM></TD>
                                <TD><INPUT  TYPE=TEXT NAME="Personal_LastName" SIZE=25></TD>
                            </TR><TR>
                                <TD ALIGN="right"><EM>Age</EM></TD>
                                <TD><INPUT  TYPE=TEXT NAME="Personal_Age" SIZE=3 MAXLENGTH=3></TD>
                            </TR><TR>
                                <TD ALIGN="right"><EM>Sex</EM></TD>
                                <TD><INPUT  TYPE=RADIO NAME="Personal_Sex" VALUE="Male" CHECKED>Male
                                    <INPUT  TYPE=RADIO NAME="Personal_Sex" VALUE="Female">Female</TD>
                            </TR><TR>
                                <TD ALIGN="right"><EM>ID Number</EM></TD>
                                <TD><INPUT  TYPE=TEXT NAME="Personal_IDNumber" SIZE=16 MAXLENGTH=16></TD>
                            </TR>
                        </TABLE>

                    <LI><P>Choose one of the following options:</P>
                        <P><INPUT  TYPE=RADIO NAME="watch" VALUE="Dunno" CHECKED> I don't know?!
                            <BR><INPUT  TYPE=RADIO NAME="watch" VALUE="Radio"> Radio
                            <BR><INPUT class="form-check" TYPE=RADIO NAME="watch" VALUE="TV">TV
                            <BR><INPUT class="form-check" TYPE=RADIO NAME="watch" VALUE="Film">Film
                            <BR><BR>
                        </P>

                    <LI><P>Choose one of the following options:</P>
                        <P><SELECT NAME="holiday">
                                <OPTION value="Greece" SELECTED>Greece <OPTION value="Italy">Italy
                                <OPTION value="France">France <OPTION value="Spain">Spain
                            </SELECT>
                            <BR>
                        </P>
                    <LI><P>How would you rate your knowledge of JavaScript?</P>
                        <P>
                            <INPUT TYPE=RADIO NAME="knowledge" VALUE="1" onClick="alert('Time for some SERIOUS learning');">1<br>
                            <INPUT class="form-check" TYPE=RADIO NAME="knowledge" VALUE="2" onClick="alert('I hope you\'re yearning for some learning');">2<br>
                            <INPUT TYPE=RADIO NAME="knowledge" VALUE="3" CHECKED>3<br>
                            <INPUT TYPE=RADIO NAME="knowledge" VALUE="4">4<br>
                            <INPUT TYPE=RADIO NAME="knowledge" VALUE="5">5<br>
                            <BR></P>
                </OL>
                <p />
                <textarea name="chat" rows=5 cols=40></textarea><p />
                <INPUT  TYPE=button class="btn-block btn" VALUE="Don't Push Me" name="push" onClick="alert('HOW RUDE!!!!\nI asked you NOT to push me');">
                <button class="btn btn-outline-success btn-block" TYPE=SUBMIT VALUE="Submit Form">Submit</button>
                <button class="btn btn-outline-secondary btn-block" TYPE=RESET VALUE="Reset Form" onClick="return confirm('Are you sure?');">Reset</button>

            </FORM>
        </div>
        <div class="col-12">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#wizardForm">View-source: wizardForm</button>
        </div>
    </div>
    <hr>
    <p>
        As is required, I'd like to mention the efforts. As you may have seen, I used jQuery ajax in this website, and in other places. You can have fun with my <a href="/account/login.php?redirect=<?php echo $redirect ?>" >login</a> system. To see exactly what functions are realized, refer to the <button class="btn-link btn" data-toggle="modal" data-target="#script">full code</button> of my script.
    </p>
</div>
<div class="alert alert-danger mt-5 mb-5 text-center">This is the end of homework 6</div>
<!-- Modal -->
<div class="modal fade" id="hithere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">hiThere</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <script>
                    document.write("<h1 class='text-danger text-center'>Hi There!</h1>" +
                        "<div class='container'>" +
                        "<div class='row'>" +
                        "<div class='col'>" +
                        "<div class='card'>" +
                        "<div class='card-header'>Bill Tao's Personal Information</div>" +
                        "<div class='card-body'>" +
                        "<table class='table table-hover'>" +
                        "<tr>" +
                        "<td>Home Town</td><td>Chengdu</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>Country</td><td>Peole's Republic of China</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>Favourite TV Show</td><td>Live News</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>Favourite Food</td><td>Almost any Sichuan cuisine</td>" +
                        "</tr>" +
                        "</table> " +
                        "</p></div> " +
                        "</div> " +
                        "</div> " +
                        "</div> " +
                        "</div> ");
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hitheresource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: hiThere.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre><code class="javascript hljs">
                &lt;script>
                    document.write("&lt;h1 class='text-danger text-center'>Hi There!&lt;/h1>" +
                        "&lt;div class='container'>" +
                        "&lt;div class='row'>" +
                        "&lt;div class='col'>" +
                        "&lt;div class='card'>" +
                        "&lt;div class='card-header'>Bill Tao's Personal Information&lt;/div>" +
                        "&lt;div class='card-body'>" +
                        "&lt;table class='table table-hover'>" +
                        "&lt;tr>" +
                        "&lt;td>Home Town&lt;/td>&lt;td>Chengdu&lt;/td>" +
                        "&lt;/tr>" +
                        "&lt;tr>" +
                        "&lt;td>Country&lt;/td>&lt;td>Peole's Republic of China&lt;/td>" +
                        "&lt;/tr>" +
                        "&lt;tr>" +
                        "&lt;td>Favourite TV Show&lt;/td>&lt;td>Live News&lt;/td>" +
                        "&lt;/tr>" +
                        "&lt;tr>" +
                        "&lt;td>Favourite Food&lt;/td>&lt;td>Almost any Sichuan cuisine&lt;/td>" +
                        "&lt;/tr>" +
                        "&lt;/table> " +
                        "&lt;/p>&lt;/div> " +
                        "&lt;/div> " +
                        "&lt;/div> " +
                        "&lt;/div> " +
                        "&lt;/div> ");
                &lt;/script>
                    </code> </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="function" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: popup.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre><code class="javascript">function myAlert2(aString) {
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
                    </code> </pre>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: hiThere.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>And today's nonsense is ...</h1>
                Mr Pudding says: Do you want to go to
                <a href="#" onMouseOver="self.status='Off to the Lemon'; return true;"
                   onMouseOut="self.status='';" >the Lemon</a>?
                <br />or would you prefer the
                <a href="#" onMouseOver="self.status='Ah.... I see that you prefer the lime'; return true;"
                   onMouseOut="self.status='';">the Lime</a>?

                <p>
                    <a href="#" onClick="askName(); return false"><img border=1
                                                                       width=201 height=66 src="whatName.gif" title="What is Your Name?"></a> </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupsource" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: popup.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre><code class="html">&lt;h1>And today's nonsense is ...&lt;/h1>
                Mr Pudding says: Do you want to go to
                &lt;a href="#" onMouseOver="self.status='Off to the Lemon'; return true;"
                   onMouseOut="self.status='';" >the Lemon&lt;/a>?
                &lt;br />or would you prefer the
                &lt;a href="#" onMouseOver="self.status='Ah.... I see that you prefer the lime'; return true;"
                   onMouseOut="self.status='';">the Lime&lt;/a>?

                &lt;p>
                    &lt;a href="#" onClick="askName(); return false">&lt;img border=1
                                                                       width=201 height=66 src="whatName.gif" title="What is Your Name?">&lt;/a> &lt;/p>
                    </code> </pre>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="object" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">object</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="objectAddPoint">
                    <tr>
                        <th>Destination</th>
                        <th>Duration</th>
                        <th>Cost</th>
                        <th>Agent</th>
                    </tr>
                </table>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
    </div>
</div>
</div>

<div class="modal fade" id="objectsource" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: popup.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre><code class="javascript">
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
        $("#objectAddPoint").html($("#objectAddPoint").html()+"&lt;tr>" +
            "&lt;td>" +
            anObject[f].destination +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].duration +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].cost +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].agent +
            "&lt;/td>" +
            "&lt;/tr>");
    }
}

function obj() {
    makeHoliday("Berlin","10 days","&euro;1000");
    makeHoliday("London","20 days","£1000");
    outputObject(holidays);
}
                    </code> </pre>
                and
                <pre><code class="html">
                        &lt;table class="table table-hover" id="objectAddPoint">
                    &lt;tr>
                        &lt;th>Destination&lt;/th>
                        &lt;th>Duration&lt;/th>
                        &lt;th>Cost&lt;/th>
                        &lt;th>Agent&lt;/th>
                    &lt;/tr>
                &lt;/table>
                    </code> </pre>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="wizardForm" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: popup.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre ><code class="html" style="height: 400px;overflow: scroll">
                        &lt;form class="form-group" action="dump.php"  method="GET" name="quiz" id="form">
                &lt;OL>
                    &lt;LI>&lt;P>Please identify and describe yourself:&lt;/P>
                        &lt;TABLE>
                            &lt;TR>
                                &lt;TD ALIGN="right">&lt;EM>First Name&lt;/EM>&lt;/TD>
                                &lt;TD>&lt;INPUT  TYPE=TEXT NAME="Personal_FirstName" SIZE=25>&lt;/TD>
                            &lt;/TR>&lt;TR>
                                &lt;TD ALIGN="right">&lt;EM>Last Name&lt;/EM>&lt;/TD>
                                &lt;TD>&lt;INPUT  TYPE=TEXT NAME="Personal_LastName" SIZE=25>&lt;/TD>
                            &lt;/TR>&lt;TR>
                                &lt;TD ALIGN="right">&lt;EM>Age&lt;/EM>&lt;/TD>
                                &lt;TD>&lt;INPUT  TYPE=TEXT NAME="Personal_Age" SIZE=3 MAXLENGTH=3>&lt;/TD>
                            &lt;/TR>&lt;TR>
                                &lt;TD ALIGN="right">&lt;EM>Sex&lt;/EM>&lt;/TD>
                                &lt;TD>&lt;INPUT  TYPE=RADIO NAME="Personal_Sex" VALUE="Male" CHECKED>Male
                                    &lt;INPUT  TYPE=RADIO NAME="Personal_Sex" VALUE="Female">Female&lt;/TD>
                            &lt;/TR>&lt;TR>
                                &lt;TD ALIGN="right">&lt;EM>ID Number&lt;/EM>&lt;/TD>
                                &lt;TD>&lt;INPUT  TYPE=TEXT NAME="Personal_IDNumber" SIZE=16 MAXLENGTH=16>&lt;/TD>
                            &lt;/TR>
                        &lt;/TABLE>

                    &lt;LI>&lt;P>Choose one of the following options:&lt;/P>
                        &lt;P>&lt;INPUT  TYPE=RADIO NAME="watch" VALUE="Dunno" CHECKED> I don't know?!
                            &lt;BR>&lt;INPUT  TYPE=RADIO NAME="watch" VALUE="Radio"> Radio
                            &lt;BR>&lt;INPUT class="form-check" TYPE=RADIO NAME="watch" VALUE="TV">TV
                            &lt;BR>&lt;INPUT class="form-check" TYPE=RADIO NAME="watch" VALUE="Film">Film
                            &lt;BR>&lt;BR>
                        &lt;/P>

                    &lt;LI>&lt;P>Choose one of the following options:&lt;/P>
                        &lt;P>&lt;SELECT NAME="holiday">
                                &lt;OPTION value="Greece" SELECTED>Greece &lt;OPTION value="Italy">Italy
                                &lt;OPTION value="France">France &lt;OPTION value="Spain">Spain
                            &lt;/SELECT>
                            &lt;BR>
                        &lt;/P>
                    &lt;LI>&lt;P>How would you rate your knowledge of JavaScript?&lt;/P>
                        &lt;P>
                            &lt;INPUT TYPE=RADIO NAME="knowledge" VALUE="1" onClick="alert('Time for some SERIOUS learning');">1&lt;br>
                            &lt;INPUT class="form-check" TYPE=RADIO NAME="knowledge" VALUE="2" onClick="alert('I hope you\'re yearning for some learning');">2&lt;br>
                            &lt;INPUT TYPE=RADIO NAME="knowledge" VALUE="3" CHECKED>3&lt;br>
                            &lt;INPUT TYPE=RADIO NAME="knowledge" VALUE="4">4&lt;br>
                            &lt;INPUT TYPE=RADIO NAME="knowledge" VALUE="5">5&lt;br>
                            &lt;BR>&lt;/P>
                &lt;/OL>
                &lt;p />
                &lt;textarea name="chat" rows=5 cols=40>&lt;/textarea>&lt;p />
                &lt;INPUT  TYPE=button class="btn-block btn" VALUE="Don't Push Me" name="push" onClick="alert('HOW RUDE!!!!\nI asked you NOT to push me');">
                &lt;button class="btn btn-outline-success btn-block" TYPE=SUBMIT VALUE="Submit Form">Submit&lt;/button>
                &lt;button class="btn btn-outline-secondary btn-block" TYPE=RESET VALUE="Reset Form" onClick="return confirm('Are you sure?');">Reset&lt;/button>

            &lt;/FORM>
                    </code> </pre>
            and the ajax part:
                <pre ><code class="javascript" style="height: 400px;overflow: scroll">$("#form").submit(function (event) {
        event.preventDefault();
        checkSubmit();
    });
                        .......
                        // Investigating a Form
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


    for ( var i=0; i&lt;q.holiday.options.length; i++)
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
    if(age.length==0||age.search(/\D/) !=-1||age&lt;0||age>150){
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
    for ( var i =0 ; i &lt; q.length; i++) {
        if (noValue(q.elements[i].value)) {
            qc.value += "No value: "+ q.elements[i].name + "\n";
        }
    }

}// checkText
                    </code> </pre>
            and the server side, dump.php:
                <pre><code class="php">
&lt;?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-9
 * Time: 下午10:32
 */
header("Content-type: text/plain");
foreach ($_GET as $key=>$val){
    echo "$key: $val\n\n";
}
                    </code> </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="script" tabindex="-1" role="dialog" aria-labelledby="3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Source: popup.html</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre><code class="javascript">$(function () {
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
        $("#objectAddPoint").html($("#objectAddPoint").html()+"&lt;tr>" +
            "&lt;td>" +
            anObject[f].destination +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].duration +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].cost +
            "&lt;/td>" +
            "&lt;td>" +
            anObject[f].agent +
            "&lt;/td>" +
            "&lt;/tr>");
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


    for ( var i=0; i&lt;q.holiday.options.length; i++)
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
    if(age.length==0||age.search(/\D/) !=-1||age&lt;0||age>150){
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
    for ( var i =0 ; i &lt; q.length; i++) {
        if (noValue(q.elements[i].value)) {
            qc.value += "No value: "+ q.elements[i].name + "\n";
        }
    }

}// checkText
                    </code> </pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>