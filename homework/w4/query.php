<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-25
 * Time: 下午6:56
 */
include_once "../../core/auth.php";
include_once "../../core/util.php";
error_reporting(0);
global /** @var mysqli $sql */$sql;
function print_content($arg=1){
    global $sql;
    $res=$sql->query("SELECT * FROM query;");
    if(!$res){
        dieout(500);
    }
        echo <<<ECO
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Result</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
ECO;
    if($arg!=0)
        echo <<<ECO
  <div class="alert alert-success">
  Thanks! Your data has been collected correctly.
</div>
ECO;
    echo <<<ECO
<h2 class="text-center text-info">The result of the survey is shown below.</h2>
  <form action="/homework/w4/query.php" method="post" id="form">
    <input type="hidden" name="method" value="delete">
    <div class="container">
        <table class="table table-hover text-left">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>E-mail</th>
                <th>Delete</th>
                
            </tr>
                <!-- insert point-->
ECO;
        $i=0;
        while ($row=$res->fetch_row()){
            $i++;
            for($i=0;$i<4;$i++){
                $row[$i]=htmlspecialchars($row[$i]);
            }
            echo <<<ECO
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>$row[3]</td>
            <td><div class="form-check text-center">
                <input class="form-check-input radio" type="radio" name="name" value="$row[0]"></td>
</tr>
ECO;

        }
        echo <<<ECO
        </table>
      <button type="submit" class="btn btn-danger" id="submit" disabled>Remove selected data</button>
      <button type="reset" class="btn btn-warning" id="reset">Clear selection</button>
    </div>
  </form>
  <hr>
  <p class="text-center text-info font-italic">
  
  Tired of surveys? You may want to go back to <a href="/homework/w4/index.php">previous page</a>.
</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="/homework/w4/delete.js"></script>
    <!-- Template ends -->
  </body>
</html>

ECO;
}
if($sql->errno){
    dieout(500);
}
if(($_POST["method"]!="add"&&$_POST["method"]!="delete"&&$_POST["method"]!="view")){
    dieout(400);
}
if($_POST["method"]=="add"){

if(!isset($_POST)||$_POST==null
    ||$_POST["name"]==null
    ||$_POST["age"]==null||$_POST["age"]<0
    ||$_POST["gender"]==null
    ||$_POST["mail"]==null){

dieout(400);
}
    $name=$sql->escape_string($_POST["name"]);
    $age=$sql->escape_string($_POST["age"]);
    $gender=$sql->escape_string($_POST["gender"]);
    $mail=$sql->escape_string($_POST["mail"]);
    $query="INSERT INTO query VALUES (\"$name\",$age,\"$gender\",\"$mail\");";
    if($sql->query($query)){
        print_content();
    }
    else{
        dieout(500);
    }
}
elseif($_POST["method"]=="delete"){
    if($_POST["name"]==null){
        dieout(400);
    }
    $query="DELETE FROM query WHERE name=\"{$_POST["name"]}\";";
    if(!$sql->query($query)){
        dieout(500);
    }
    else
        print_content();
}
else{
    print_content(0);
}