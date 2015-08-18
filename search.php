<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> .:: lost and found ::.</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
<style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

</head>

<body>
<?php
//require("connect.php");
 
 mysql_connect("localhost", "root", "admin") or die("Error connecting to database: ".mysql_error());
 mysql_select_db("laf") or die(mysql_error());
 
$query = $_GET['search'];
$query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
$query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
$raw_results = mysql_query("SELECT * FROM document WHERE `Number` LIKE '%".$query."%'");

if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             echo "document found contact us <button>CALL US</button>";
             //   echo "<p><h3>".$results['NUMBER']."</h3>ID FOUND""</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
         //echo "No results ?>
          <button class="btn btn-default btn-lg" id="myBtn">leave details with us</button>
       <?php } 
    
 ?>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Let us know</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
          <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-th-list"></span> Item Lost</label>
              <select class="form-control" id="psw"> 
              <option>ID</option>
              <option>Passport</option>
              <option>NSSF/NHIF</option>
              <option>Driving Lesson</option>
              </select>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Names</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Phone Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>

            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>

            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Tell us</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>wanna hear more about us <a href="#">Subscribe</a></p>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>


</body>
</html>