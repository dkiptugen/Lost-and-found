<?php
function __autoload($class_name)
     {
        include_once '../../CONFIGURATIONS/classes/class.' . $class_name . '.inc.php';
     }
session_start();
$msg="";
$users=new users;
if((isset($_REQUEST["id"]))&&($_REQUEST["id"]=="logout")&&($_REQUEST["auth"]==$_SESSION["un_id"]))
   {
   	security::logout();
   }
 $DB=new DB;
 $con=$DB->db_connect();  
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../CSS/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../../CSS/normalize.css">
<script type="text/javascript" src="../../JS/jquery.min.js"></script>
<script type="text/javascript" src="../../JS/bootstrap.min.js"></script>
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

    <p class="navbar-text navbar-right">Welcome: <a href="#" class="navbar-link"><?php echo strtoupper($_SESSION["emp_name"]); ?></a>
    &nbsp;&nbsp; <a href="index.php?id=logout&&auth=<?php echo $_SESSION["un_id"]; ?>" class="navbar-link">LOG OUT</a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
  </div>
  
  <ul class="nav navbar-nav">
        <li><a href="index.php?id=found_itm&&auth=<?php echo $_SESSION["un_id"]; ?>">FOUND ITEMS</a></li>
        <li><a href="index.php?id=view_itm&&auth=<?php echo $_SESSION["un_id"]; ?>">VIEW ITEMS</a></li>
        </ul>
</nav>
<div class="container">
<?php
if(isset($_REQUEST["id"])&&$_REQUEST["auth"]=$_SESSION["un_id"])
   {
   	echo '<div class="panel panel-default"><div class="panel-body">';
   	include("../../INCLUDES/clerk.php");
    if($_REQUEST["id"]=="found_itm")
       {
       	 found_itm($con);
       }
    if($_REQUEST["id"]=="view_itm")
       {
       	 view_itm($con);
       } 
    echo "</div></div>";
   }
 $DB->db_close($con);
?>
</div>
</body>
</html>