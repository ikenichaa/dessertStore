<!DOCTYPE html>
<html>
<head>
<title> desserts </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../database.css">

<style>

body  {
    background-image: url("../bg/wp1842819.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
</head>
<body>
  <!-- Navigation-->

  <?php include 'header_front.php';?>
    <h5> Desserts </h5>


    <div class="center">
    <?php
    include_once '../dbconnect.php';
    $sql = "SELECT * FROM Product WHERE ProductType_ProductTypeID = '2'";
    $result = $mysqli->query($sql);
    if(!$result){
      $mysqli->error;
    }


    ?>
    <div class="box">
    <div class="hvrbox">
  	<center><img src="../dessert/crumb.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
    <p class="serif"> Pie </p>
    <font size = "5px"> 45 bath</font>


  </div>
  </div>

  <div class="box">
  <div class="hvrbox">
  <center><img src="../dessert/cake2.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
  <p class="serif"> Cake </p>
  <font size = "5px"> 45 bath</font>


</div>
</div>

<div class="box">
<div class="hvrbox">
<center><img src="../dessert/popcorn.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
<p class="serif"> Pop corn </p>
<font size = "5px"> 45 bath</font>


</div>
</div>

<div class="box">
<div class="hvrbox">
<center><img src="../dessert/brownies.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
<p class="serif"> Brownies </p>
<font size = "5px"> 45 bath</font>


</div>
</div>
