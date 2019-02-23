<?php
include_once "../core/auth.php";
include_once "../core/util.php";

$phone_login=htmlspecialchars("/account/phone_login.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["redirect"]))
        $redirect = $_GET["redirect"];
    else
        $redirect = "/";
    print_content(false, $redirect);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || !isset($_POST["password"]) || !isset($_POST["redirect"]))
        dieout(400);
    $name = $_POST["name"];
    $password = $_POST["password"];
    if (isset($_POST["remember"]))
        $remember = true;
    else
        $remember = false;
    $redirect = $_POST["redirect"];
    $res = check_passwd($name, $password);
    if (!$res)
        print_content(true, $redirect);
    else {
        if ($remember)
            setcookie("token", $res,time()+86400*7,"/","162.105.146.180");
        else
            setcookie("token", $res,0,"/","162.105.146.180");
        redirect($redirect);
    }
} else
    dieout(405);
if (isset($_COOKIE["token"])&&check_token($_COOKIE["token"]))
    redirect($redirect);

function print_content($flag, $redirect)
{
    global $phone_login;
    $_redirect=htmlspecialchars($redirect);
    echo <<<ECO
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
ECO;
    echo <<<ECO
    <div class="container" style="height: 100%">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 col-auto align-self-center">
                <div class="card">
                    <div class="card-header">
                        Please log in to continue.
                    </div>
                    <div class="card-body">
                        <p>
                        <a href="verify_phone.php?foward=$phone_login&redirect=$redirect" class="btn btn-outline-dark btn-block" data-toggle="tooltip" data-placement="top" title="You must have an account, login via contact does not provide an account">Login via phone/email</a> <br>
</p>
                        <form action="login.php" method="post">
                        <input  type="hidden" name="redirect" value="$redirect">
                            User Name
                            <input class="form-control" type="text" name="name"><br>
                            <hr>
                            Password
                            <input class="form-control
ECO;
    if($flag)
        echo " is-invalid";
echo <<<ECO

" type="password" name="password">  
ECO;
    if($flag)
        echo "<div class=\"invalid-feedback\">Incorrect name or password</div>";
echo <<<ECO
Forgot?
    <hr>
                            <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="remember" value="1">
      Remember me
    </label>
                            
                            <hr>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                    </form>
                    </div>
                    <div class="card-footer">
                    <p>
                    Don't have an account? <a class="btn btn-outline-success btn-block" href="/account/sign_up.php?redirect=$_redirect">Sign up</a>
</p>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
ECO;
}
