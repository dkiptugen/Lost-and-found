<?php
function __autoload($class_name)
     {
        include_once '../../CONFIGURATIONS/classes/class.' . $class_name . '.inc.php';
        #var_dump($class_name);
     }
session_start();
$msg="";
$users=new users;
$DB= new DB;
#validate::test_input("ghh");
$con=$DB->db_connect();
$security=new security;
if((isset($_REQUEST["id"]))&&($_REQUEST["id"]=="logout")&&($_REQUEST["auth"]==$_SESSION["un_id"]))
   {
   	security::logout();
   }
   
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
        <h3>LOST AND FOUND</h3>
      </a>
    </div>

    <p class="navbar-text navbar-right">Welcome: <a href="#" class="navbar-link"><?php echo strtoupper($_SESSION["emp_name"]); ?></a>&nbsp;&nbsp; <a href="index.php?id=logout&&auth=<?php echo $_SESSION["un_id"]; ?>" class="navbar-link">LOG OUT</a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
  </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USER MANAGEMENT <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?id=add_users&&auth=<?php echo $_SESSION["un_id"]; ?>">ADD USER</a></li>
            <li><a href="index.php?id=view-users&&auth=<?php echo $_SESSION["un_id"]; ?>">VIEW USERS</a></li>
          </ul>
        </li>

        <li><a href="index.php?id=password_mgt&&auth=<?php echo $_SESSION["un_id"]; ?>">PASSWORD MANAGEMENT</a></li>
        <!--li><a href="#">Link</a></li-->
        </ul>
</nav>
<div class="container">
<?php
if(isset($_REQUEST["id"])&& $_REQUEST["auth"]==$_SESSION["un_id"])
  {
    echo 
        '<div class="panel panel-default">
         <div class="panel-body">';
    include("../../INCLUDES/admin.php");
    if($_REQUEST["id"]=="add_users")
      {
        add_user($con,$msg,$security);
      }
    if($_REQUEST["id"]=="view-users")
      {
        view_user($con);
      }
    if($_REQUEST["id"]=="password_mgt")
       {
         pass_mgt($con);
       }
    echo  "</div><div>";
  }

  ?>
</div>

</body>
</html>