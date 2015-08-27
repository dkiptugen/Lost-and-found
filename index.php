<?php
//connect to db
    mysql_connect("localhost", "root", "admin") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("laf") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found </title>
    <link href="public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href="public/assets/icons/style.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
  .modal-header, h4, .close {
      background-color: #FA6E61;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

</head>
<body data-offset="65" data-spy="scroll" data-target="#nav">

<header id="header-full">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="header">
                    <a href="./" class="logo"><span class="mark">L&F</span> Lost &<span>Found</span></a>
                    <a href="#nav" class="nav-toggle"><span class="icon-layout"></span></a>
                    <nav id="nav">
                        <ul class="nav nav-links">
                            <li class="hidden"><a href="#intro"><span></span></a></li>
                            <li><a href="#search">SEARCH</a></li>

                            <li><a href="#work">HOW IT WORKS</a></li>
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="content">
                    <p>Hi. This is <a href="#">Lost and Found</a>. Get all your important lost stuff in a giffy!</p>
                    <p>First things first,Download the android app from google play.</p>
                    <p>
                        <a id="buy" href="#" class="btn btn-primary">Get it on Google play</a>
                    </p>
                </div>
                <div class="iphones"><img src="public/img/iphones.png" alt="iPhones"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="search" class="section light" style="padding-bottom:100px;">
    <div class="container">
        <div class="row">
            <!--<div class="col-xs-9 col-xs-offset-3">-->
             <div class="col-xs-6">
                <div class="content">
                    <h2 style="padding-left:20%;">SEARCH</h2>
                   <h1 class="lead">Lost your important document?.</h1>
                <p class="tagline">No worries, search here</p>
<?php
include 'connect.php';
    $search= $_GET['search'];
if($search) {
  //  $search=$_POST['search'];
    $query = $db->prepare("select * from document where Number LIKE '%$search%'");
    $query->bindValue(1, "%$search%", PDO::PARAM_STR);
    $query->execute();
// Display search result
         if (!$query->rowCount() == 0) {
        echo "Search found :<br/>";
      while ($results = $query->fetch()) {
       // $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
    //$query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
    //$raw_results = mysql_query("SELECT * FROM document WHERE `Number` LIKE '%".$query."%'");
//if(mysql_num_rows($raw_results) > 0)
//{
  //  while($results = mysql_fetch_array($raw_results)){

?>
   <button class="btn btn-primary btn-lg">WE FOUND IT -CALL US</button>
<?php  }
             
        }
        else{ // if there is no matching rows do following
         //echo "No results ?>
          <button class="btn btn-primary" id="myBtn">NOT FOUND!! LEAVE DETAILS WITH US</button>
       <?php }
       }
       else { 
 ?>
                <form class="form-horizontal" method="GET">
                    <input type="text" class="form-control" name="search" autocomplete="on">
                    <input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Lost Document" class="btn btn-primary" />
                    
                </form>
                <?php } ?>
  </div>
                </div>

<div class="col-xs-6">
<div class="content">
<h2 style="padding-left:20%;">POST</h2>
<h1 class="lead"> Found an Item???? </h1> 
<p> Post it with us </p>
<p>
 <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="post">POST FOUND DOCUMENT </button>
</p>

<!--POST MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Found Item Details</h4>
      </div>
      <div class="modal-body">
        <form action="index.php" method="POST">
          <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-th-list"></span> Item Found</label>
              <select class="form-control" id="psw" name="doctype"> 
              <option>ID</option>
              <option>Passport</option>
              <option>NSSF/NHIF</option>
              <option>Driving Lesson</option>
              </select>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Owners Names</label>
              <input type="text" class="form-control" id="usrname" name="ownName" placeholder="Enter the name on the document" required />
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Items Number</label>
              <input type="text" class="form-control" id="psw" name="docno" placeholder="Enter Item Number" required />
            </div>

            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Founders Name</label>
              <input type="text" class="form-control" id="psw" name="fname" placeholder="Enter your name" required />
            </div>

            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Phone Number</label>
              <input type="text" class="form-control" id="psw" name="fno" placeholder="Enter phone number" required />
            </div>
                 

            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="text" class="form-control" id="psw" name="femail" placeholder="Enter your email">
            </div>

            <input type="submit" class="btn btn-primary" name="send" value="REPORT TO US" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">SUBSCRIBE</button>
      </div>
    </div>
  </div>
</div>
<!--END POST MODAL-->

</div>
</div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>




<section id="work">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                    <div style="padding-bottom:100px;">
        <h2 style="padding-left:25%;">How it all works</h2>
        <p>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis mauris ut nisi interdum, eu venenatis ipsum mollis. Aliquam dignissim eu enim a lobortis. Nulla aliquam tellus vel tortor congue finibus. Fusce iaculis erat vel tortor tincidunt lacinia. Aliquam ornare sollicitudin efficitur. Integer sollicitudin porttitor eros. Sed sed est eu elit maximus dictum. Vestibulum cursus tincidunt felis, sit amet ultrices tellus tempus eu. Aenean ut tincidunt lectus.

Nulla luctus pulvinar quam, sit amet pharetra velit sollicitudin vitae. Mauris interdum consectetur ante a pharetra. Proin non sem blandit, efficitur est ac, laoreet massa. Aliquam quis condimentum purus. Donec rutrum pulvinar ultrices. In scelerisque semper ipsum, et scelerisque nibh volutpat at. Sed sodales, urna sed porttitor tempor, felis purus pellentesque nibh, eu porttitor ipsum turpis vitae leo.

Nam sodales orci at lorem mattis, sed suscipit enim ultrices. Praesent in velit in quam sollicitudin lacinia eget eget libero. Phasellus nec lectus non turpis mollis pellentesque. In sed fermentum dolor, eget lacinia augue. Praesent sed consequat orci. Maecenas vitae accumsan sapien. Curabitur mattis sem imperdiet, cursus metus sit amet, cursus lorem. Sed condimentum justo at diam vestibulum, vel fringilla dolor sagittis. Fusce porttitor malesuada mi, ac finibus nulla rutrum nec. Curabitur vestibulum elit eget orci fringilla sagittis. Sed dui velit, hendrerit ac gravida quis, mollis congue odio. Proin dui quam, cursus luctus libero quis, venenatis auctor eros. Fusce vitae tempor tellus. Fusce consequat aliquet ante sed ultrices.

Nulla euismod accumsan dolor, ac dapibus nunc volutpat at. Phasellus pulvinar sem ac lacus pharetra, ac molestie odio rutrum. Sed dapibus sapien a mi dignissim viverra. Ut quis dolor eget nulla vestibulum elementum. Suspendisse pharetra nulla nec massa fermentum, sed pharetra odio venenatis. Proin vitae ligula enim. Sed mattis at leo placerat efficitur. Donec suscipit pharetra mi, ac porta orci venenatis ac. Aliquam at enim magna.

Etiam rutrum, mi sit amet ornare pellentesque, nunc lorem mattis ligula, vel semper mauris mi non eros. Vestibulum fringilla eros tristique, placerat lorem eu, euismod felis. Nulla sit amet placerat turpis, vitae consectetur felis. Fusce diam metus, commodo in pharetra vitae, rhoncus ut neque. Sed sagittis turpis leo, sit amet elementum ligula mollis id. Morbi non nulla orci. Aliquam bibendum sapien leo, sit amet tincidunt sapien fermentum sit amet. Sed in purus at magna fermentum porttitor. Donec elementum sed ligula vitae tempor. Sed ultricies leo id ipsum dictum blandit. </p>




    </div>
                <div class="simple-form">
                    <div class="form-toggle delay"><i class="icon-mail"></i></div>
                    <form id="form" class="simform" autocomplete="off">
                        <div class="simform-inner">
                            <ol class="questions">
                                <li>
                                    <span><label for="q1">What's your name?</label></span>
                                    <input id="q1" name="q1" type="text"/>
                                </li>
                                <li>
                                    <span><label for="q2">Where do you live?</label></span>
                                    <input id="q2" name="q2" type="text"/>
                                </li>
                                <li>
                                    <span><label for="q3">What's your number?</label></span>
                                    <input id="q3" name="q3" type="text"/>
                                </li>
                                <li>
                                    <span><label for="q4">When can we call?</label></span>
                                    <input id="q4" name="q4" type="text"/>
                                </li>
                                <li>
                                    <span><label for="q5">Anything else?</label></span>
                                    <input id="q5" name="q5" type="text"/>
                                </li>
                            </ol>
                            <button class="submit" type="submit">Send answers</button>
                            <div class="controls">
                                <button class="next"></button>
                                <div class="progress"></div>
                                <span class="number">
                                    <span class="number-current"></span>
                                    <span class="number-total"></span>
                                </span>
                                <span class="error-message"></span>
                            </div>
                        </div>
                        <span class="final-message"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="copyright">© 2015</p>
                <p class="social">
                    <a href="#" class="delay"><i class="icon-facebook3"></i></a>
                    <a href="#" class="delay"><i class="icon-twitter"></i></a>
                    <a href="#" class="delay"><i class="icon-instagram"></i></a>
                    <a href="#" class="delay"><i class="icon-pinterest"></i></a>
                </p>
            </div>
        </div>
    </div>
</footer>

<a class="scrollup delay" href="JavaScript:void(0)"><i class="icon-arrow-up4"></i></a>

<!--NOT FOUND MODAL-->

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

<!--INSERT INTO DBASE clients-->
<?php
include 'connect.php';
 if (isset($_POST['sub']))
 {
    $result ="INSERT INTO clients (DOC, NAME, NUMBER, EMAIL, REM)
            VALUES(:doc, :name, :phne, :em, :rem)";

    $res=$db->prepare($result);
    
     $res->bindParam(':doc', $_POST['doc'], PDO::PARAM_STR);
     $res->bindParam(':name', $_POST['nme'], PDO::PARAM_STR);
     $res->bindParam(':phne', $_POST['psw'], PDO::PARAM_STR);
     $res->bindParam(':em', $_POST['email'], PDO::PARAM_STR);
     $res->bindParam(':rem', $_POST["not"], PDO::PARAM_STR);

     $res->execute();

     echo "thank you";
 }else 
    { 
  
?>
<!--END OF INSERT INTO DATABASE TABLE clients-->
          <form role="form" action="index.php" method="post">
          <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-th-list"></span> Item Lost</label>
              <select class="form-control" id="psw" name="doc"> 
              <option>ID</option>
              <option>Passport</option>
              <option>NSSF/NHIF</option>
              <option>Driving Lesson</option>
              </select>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Names</label>
              <input type="text" class="form-control" id="usrname" name="nme" placeholder="Enter your names" required />
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Phone Number</label>
              <input type="text" class="form-control" id="psw" name="psw" placeholder="Enter your phone number" required />
            </div>

            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="text" class="form-control" id="psw" name="email" placeholder="Enter your email" required />
            </div>

            <div class="checkbox">
              <label><input type="checkbox" value="" name="not" checked>Remember me</label>
            </div>
            <input type="submit" class="btn btn-primary" name="sub" value="Tell us" />
         <!-- <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Tell us</button> -->
          </form>
<?php }
   ?>
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

<!--END OF NOT FOUND MODAL -->

<!--BEGIN OF INSERT INTO FOUND ITEMS TABLE-->
<?php

include 'connect.php';

if(isset($_POST['send']))
{

$sql ="INSERT INTO foundItems (doctype, ownerName, docNum, fName, fEmail,fPhone) 
VALUES(:doctype, :ownerName, :docNum, :fName, :fEmail, :fPhone)";

$stmt=$db->prepare($sql);
                                           
$stmt->bindParam(':doctype', $_POST['doctype'], PDO::PARAM_STR);  
$stmt->bindParam(':ownerName', $_POST['ownName'], PDO::PARAM_STR);    
$stmt->bindParam(':docNum', $_POST['docno'], PDO::PARAM_STR);
$stmt->bindParam(':fName', $_POST['fname'], PDO::PARAM_STR);
$stmt->bindParam(':fEmail', $_POST['femail'], PDO::PARAM_STR);
$stmt->bindParam(':fPhone', $_POST['fno'], PDO::PARAM_STR);  

$stmt->execute(); 
echo "thank you";
} 
else {
  echo "non successful";
}
?>
<!--END OF INSERT INTO FOUND TABLE-->

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  

<!-- JS -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="public/assets/js/modernizr.custom.js"></script>
<script src="public/assets/js/gmaps.js"></script>
<script src="public/assets/js/placeholder.min.js"></script>
<script src="public/assets/js/classie.js"></script>
<script src="public/assets/js/stepsform.min.js"></script>
<script src="public/assets/js/sticky.js"></script>
<script src="public/assets/js/pageslide.min.js"></script>
<script src="public/js/scripts.min.js"></script>


</body>
</html>