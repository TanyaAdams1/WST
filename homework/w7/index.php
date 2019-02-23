<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-14
 * Time: 上午9:11
 */
include_once "../../core/util.php";
$redirect = htmlspecialchars("/homework/w7/index.php");
if (!isset($_COOKIE["token"]) || !check_token($_COOKIE["token"])) {
    redirect("/account/login.php?redirect=" . $redirect);
    exit(0);
}
$info = get_info($_COOKIE["token"]);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Week 7-Homework</title>
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

<h1 class="text-center text-danger mt-5">Homework for Week 7</h1>
<div class="container">
    <hr>

    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Warning</h4>
        As from Chrome version 45 and Firefox version 52, supports for NPAPI plugins, which is necessary for java
        applets to
        operate, has been ended. Additionally, Edge does not support java applet from the beginning.
        <br>
        Therefore, it is <strong>IMPOSSIBLE</strong> to view applets with most popular browsers. However, the empty response of the browser, as you may see from below, is still included in this website.
        <hr>
        Refer to <a class="alert-link"
                    href="https://support.mozilla.org/en-US/kb/npapi-plugins?as=u&utm_source=inproduct">this article</a>
        for more information.
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h3 class="text-dark text-center">
                Part 1:snapshots of different browsers
            </h3>
        </div>
        <div class="col-12">
            <div id="screenshot" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#screenshot" data-slide-to="0" class="active"></li>
                    <li data-target="#screenshot" data-slide-to="1"></li>
                    <li data-target="#screenshot" data-slide-to="2"></li>

                    <li data-target="#screenshot" data-slide-to="3"></li>
                    <li data-target="#screenshot" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="applet_chrome.png" alt="Chrome">
                        <div class="d-none d-md-block carousel-caption text-info">
                            <h3 class="text-center">Chrome</h3>
                            <p>An error is displayed</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="applet_firefox.png" alt="Firefox">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <h3 class="text-center">Firefox</h3>
                            <p>Nothing</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="applet_IE.jpg" alt="IE">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <h3 class="text-center">Internet Explorer(version 11)</h3>
                            <p>Operated, with scrolling misbehavior</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="applet_edge.jpg" alt="Edge">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <h3 class="text-center">Edge</h3>
                            <p>Nothing</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="applet_safari.jpg" alt="Edge">
                        <div class="carousel-caption d-none d-md-block text-info">
                            <h3 class="text-center">Safari</h3>
                            <p>The Java plugin in Safari cannot load the class file properly</p>
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
        <div class="col">
        </div>
    </div>
    <hr>
    <div  class="row m-3">
        <div class="col-12">
            <h3 class="text-dark text-center">
                Part 2&3&5: Applets
            </h3>
        </div>
        <p>Please see my <a class="btn btn-link" href="applet.php">applet page</a><br>.</p>
        <hr>
        <?php
        if (strpos($_SERVER["HTTP_USER_AGENT"],"IE")||strpos($_SERVER["HTTP_USER_AGENT"],"rv:11.0")):
        ?>
            <hr>
        <div class="alert alert-danger">
            <div class="alert-heading">
                <h3>Warning</h3>
            </div>
            <p>You're using Internet Explorer. You may experience improper painting behavior while scrolling the page.</p>
            <hr>
            <p>For solution and more information, refer to <a class="alert-link" href="https://support.microsoft.com/en-us/help/214780">this article</a> </p>
        </div>
            <hr>
        <?php
        endif;
        ?>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col-12">
            <h3 class="text-center text-dark">
                Part 4:Compare AWT and Swing
            </h3>
        </div>
        <div class="col">
            AWT is the abbreviation of "Abstract Window Toolkit", it's a layer just above the graphical interfaces of native OS, and is therefore platform-dependent. As AWT uses native OS code, the components created is "recognized" by the OS, and can be dealt directly by the OS. However, this leads to the low level of implementation of AWT, where most of the components should be implemented manually.
        </div>
        <div class="col">
            Swing is one of the classes called "JFC"(Java Fundation Classes). It is a layer higher that AWT. The components in swing are created in pure Java, and is platform-independent. So they're meaningless other that sets of pixels from the poing of view of the OS, and is dealt by the JVM(Java Virtual Machine). Furthermore, swing contains a greater variety of types of components, making it more convenient to build a frame.
        </div>
    </div>
</div>
<hr>
<div class="mt-3 alert alert-danger text-center">This is the end of the homework</div>
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