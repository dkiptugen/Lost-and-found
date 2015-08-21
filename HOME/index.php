<?php
session_start();
function __autoload($class_name)
     {
        include_once '../CONFIGURATIONS/classes/class.' . $class_name . '.inc.php';
     }

$msg="";
$users=new users;
if(isset($_SESSION["USERTYPE"]))
  {
     $users::det_user($_SESSION["USERTYPE"]);
  }
if(isset($_POST["login"]))
  {
    $login=new login;
    $login->username=$_POST["username"];
    $login->password=$_POST["password"];
    $msg=$login->login();
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

   <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" role="form" class="form form-horizontal">
     <div class="form-group"> <div class="col-md-6 col-md-offset-3"><label class="control-label"><?php echo strtoupper($msg); ?></label></div></div>
   <div class="form-group"><label class="control-label col-md-3" >USERNAME</label><div class="col-md-6"><input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="username"/></div></div>
   <div class="form-group"><label class="control-label col-md-3" >PASSWORD</label><div class="col-md-6"><input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="password"/></div></div>
   <div class="col-md-6 col-md-offset-3"><button class="btn btn-primary btn-block" name="login">LOGIN</button></div>
</form>
</div>
</div>
</div>
</body>
</html>
