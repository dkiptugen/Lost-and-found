<?php
session_start();
function __autoload($class_name)
  {
   include_once '../CONFIGURATIONS/classes/class.' . $class_name . '.inc.php';
  }
$msg="";


if(isset($_SESSION["USERTYPE"]))
  {
     users::det_user($_SESSION["USERTYPE"]);
  }
if(isset($_POST["chngpass"]))
  { 
    if($_POST["pass1"]!=$_POST["pass2"])
       {
         $msg="PASSWORD MISSMATCH";
       }
    else
       {
          $chngpass=new chngpass;
          $chngpass->username=$_SESSION["username"];
          $chngpass->password=$_POST["pass1"];
          $chngpass->usertype=$_SESSION["usertype"];
          $chngpass->id=$_SESSION["emp_id"];
          $msg=$chngpass->chngpass();
       }
  }
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../CSS/login.css">
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
<script type="text/javascript" src="../JS/jquery.min.js"></script>
<script type="text/javascript" src="../JS/bootstrap.min.js"></script>
<title>LOST AND FOUND</title>
</head>
<body class="">
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        LOST AND FOUND
      </a>
    </div>
  </div>
</nav>
<div class="col-md-offset-3 col-md-6">
<div class="panel panel-default ">
<div class="panel-heading"><div class="panel-title">LOGIN</div></div>
 <div class="panel-body">

    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" role="form" class="form-horizontal" >
        <center><label class="control-label"><?php echo $msg; ?></label></center>
       <div class="form-group has-feedback">
        <label class="control-label col-sm-4">ENTER PASSWORD</label>
        <div class="col-sm-6">
         <input type="password"  autofocus="autofocus" autocomplete="off" name="pass1" class="form-control input-sm"/>
        </div>
      </div>
      <div class="form-group has-feedback">
       <label class="control-label col-sm-4">CONFIRM PASSWORD</label>
        <div class="col-sm-6">
         <input type="password"  autofocus="autofocus" autocomplete="off" name="pass2" class="form-control input-sm"/>
        </div>
     </div>
     <div class="form-group">
      
        <div class="col-sm-6 col-sm-offset-4">
        <button name="chngpass" class="btn btn-primary btn-block btn-xs">CHANGE PASSWORD</button>
        </div>
      </div>
     </div>
   </form>

</div>
</div>
</div>
</body>
</html>
