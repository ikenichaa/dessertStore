<?php
session_start();
include_once '../dbconnect.php';

if (isset($_POST['order']))
{
		echo 'hi<br>';
		echo 'hi<br>';
		$address_id = $_POST['address_id'];
    $getID = $_SESSION['s_id'];
    $q = "SELECT * FROM Customer WHERE Customer.LogIn_UID = $getID";
      $result=$mysqli->query($q);
      $row=$result->fetch_array();
    $cid = $row['CID'];
    $j = "SELECT (CURRENT_DATE) AS d";
      $res=$mysqli->query($j);
      $row2=$res->fetch_array();
    $day = $row2['d'];
		$k = "SELECT (CURRENT_TIME) AS t";
      $resu=$mysqli->query($k);
      $row3=$resu->fetch_array();
		$time = $row3['t'];
		echo $time.'<br>';
    echo $day.'<br>';
		$cal= $_SESSION['sumc'];
		$price= $_SESSION['sump'];
    $n = count($_SESSION['food']);
if ($_SESSION['sump']!=0){
		$in = "INSERT INTO `Order`(OrderDate,OrderTime,TotalPrice, Customer_CID) " .
		" VALUES('".$day."','".$time."','".$price."','".$cid."') ";
		if ($mysqli->query($in))
		{
			echo 'yes';
			$oid = "SELECT OrderID FROM `ORDER` ORDER BY OrderID DESC LIMIT 1 ";
			if ($res4=$mysqli->query($oid))
			{
				$row4=$res4->fetch_array();
				$orderID = $row4['OrderID'];
			}

		}
	}

    if ($_SESSION['sump']!=0){
      echo "There is food";
      for ($i=0; $i < count($_SESSION['food']); $i++)
      {
        $pname= $_SESSION['food'][$i];
				$pquan= $_SESSION['quantity'][$i];
				echo($pname.'<br>');
				echo($pquan.'<br>');

				$pid = "SELECT ProductID FROM Product WHERE ProductName = '".$pname."'";

				if ($findpid=$mysqli->query($pid))
				{
					echo ("at least in here\n");
					$row5=$findpid->fetch_array();
					$productID = $row5['ProductID'];
				}

				echo($productID.'<br>');
        $query = "INSERT INTO OrderDetail(Quantity,Product_ProductID,Order_OrderID) VALUES ('".$pquan."','".$productID."','".$orderID."')";
				if ($re=$mysqli->query($query))
				{
					echo "insert";
				}



      }

    }
    else {
      echo "There is no food";

    }
		$_SESSION['food'] = array();
		$_SESSION['quantity'] = array();
		$_SESSION['price']= array();
		header ("Location: in_order_delivery.php");



}
?>
<html>
<head>
	<title> Confirm Order</title>
</head>
</html>
