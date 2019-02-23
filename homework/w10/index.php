<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-12-10
 * Time: 下午6:24
 */
include_once "../../core/util.php";
$redirect=htmlspecialchars("/homework/w10");
$info=get_info($_COOKIE["token"]);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Week 10-Homework</title>
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
    Homework of Week 10
</h1>
<hr>
<div class="container">
    <div class="row m-2">
        <div class="col">
            <p>
                I've mainly used Java to realize the MVC, injection-dependent web application. I've used Apache Struts as the MVC framework, Spring as the bean manager and it realized the IoC and AOP programming. AOP is not so obvious in my code, since I do not have many transactions to manage, however, I used AOP to manage the transactions of databases. I use Hibernate as the ORM(Object-Relational Mapping) manager, and I use c3p0 as the database connection pool.<br><br>
                REST, as is mentioned in the course video, is in some aspect incompatible with the traditional MVC framework, and this is quite the case for the traditional Struts framework, since it is operated based on actions, so the URI will contain verbal terms. Moreover, the default setting of actions cannot handle the DELETE and PUT request. Struts 2 and Spring both do have REST plugin, however, alter my code to adapt the REST plugin is quite a big project, and I have not managed to do so. Maybe I'll realize the RESTful design.<br><br>
                It's easier to realise REST under Play, since you only need to declare the DELETE and PUT request in the routes file, however, Play is not the most famous framework for some reason. In addition, the latest version of play fails to operate on this server due to the failure of downloading the necessary sbt components. So I did not use Play as my framework.<br>
            </p>
        </div>
    </div>
    <hr>
    <div class="row m-2">
        <div class="col">
            <div class="text-center text-info">
                UPD1: The server is now set up properly on port 9547, the reverse proxy is on port 8547, you may <a href="http://162.105.146.180:8547">click here</a> to view the server.<br>
                UPD2: I've written an interface for token validation on port 8047, login service is therefore available under the tomcat server via a server-to-server(self-to-self) call. Login is required for taking the survey.
            </div>
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