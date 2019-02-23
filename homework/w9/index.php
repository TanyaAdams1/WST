<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-12-3
 * Time: 下午11:28
 */
include_once "../../core/util.php";
$redirect=htmlspecialchars("/homework/w9/index.php");
if(!isset($_COOKIE["token"])||!get_info($_COOKIE["token"])){
    redirect("/account/login.php?redirect=".$redirect);
    exit(0);
}
$info=get_info($_COOKIE["token"]);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Week 9-Homework</title>
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
<h1 class="text-danger text-center m-5">
    Homework of Week 9
</h1>
<hr>
<div class="container">
    <div class="row m-5">
        <div class="col justify-content-center">
            <div class="alert alert-danger">
                <div class="alert-heading">
                    <h2>Error</h2>
                </div>
                The host name of this server(available in both /ect/hostname and $HOSTNAME is wst. However, wst does not appear in the /etc/hosts file. It is causing java to throw a java.net.UnknownHostException, all complex web applications based on java with frameworks could not start properly. However, I still managed to set up Apache Tomcat&reg; on port 9047 and Apache reverse proxy on port 8547. You may have fun with the examples or documentation of Tomcat, but my application(deployed under survey/) will not be able to operate or debug until the host is settled.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">
                Description of my code
            </h3>
        </div>
        <div class="col">
            <p>I'm using one of the most famous frameworks to build my application, namely, SSH(Apache Struts 2+Spring+Hibernate).<br>
            Struts is used as the MVC framework, providing excellent routing and action dealing service.<br>
            Spring is a manager of beans, realizing IoC(Inverse of control, also known as Dependent on Injection).<br>
            Hibernate is to build an object-oriented data model.<br>
            Since the primitive table in the database I created for recording accounts is not compatible with the object-oriented scheme, login and sign-up services is not available under the tomcat server.<br>
            To visit the server, <a href="//162.105.146.180:8547">click this link</a>. </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                I'm puttiong the screenshots of the app running on my computer below.
            </div>
        </div>
        <div class="col justify-content-center">
            <div id="screenshot" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#screenshot" data-slide-to="0" class="active"></li>
                    <li data-target="#screenshot" data-slide-to="1"></li>
                    <li data-target="#screenshot" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="p3.png" alt="1">
                        <div class="d-none d-md-block carousel-caption text-info">
                            <p>The form</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="p1.png" alt="2">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <p>The thank-you page</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="p2.png" alt="3">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <p>The result</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#screenshot" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#screenshot" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="alert alert-danger mt-3 mb-3 text-center">
    This is the end of the homework
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
