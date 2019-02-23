<?php
error_reporting(0);
include_once "../core/util.php";
    if($_SERVER["REQUEST_METHOD"]!="GET")
        dieout(405);
    if(isset($_GET["redirect"]))
        $redirect=$_GET["redirect"];
    else
        $redirect="/";
    if (isset($_COOKIE["token"])&&check_token($_COOKIE["token"]))
        redirect("/");
    if(!isset($_COOKIE["session_id"])){
        $res=session_csrf();
        setcookie("session_id",$res["session_id"],0,"","162.105.146.180");
        $csrf=$res["csrf"];
    }
    else{
        $csrf=getcsrf($_COOKIE["session_id"]);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Sign Up-Bill Tao's Website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"/>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src='https://www.google.com/recaptcha/api.js' onload="reCAPTCHA=true;return true;"></script>

      <script>

      var valid_name=false;
      var valid_password=false;
      var contact_verified=false;
      var csrf= "<?php
      echo $csrf;
      ?>";
          AccountKit_OnInteractive = function(){
              AccountKit.init(
                  {
                      appId:"162540087672331",
                      state:csrf,
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
              contact_verified=true;
              $("#phone").prop("disabled",true);
              $("#email").prop("disabled",true);
              valid();
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
          AccountKit.login(
              'PHONE',
              {countryCode: "+86", phoneNumber:"0" }, // will use default values if not specified
              loginCallback
          );
      }


      // email form submission handler
      function emailLogin() {
          AccountKit.login(
              'EMAIL',
              {emailAddress: ""},
              loginCallback
          );
      }
      function onRECAPTCHA() {
          valid();
          if(valid_name&&valid_password&&reCAPTCHA)
              $("#form").submit();
      }
      function checkname(name) {
          $.ajax({
              url:"/account/create_account.php",
              dataType:"json",
              data:{
                  "type":"query",
                  "name":name
              },
              method:"POST"
          }).done(function (data) {
              if(data.code==0){
                  valid_name=true;
                  $(".alert-name").hide("fast");
                  valid();
              }
              else {
                  valid_name=false;
                  $(".alert-name").show("slow");
                  valid();
              }
          });
      }
      function valid() {
          if(valid_name&&valid_password&&contact_verified&&reCAPTCHA)
              $("#sign_up").prop("disabled",false);
          else
              $("#sign_up").prop("disabled",true);
      }
      $(function () {
          $(".alert-danger").hide();
          valid();
          $(".password").focusout(function (event) {
              if($("#pswd_1").val()!=$("#pswd_2").val()
                  ||$("#pswd_1").val()===""){
                  if($("#pswd_2").val().length!=0)
                      $(".alert-password").show("slow");
                  valid_password=false;
              }
              else {
                  $(".alert-password").hide("fast");
                  valid_password = true;
              }
              valid();
          });
          $("#name_input").focusout(function (event) {
              checkname($("#name_input").val());
          });
          $("#phone").click(function (event) {
              event.preventDefault();
              smsLogin();
          });
          $("#email").click(function (event) {
              event.preventDefault();
              emailLogin();
          });
      });
      </script>

      <!-- HTTPS required. HTTP will give a 403 forbidden response -->
      <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
  </head>
  <body>
    <div class="container" style="height: 100%">

        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-auto align-self-center">
                <div class="card">
                    <div class="card-header text-center">
                        Sign Up Now!
                    </div>
                    <div class="card-body">
                        <form id="form" action="/account/create_account.php" method="post">
                            <input  type="hidden" name="type" value="create">
                            <input type="hidden" name="csrf" id="csrf">
                            <input type="hidden" name="code" id="code">
                            <input type="hidden" name="redirect" value="<?php echo $redirect?>">
                            <div class="alert alert-danger alert-name">The name duplicates</div>
                            User Name
                            <input class="form-control" type="text" name="name" id="name_input"><br>
                            <hr>
                            Password
                            <div class="alert alert-danger alert-password">The 2 passwords should be identical</div>
                            <input class="form-control password" type="password" name="password" placeholder="Password should be uneasy to guess" id="pswd_1">
                            <input class="form-control password" type="password" name="password_repeat" placeholder="Please repeat your Password" id="pswd_2">
    <hr>
                            You're required to privide<br>
                            <button class="btn-primary btn m-2" id="phone">A phone number</button> or <button class="btn btn-primary m-2" id="email">An Email</button><br>
                            <button id="sign_up"
class="g-recaptcha btn btn-outline-success btn-block"
data-sitekey="6Ld1HDYUAAAAAHSAVY8zMXnPI1YTGRv7XNBP3XRl"
data-callback="onRECAPTCHA" disabled onmouseover="valid()">
Sign up
</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>