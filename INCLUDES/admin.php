<?php
function add_user($con,$msg,$security)
  {  
  	if(isset($_POST["reg"])==true)
        { 
        	#echo "CAYDEESOFT";
           if($_POST["enterpassword"]==$_POST["confirmpassword"])
              {  if(isset($_POST["password_status"]))
                    {
                    	$passstat=0;
                    }
                  else 
                    {
                         $passstat=1;      
                    }
                 $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1); 
                 $dbh=$con->prepare("INSERT INTO `userdetails`(`id`, `employee_name`, `email_address`, `tel_no`, `branch`) 
           	                         VALUES (:emp_no,:empname,:email,:telno,:branch)");
                 $x=1;
                 $empno=$security->id_gen(8);
                 $pass=$security->password_hash($_POST["enterpassword"],$_POST["username"]);
                 $dbh->bindParam(":emp_no",$empno);
                 $dbh->bindParam(":empname",$_POST["empname"]);
                 $dbh->bindParam(":email",$_POST["email"]);
                 $dbh->bindParam(":telno",$_POST["telno"]);
                 $dbh->bindParam(":branch",$_POST["branch"]);                   
                 $dbh->execute();
                 $dbh=null;
                 $dbh=$con->prepare("INSERT INTO `users`(`id`, `username`, `password`, `passwordstatus`, `usertype`, `perm`) 
           	                         VALUES (:emp_no,:username,:password,:pass_status,:usertype,:perm)");
                 $dbh->bindParam(":emp_no",$empno);
                 $dbh->bindParam(":username",$_POST["username"]);
                 $dbh->bindParam(":password",$pass);
                 $dbh->bindParam(":pass_status",$passstat);
                 $dbh->bindParam(":usertype",$_POST["usertype"]);
                 $dbh->bindParam(":perm",$x,PDO::PARAM_INT);
                 $check=$dbh->execute();
                 if($check)
                   {
                    $msg="User added successfully";
                   }
               }
            else
               {
               	 $msg="password mismatch";
               }
               
        }
  	 $x='
  	 <form action="index.php?id=add_users&&auth='.$_SESSION["un_id"].'" method="post" role="form" class="form form-horizontal">
  	  <div class="form-group">
       <label class="control-label col-md-6" >EMPLOYEE NAME</label>
       <div class="col-md-6">
        <input type="text" pattern="[a-Z\s-\']*" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="empname"/>
       </div>
      </div>
      <div class="form-group">
       <label class="control-label col-md-6" >EMAIL ADDRESS</label>
       <div class="col-md-6">
        <input type="text" class="form-control" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required="required" autofocus="autofocus" autocomplete="off" name="email"/>
       </div>
      </div>
      <div class="form-group">
       <label class="control-label col-md-6" >TELEPHONE NO</label>
       <div class="col-md-6">
        <input type="text" class="form-control" required="required" pattern="^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$" autofocus="autofocus" autocomplete="off" name="telno"/>
       </div>
      </div>
      <div class="form-group">
       <label class="control-label col-md-6" >BRANCH</label>
       <div class="col-md-6">
        <input type="text" class="form-control" required="required" pattern="[a-Z]*" autofocus="autofocus" autocomplete="off" name="branch"/>
       </div>
      </div>

     ';
     $y='     
     <div class="form-group">
      <label class="control-label col-md-6" >USERNAME</label>
      <div class="col-md-6">
       <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="username"/>
      </div></div>
     <div class="form-group"><label class="control-label col-md-6" >ENTER PASSWORD</label><div class="col-md-6"><input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="enterpassword"/></div></div>
     <div class="form-group"><label class="control-label col-md-6" > CONFIRM PASSWORD</label><div class="col-md-6"><input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="confirmpassword"/></div></div>
     <div class="form-group"><div class="col-sm-offset-6 col-sm-10"><div class="checkbox"><label><input type="checkbox" name="password_status">CHANGE PASSWORD</label></div></div></div>
     <div class="form-group"><label class="control-label col-md-6" >ENTER USERTYPE</label><div class="col-md-6"><select class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="usertype">
      <option value="" selected=selected>please select usertype</option><option value="ADMIN">ADMIN</option> <option value="CLERK">CLERK</option></select>
     </div></div><center class="clearfix" >'.$msg.'</center> 
       ';
     $z='
     <div class="col-md-6 col-md-offset-3"><button class="btn btn-primary btn-block" name="reg">REGISTER</button></div>
     </form>
     ';
     echo "<div class='col-sm-6 col-md-6 col-lg-6 col-xs-6 form form-horizontal'>".$x."</div><div class='col-sm-6  col-md-6 col-lg-6 col-xs-6 form form-horizontal'>".$y."</div><div class='clearfix'></div>";
     echo $z;
  }
function view_user($con)
{ 
  if(isset($_REQUEST["action"]))
    {
      if($_SESSION["emp_id"]!=$_REQUEST["empno"])
        {
          if($_REQUEST["action"]=="deactivate")
            {
              $dbh=$con->query("UPDATE `users` SET `perm`=0 WHERE `id`='".$_REQUEST["empno"]."'");
              $dbh->execute();
            }
         if($_REQUEST["action"]=="activate")
           {
             $dbh=$con->query("UPDATE `users` SET `perm`=1 WHERE `id`='".$_REQUEST["empno"]."'");
             $dbh->execute();
           }
       }
      else
        {
        	echo "YOU CANNOT UPDATE THIS ACCOUNT WHILE ON SESSION";
        }
    }
  $dbh=$con->query("select * from users");
  $dbh->execute();
  if($dbh->rowCount()>0)
	{
	 $x=1;
	  echo "<table class='table table-condensed' style='background:ghostwhite;margin:0; text-align:center;'><tr>
	  	<th>#</th>
 		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>PASSWORDSTATUS</th>
		<th>USERTYPE</th>
		<th>ACCESS</th>
		<th>ACTION</th>
          </tr>";
          $x=1;
     while($ROW=$dbh->fetch(PDO::FETCH_ASSOC))
          {  if($x%2==0)
          	   {
                 $y='active';
          	   }
          	   else
          	   {
          	   	$y='success';
          	   }
          	 if($ROW["passwordstatus"]==1)
          	   {
          	   	$pass_stat="OKAY";
          	   }
          	 else
          	   {
          	   	$pass_stat="CHANGE";
          	   }
          	 if($ROW["perm"]==1)
          	   {
          	   	$perm="GRANTED";
          	   }
          	 else
          	   {
          	   	$perm="DENIED";
          	   }
            echo"<tr class='".$y."'>
            <td>".$x."</td>
            <td>".$ROW["username"]."</td>
            <td>".$ROW["password"]."</td>
            <td>".$pass_stat."</td>
            <td>".$ROW["usertype"]."</td>
            <td>".$perm."</td>
            <td>
            <a href='index.php?id=view-users&&auth=".$_SESSION['un_id']."&&action=activate&&empno=".$ROW['id']."'>ACTIVATE</a>
            <a href='index.php?id=view-users&&auth=".$_SESSION['un_id']."&&action=deactivate&&empno=".$ROW['id']."'>DEACTIVATE</a>
            </td>
            </tr>";
            $x++;
          }
 echo "</table>";
  }
}
function pass_mgt($con)
  {
    
       echo'<form action="'.$_SERVER["PHP_SELF"].'?id=password_mgt&&auth='.$_SESSION["un_id"].'" method="post" role="form" class="form">
            <div class="col-md-6 col-md-offset-3">
             <div class="input-group">
              <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="sach" placeholder="Enter Employee Name or Number"/>
               <span class="input-group-addon">
                <button class="link info" name="search">SEARCH</button>
              </span>
            </div>
           </div>
           </form>
           <br /><hr />';
           if(isset($_REQUEST["xxx"])==true)
           {
             if($_POST["pass1"]==$_POST["pass2"])
               {
                 if(isset($_POST["c_o_l"]))
                    {
                      $pass_stat=0;
                    }
                  else
                    {
                      $pass_stat=1;
                    }
                  $dbh=$con->prepare("update users set password=?,passwordstatus=? where id=?");
                  $dbh->bindParam(1,security::password_hash($_POST["pass1"],$_POST["username"]));
                  $dbh->bindParam(2,$pass_stat);
                  $dbh->bindParam(3,$_POST["userid"]);
                  $success=$dbh->execute();
                  if($success)
                     {
                      echo strtoupper("password updated successfully");
                     }
               }
              else
              {
                echo strtoupper("PASSWORD mismatch");
              }
           }
    
    if(isset($_POST["search"]))
       {
         $dbh=$con->prepare("select * from userdetails join users on userdetails.id=users.id where employee_name like '%' :search '%' or userdetails.id like '%' :search '%'");
         $dbh->bindParam(':search',$_POST["sach"]);
         $dbh->execute();
         if($dbh->rowCount()>0)
           { 
             $row=$dbh->fetch(PDO::FETCH_ASSOC);
             echo'<form action="'.$_SERVER["PHP_SELF"].'?id=password_mgt&&auth='.$_SESSION["un_id"].'" method="post" role="form" class="form form-horizontal">
                  <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="userid" hidden value="'.$row["id"].'"/>
                  <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="username" hidden value="'.$row["username"].'"/>
                  <div class="form-group">
                   <label class="control-label col-md-3" >EMPLOYEE NAME</label>
                   <div class="col-md-5">
                    <input type="text" class="form-control " readonly name="employeename" value="'.$row["employee_name"].'"/>
                   </div>
                  </div>
                  <div class="form-group">
                   <label class="control-label col-md-3" >NEW PASSWORD</label>
                   <div class="col-md-5">
                    <input type="password" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="pass1"/>
                   </div>
                  </div>
                  <div class="form-group">
                   <label class="control-label col-md-3" >CONFIRM PASSWORD</label>
                   <div class="col-md-5">
                    <input type="password" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="pass2"/>
                   </div>
                  </div>
                  <p>
                   <div class="checkbox">
                    <div class="col-md-5 col-md-offset-4">         
                     <input type="checkbox" class="checkbox"  autocomplete="off" name="c_o_l"/>
                     <label class="checkbox" >CHANGE ON NEXT LOGIN</label>
                   </div>
                 </div>
                </p>
               <div class="col-md-5 col-md-offset-3">
                <button class="btn btn-primary btn-block" name="xxx">SUBMIT</button>
               </div>
               </form>';
          }
          else
          {
            echo " no record found";
          }
     
     }

  }

?>