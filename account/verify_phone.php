<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-26
 * Time: 下午1:26
 */
include_once "../core/auth.php";
include_once "../core/util.php";
if(!isset($_GET["redirect"]))
    $redirect="/";
else
    $redirect=$_GET["redirect"];
if (isset($_COOKIE["token"])&&check_token($_COOKIE["token"])){
    redirect($redirect);
    exit(0);
}
if(!isset($_COOKIE["session_id"])){
    $res=session_csrf();
    setcookie("session_id",$res["session_id"],0,"","162.105.146.180");
    $csrf=$res["csrf"];
}
else{
    $csrf=getcsrf($_COOKIE["session_id"]);
}
if(isset($_GET["foward"])){
    $foward=$_GET["foward"];
}
else{
    $foward="/";
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Phone/E-mail verification</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/resources/icon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>


</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    Please verify phone/email to continue
                </div>
                <div class="card-body">

                        <input class="form-control" value="+86" id="country_code" />
                        <input class="form-control <?php if (isset($_GET["invalid"])): ?> is-invalid <?php endif;?>" placeholder="phone number" id="phone_number" />
                        <?php
                        if (isset($_GET["invalid"])):
                        ?>
                        <div class="invalid-feedback">Invalid contact</div>
                        <?php
                        endif;
                        ?>
                        <button class="btn btn-primary " onclick="smsLogin();">Login via SMS</button>
                        <div>OR</div>
                        <input class="form-control <?php if (isset($_GET["invalid"])): ?> is-invalid <?php endif;?>" placeholder="email" id="email"/>
                        <?php
                        if (isset($_GET["invalid"])):
                            ?>
                            <div class="invalid-feedback">Invalid contact</div>
                            <?php
                        endif;
                        ?>
                        <button class="btn btn-primary" onclick="emailLogin();">Login via Email</button>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo $foward?>" method="post" id="final">
    <input name="csrf" type="hidden" id="csrf">
    <input name="code" type="hidden" id="code">
    <input name="redirect" type="hidden" value="<?php echo $redirect?>">
</form>
<!-- Optional JavaScript -->


<script>
    // initialize Account Kit with CSRF protection
    AccountKit_OnInteractive = function(){
        AccountKit.init(
            {
                appId:"162540087672331",
                state:"<?php echo $csrf?>",
                version:"v2.10",
                fbAppEventsEnabled:true,
                debug:true
            }
        );
    };

    // login callback
    function loginCallback(response) {
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            var code = response.code;
            var csrf = response.state;
            $("#code").val(code);
            $("#csrf").val(csrf);
            $("#final").submit();
            // Send code to server to exchange for access token
        }
        else if (response.status === "NOT_AUTHENTICATED") {
            // handle authentication failure
        }
        else if (response.status === "BAD_PARAMS") {
            // handle bad parameters
        }
    }

    // phone form submission handler
    function smsLogin() {
        var countryCode = document.getElementById("country_code").value;
        var phoneNumber = document.getElementById("phone_number").value;
        AccountKit.login(
            'PHONE',
            {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
            loginCallback
        );
    }


    // email form submission handler
    function emailLogin() {
        var emailAddress = document.getElementById("email").value;
        AccountKit.login(
            'EMAIL',
            {emailAddress: emailAddress},
            loginCallback
        );
    }



</script>


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