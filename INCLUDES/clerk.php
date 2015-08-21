<?php
function found_itm($con)
   {
   	if(isset($_POST["reg_item"]))
   	   { 
   	   	 $dbh=$con->prepare("select * from document where `DOCUMENT_NUMBER`=? and `DOC_STATUS`=0 ");
   	   	 $dbh->bindParam(1,validate::test_input($_POST["document_number"]));
   	   	 $dbh->exec();
   	   	 if($dbh->rowCount()>0)
   	   	   {
   	   	   	 $dbh=null;
             $dbh=$con->prepare("update document set  `DOC_STATUS`=1 where  `DOCUMENT_NUMBER`=?  ");
             $dbh->bindParam(1,validate::test_input($_POST["document_number"]));
   	   	     $dbh->exec();
   	   	   }
   	   	 else
   	   	 	{ 
   	   	 	  $dbh=null;
              $dbh=$con->prepare("INSERT INTO `document`(`ID`, `DOCUMENT_TYPE`, `DOCUMENT_NUMBER`, `OWNER`, `PICTURE`, `FINDER`, `LOCATION_FOUND`, `DATE`, `DOC_STATUS`) 
         	                VALUES (NULL,?,?,?,'0',?,?,now(),1)");
              $dbh->bindParam(1,validate::test_input($_POST["document_type"]));
              $dbh->bindParam(2,validate::test_input($_POST["document_number"]));
              $dbh->bindParam(3,validate::test_input($_POST["owner"]));
              $dbh->bindParam(4,validate::test_input($_POST["finder"]));
              $dbh->bindParam(5,validate::test_input($_POST["location_found"]));
              $dbh->execute();
             }
   	   }
     echo '    
         <form action="'.$_SERVER["PHP_SELF"].'?id=found_itm&&auth='.$_SESSION['un_id'].'" method="post" role="form" class="form form-horizontal">
          <div class="form-group">
           <label class="control-label col-md-3" > DOCUMENT TYPE</label>
           <div class="col-md-5">
            <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="document_type"/>
           </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3" > DOCUMENT NUMBER</label>
           <div class="col-md-5">
            <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="document_number"/>
           </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3" > OWNER</label>
           <div class="col-md-5">
            <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="owner"/>
           </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3" >FINDER</label>
           <div class="col-md-5">
            <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="finder"/>
           </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3" > LOCATION FOUND</label>
           <div class="col-md-5">
            <input type="text" class="form-control" required="required" autofocus="autofocus" autocomplete="off" name="location_found"/>
           </div>
          </div>
          <div class="col-md-5 col-md-offset-3">
           <button class="btn btn-primary btn-block" name="reg_item">
            FOUND IT!!
           </button>
          </div>
         </form>';
   	   
 
   }
function view_itm($con)
   {     
     $dbh=$con->query("select * from document");
     $dbh->execute();
     if($dbh->rowCount()>0)
	   {
	     $x=1;
	      echo " 
	             <table class='table table-condensed' style='margin:0;padding:0;'>
	             <tr style='background:ghostwhite;'>
		         <th>ID</th>
		         <th>DOCUMENT_TYPE</th>
		         <th>DOCUMENT_NUMBER</th>
		         <th>OWNER</th>
		         <!--th>PICTURE</th-->
		         <th>FINDER</th>
		         <th>LOCATION_FOUND</th>
		         <th>DATE</th>
		         <th>DOC_STATUS</th>
                 </tr>";
                 while($ROW=$dbh->fetch(PDO::FETCH_ASSOC))
                    {
                      if($x%2==0)
                      	 {
                      	 	$y="success";
                      	 }
                      else
                      	  {
                      	  	$y="warning";
                      	  }
                      if($ROW["DOC_STATUS"]==1)
                        {
                        	$status="FOUND";
                        }
                      else
                       {
                           $status="NOT FOUND";
                       }
                     echo"
                         <tr class='".$y."'>
                         <td>".$ROW["ID"]."</td>
                         <td>".$ROW["DOCUMENT_TYPE"]."</td>
                         <td>".$ROW["DOCUMENT_NUMBER"]."</td>
                         <td>".$ROW["OWNER"]."</td>
                         <!--td>".$ROW["PICTURE"]."</td-->
                         <td>".$ROW["FINDER"]."</td>
                         <td>".$ROW["LOCATION_FOUND"]."</td>
                         <td>".$ROW["DATE"]."</td>
                         <td>".$status."</td>
                         </tr>";
                         $x++;
                    }
         echo "</table>";
        }
   }
?>