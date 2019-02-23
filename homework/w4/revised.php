<?php
include_once "../../core/util.php";
if(!isset($_COOKIE["token"]))
    $info=false;
else
    $info=get_info($_COOKIE["token"]);
$_redir=htmlspecialchars("/homework/w4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Week 4-Homework</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="alert alert-info">
    This is a revised version of homework of week 4, since a bug is found in the original version, making the query part of it unable to function correctly. You may also want to view the <a class="alert-link" href="index.php">original version</a>.
</div>
<div class="container">
    <div class="row">
        <div class="col-md ">
            <h1 class="text-center text-danger">This is part 1</h1>
            <div class="row">
                <div class="col-4">
                    Question 1: Who will go to the party held in Peking University?<br>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#answer1" aria-expanded="false" aria-controls="answer1">
                        Answer
                    </button>
                    <p>
                    <div class="collapse" id="answer1">
                        <div class="card card-body">
                            SELECT guest_Name<br>
                            FROM guest,party,guest_party<br>
                            WHERE party.Party_Num=guest_party.Party_Num<br>
                            AND guest_party.Guest_Num=guest.Guest_Num<br>
                            AND party.Place='Peking University';<br>
                        </div>
                    </div>
                    </p>
                </div>
                <div class="col-4">
                    Question 2: Figure out a way to obtain the column labels returned by mysql_fetch_array.<br>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#answer2" aria-expanded="false" aria-controls="answer2">
                        Answer
                    </button>
                    <p>
                    <div class="collapse" id="answer2">
                        <div class="card card-body">
                            //$row=mysql_fetch_array($result);<br>
                            $p=0;<br>
                            foreach($row as $key => $value){<br>
                            if(!isint($key)){//$key is a tag<br>
                            echo "tag for row $p is $key";<br>
                            p+=1;<br>
                            }<br>
                            };
                        </div>
                    </div>
                    </p>

                </div>
                <div class="col-4">
                    Question:Tell the difference between a CGI program and a PHP program executed by a Web Server.<br> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#answer3" aria-expanded="false" aria-controls="answer3">
                        Answer
                    </button>
                    <p>
                    <div class="collapse" id="answer3">
                        <div class="card card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>PHP</th>
                                    <th>CGI</th>
                                </tr>
                                <tr>
                                    <td>
                                        Placed arbitrarily.
                                    </td>
                                    <td>
                                        Placed in the cgi-bin directory.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Can be mixed with HTML code freely.
                                    </td>
                                    <td>
                                        Can only be stand-alone.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Printing the error message containing error info and line number directly, making it easy to debug.
                                    </td>
                                    <td>
                                        Printing processed message(e.g. 500 Internal Error), inconvenient for debugging.
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <p>
            <h1 class="text-center text-danger">
                This is part 2
            </h1>
            As you may find by submitting the form in part 3, PHP has been set up properly.
            </p>
        </div>
    </div>
    <hr>
    <div class="row justify-content-between">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-danger">
                        This is part 3
                </div>
                </h1></div>
            <?php
            if ($info):
            ?>
            <div class="row">
                <div class="col-4">
                    <div class="alert alert-success">
                        Welcome back, <?php echo $info["name"];?>!
                    </div>
                    May I require your Excellency to fill in the query beside?
                    <hr>

                    Or, you may want to
                    <form action="/homework/w4/query.php" method="post">
                        <input type="hidden" name="method" value="view">
                        <button class="btn btn-outline-dark" type="submit">view the result</button>
                    </form>
                    directly.

                </div>

                <div class="col-7">

                    <div class="container-fluid card">
                        <div class="alert alert-danger alert-dismissible _alert" id="fail" style="display: none"></div>
                        <div class="card-header">A Query</div>
                        <form class="card card-body" action="/homework/w4/query.php" method="post" id="form">
                            <input type="hidden" name="method" value="add">
                            <fieldset class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control required" id="Name" placeholder="<?php echo $info["name"]?>" value="<?php echo $info["name"]?>" readonly>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="Age">Age</label>
                                <input type="number" name="age" class="form-control required" id="Age" placeholder="45">
                            </fieldset>
                            <div class="">
                                Gender
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="Radio1" value="Male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="Radio2" value="Female">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="Radio3" value="Otherwise">
                                        Otherwise
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Mail">E-mail:</label>
                                <input type="email" name="mail" class="form-control required" id="Mail" placeholder="jack@example.com">
                            </div>
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                            <button type="reset" class="btn btn-warning" id="reset">Reset</button>
                        </form>
                    </div>
                    <?php
                    else:
                        ?>
                        Please <a class="btn btn-outline-danger" href="/account/login.php?redirect=<?php echo $_redir?>">Log in</a> to view the part.
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <p>
            <h1 class="text-center text-danger font-weight-bold">
                This is the end of the homework.
            </h1>
            You may want to go back to <a href="/">Home page</a>.
            </p>
        </div>
    </div>
</div>
<div id="scripts">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="/homework/w4/query.js"></script>
</div>
</body>
</html>
