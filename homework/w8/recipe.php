<?php
$redirect=htmlspecialchars("/");
include_once "../../core/util.php";
$info=get_info($_COOKIE["token"]);
?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html lang="en">
        <head>
            <title>Cookbook</title>
            <!-- Required meta tags -->
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
            <link rel="icon" href="/resources/icon.png"/>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
                  integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"/>
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
            A Cookbook
        </h1>
<hr />
        <div class="container">
            <xsl:for-each select="cookbook/recipe">
                <div class="row m-3">
                    <div class="col-12">
                        <h3 class="text-center text-dark">
                            <xsl:value-of select="name"/>
                        </h3>
                    </div>
                    <div class="col">
                        <h5>
                            Ingredients
                        </h5>
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Unit</th>
                            </tr>
                            <xsl:for-each select="ingredient">
                                <tr>
                                    <td>
                                        <xsl:value-of select="name"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="amount"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="unit"/>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </table>
                    </div>
                    <div class="m-5"></div>
                    <div class="col">
                        <h5>
                            Steps
                        </h5>
                        <ol class="list-group">
                            <xsl:for-each select="steps/step">
                                <li class="list-group-item list-group-item-action">
                                    <xsl:value-of select="description"/>
                                </li>
                            </xsl:for-each>
                        </ol>
                    </div>
                </div>
                <hr/>
                <xsl:if test="notice-number &gt; 0">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <div class="alert-heading">
                                <h4>
                                    Notice
                                </h4>
                            </div>
                            <hr/>
                            <ul>
                                <xsl:for-each select="notice">
                                    <li>
                                        <xsl:value-of select="content"/>
                                    </li>
                                </xsl:for-each>
                            </ul>
                        </div>
                    </div>
                </xsl:if>
            </xsl:for-each>
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
    </xsl:template>

</xsl:stylesheet>