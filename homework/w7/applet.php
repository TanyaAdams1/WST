<?php
include_once "../../core/util.php";
$redirect=htmlspecialchars("/homework/w7/index.php");
if (!isset($_COOKIE["token"]))
    $info = false;
else
    $info = get_info($_COOKIE["token"])
?>
<!doctype html>
<html lang="en">
<head>
    <title>Week 7-Applets</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/resources/icon.png"/>
    <!-- Bootstrap CSS -->
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
            <li class="nav-item">
                <a class="nav-link" href="/" target="_self">Home Page</a>
            </li>
        </ul>
    </div>
    <?php
    if (!$info):
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
        <a class="btn btn-outline-light text-light"
           href="/account/logout.php?redirect=<?php echo $redirect ?>">Logout</a>
        <?php
    endif;
    ?>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">
                Part 2:Green Circle and Red Rectangle
            </h3>
        </div>
        <div class="col">
            <applet code="drawShape.class" codebase="w7-java/bin/production/w7-java" width="500" height="500"></applet>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">
                Part 3:Shape according to input
            </h3>
        </div>
        <div class="col">
            <applet code="canvasApplet.class" codebase="w7-java/bin/production/w7-java" width="500" height="500">
                <div class="alert alert-info">It seems that your browser does not support applets.</div>
            </applet>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">
                Additional: A rectangle moving with your mouse
            </h3>
        </div>
        <div class="col">
            <applet code="MouseTracker.class" codebase="w7-java/bin/production/w7-java" width="500" height="500"></applet>
        </div>
        <div class="col">
            <p>Put your mouse down, and the shape will be marked on the canvas.</p>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>