<?php
error_reporting(0);
include_once "core/util.php";
if ($_SERVER["REQUEST_METHOD"] != "GET")
    dieout(405);
if (!isset($_COOKIE["token"]) && !isset($_GET["token"]) || !check_token($_COOKIE["token"]))
    $flag = false;
elseif (check_token($_COOKIE["token"]) == "None")
    dieout(403);
else {
    $flag = true;
    $info = get_info($_COOKIE["token"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bill Tao's website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="/resources/icon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>


<nav class="navbar navbar-expand navbar-dark sticky-top flex-column flex-md-row bd-navbar"
     style="background-color:#8c0000">
    <a class="navbar-brand" href="http://www.pku.edu.cn" target="_blank">
        <img src="/resources/pkulogo_white.png" alt="PKU"/>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://net.pku.edu.cn/~zt/wst/" target="_blank">Course Home Page<span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://162.105.146.180/Phorum/index.php" target="_blank">Class Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://162.105.146.180/wst/homework/2017/homework.html" target="_blank">Class
                    Homework Page</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href=""
                   aria-haspopup="true" aria-expanded="false">
                    My Homeworks
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/homework/w1/index.html">Week 1</a>
                    <a class="dropdown-item" href="/homework/w2/index.html">Week 2</a>
                    <a class="dropdown-item" href="/homework/w3/index.html">Week 3</a>
                    <a class="dropdown-item" href="/homework/w4/revised.php">Week 4</a>
                    <a class="dropdown-item" href="/homework/w5/index.php">Week 5</a>
                    <a class="dropdown-item" href="/homework/w6/index.php">Week 6</a>
                    <a class="dropdown-item" href="/homework/w7/index.php">Week 7</a>
                    <a class="dropdown-item" href="/homework/w8/index.php">Week 8</a>
                    <a class="dropdown-item" href="/homework/w9/index.php">Week 9</a>
                    <a class="dropdown-item" href="/homework/w10/index.php">Week 10</a>
                </div>
            </li>
        </ul>
    </div>
    <?php
    if (!$flag):
        ?>
        <a class="btn btn-outline-light text-light" href="account/login.php">Login</a>
        <a class="btn btn-outline-light text-light" href="account/sign_up.php">Sign Up</a>
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
        <a class="btn btn-outline-light text-light" href="account/logout.php">Logout</a>
        <?php
    endif;
    ?>
</nav>
<div class="container-fluid" style="background-color:#a0b0c0">
    <div class="row mx-auto">
        <div class="col-md mt-3">
            <div class="alert alert-success">
                <h2 class="text-center">
                    It works!
                </h2>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md mx-auto mt-3">
            <figure class="figure">

                <a href="https://www.facebook.com/profile.php?id=100014841394940" target="_blank">
                    <img src="/resources/photo.jpg" width="300"/>
                </a>
                <figcaption class="figure-caption">
                    <p>
                        Feel free to visit my <a target="_blank" href="https://www.facebook.com"> Facebook </a> homepage
                        by clicking on the photo.
                    </p>
                </figcaption>
            </figure>
        </div>
    </div>
    <hr/>
    <div class="row text-center">
        <div class="clo-md mx-auto mt-5">
            <div class="text-center">
                <p>
                    <small>Bill Tao<br/>
                        Phorum ID: TaoYu370<br/>
                        Student ID:1600011370<br/>
                        Mail:<a href="mailto:billtao@pku.edu.cn?subject=feedback">billtao@pku.edu.cn</a><br/>
                        Powered by Bootstrap, Liscenced in MIT Liscence.
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<!-- Template ends -->
</body>
</html>
