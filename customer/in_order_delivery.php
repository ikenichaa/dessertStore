<?php
session_start();
include ('../dbconnect.php');
if (isset($_SESSION['s_id']))
			{
        $getID = $_SESSION['s_id'];
        $q = "SELECT * FROM Customer WHERE Customer.LogIn_UID = $getID";
        $result=$mysqli->query($q);
        $row=$result->fetch_array();

      }
?>
<html>
<head>
<title> clean food </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../database.css">
<style>
img{
  float: right;
}
body  {
    background-image: url("../bg/Nutrition.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100%;
    background-position: center;
    background-size: cover;
}



</style>
</head>
<body>

<?php include 'customer_header.php'; ?>
  <div class="container">

    <div class="row">

      <div class="col">
        <h2>My Order</h2><hr>
				<?php
				//echo $row['CID'];

        $k = "SELECT * FROM `Order` WHERE Customer_CID = '".$row['CID']."'
				AND (orderStatus = 'Cooking' or orderStatus = 'delivering')";
				$res=$mysqli->query($k);
	      while ($row2=$res->fetch_array())
				{?>
					<h3 style="color:red;"> Status: <?php echo $row2['orderStatus']; ?>| Price:<?php echo $row2['TotalPrice']; ?> </h3>
					<?php

					//echo $row2['OrderID'];
					$j = "SELECT ProductName,Quantity FROM OrderDetail, Product WHERE
					OrderDetail.Product_ProductID = Product.ProductID AND Order_OrderID = '".$row2['OrderID']."'";
					$res2=$mysqli->query($j);

		      while ($row3=$res2->fetch_array())
					{

						echo $row3['ProductName'];
						echo ' x ';
						echo $row3['Quantity'];
						echo '<hr>';


					}
				}


				?>








</div>
</div>


</body>
</html>
