<?php
include_once "../../core/util.php";
$redirect=htmlspecialchars("/homework/w8/index.php");
if (!isset($_COOKIE["token"])){
    redirect("/account/login.php?redirect=" . $redirect);
    exit(0);
}
$info=get_info($_COOKIE["token"]);
if(!$info){
    redirect("/account/login.php?redirect=" . $redirect);
    exit(0);
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Week 8-Homework</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/resources/icon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
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

<h1 class="text-center text-danger m-5">
    Homework of Week 8
</h1>
<hr>
<div class="container">
    <div class="row m-2">
        <div class="col-12">
            <h3 class="text-center text-dark">
                Part 1&3:The Cookbook
            </h3>
        </div>
        <div class="col">
            <p>
                Please refer to <a href="recipe.xml">my recipe page</a>.
            </p>
        </div>
    </div>
    <hr>
    <div class="row m-2">
        <div class="col-12">
            <h3 class="text-dark text-center">
                Part 2:The XML Schema
            </h3>
        </div>
        <div class="col">
            Full code is provided below:<br>
            <pre>
                <code class="xml hljs">&lt;?xml version="1.0" encoding="UTF-8" ?>
&lt;xs:schema
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    targetNamespace="http://162.105.146.180:8047/homework/w8/"
    xmlns="http://www.w3.org/2007/XMLSchema-versioning"
    elementFormDefault="qualified">
    &lt;xs:element name="cookbook">
        &lt;xs:complexType>
            &lt;xs:sequence>
                &lt;xs:element name="recipe" maxOccurs="unbounded">
                    &lt;xs:complexType>
                        &lt;xs:sequence>
                            &lt;xs:element name="name"
                                        type="xs:string"
                                        minOccurs="1"
                                        maxOccurs="1"/>
                            &lt;xs:element name="ingredients">
                                &lt;xs:complexType>
                                    &lt;xs:sequence>
                                        &lt;xs:element name="name"
                                                    type="xs:string"
                                                    minOccurs="1"
                                                    maxOccurs="1"/>
                                        &lt;xs:element name="amount"
                                                    type="xs:integer"
                                                    minOccurs="1"
                                                    maxOccurs="1"/>
                                        &lt;xs:element name="unit"
                                                    type="xs:string"
                                                    minOccurs="1"
                                                    maxOccurs="1"/>
                                    &lt;/xs:sequence>
                                &lt;/xs:complexType>
                            &lt;/xs:element>
                            &lt;xs:element name="steps">
                                &lt;xs:complexType>
                                    &lt;xs:sequence>
                                        &lt;xs:element name="step" maxOccurs="unbounded">
                                            &lt;xs:complexType>
                                                &lt;xs:sequence>
                                                    &lt;xs:element name="description"
                                                                type="xs:string"
                                                                minOccurs="1"
                                                                maxOccurs="1"/>
                                                &lt;/xs:sequence>
                                            &lt;/xs:complexType>
                                        &lt;/xs:element>
                                    &lt;/xs:sequence>
                                &lt;/xs:complexType>
                            &lt;/xs:element>
                            &lt;xs:element name="notice-number"
                                        type="xs:integer"
                                        minOccurs="1"
                                        maxOccurs="1"/>
                            &lt;xs:sequence>
                                &lt;xs:element name="notice"
                                            maxOccurs="unbounded">
                                    &lt;xs:complexType>
                                        &lt;xs:sequence>
                                            &lt;xs:element name="content"
                                                        type="xs:string"
                                                        minOccurs="1"
                                                        maxOccurs="1"/>
                                        &lt;/xs:sequence>
                                    &lt;/xs:complexType>
                                &lt;/xs:element>
                            &lt;/xs:sequence>
                        &lt;/xs:sequence>
                    &lt;/xs:complexType>
                &lt;/xs:element>
            &lt;/xs:sequence>
        &lt;/xs:complexType>
    &lt;/xs:element>
&lt;/xs:schema>
                </code>
            </pre>
        </div>
    </div>
</div>
<hr>
<div class="alert alert-danger mt-4 text-center">
    This is the end of the homework
</div>
<script>hljs.initHighlightingOnLoad();</script>
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