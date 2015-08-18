<?php
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> .:: Lost and found ::.</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

   
</head>

<body>
 <header id="head">
        <div class="container">
            <div class="row">
                <h1 class="lead">Lost your important document?.</h1>
                <p class="tagline">No worries, search here</p>
                <form class="form-horizontal" method="GET" action="search.php">
                    <input type="text" class="form-control" name="search" autocomplete="on">
                    <input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Lost Document" />
                    
                </form>
                </div>
        </div>
    </header>


    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
</button>
<h4 class="modal-title" id="myModalLabel">
Request a quote
</h4>
</div>
<div class="modal-body">
<form class="form-horizontal">
<div class="control-input">
    <label>webspace</label>
    <div class="span8">
    <input type="text" class="form-control">
    <label>Email</label>
    <input type="text" class="form-control">
    </div>
    </div>
</form>
</div>

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
</body>
</html>
