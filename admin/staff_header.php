<?php
include_once '../dbconnect.php';
session_start();

if (isset($_SESSION['s_id']))
			{
        $getID = $_SESSION['s_id'];
        $q = "SELECT * FROM Staff WHERE Staff.LogIn_UID = $getID";
        $result=$mysqli->query($q);
        $row=$result->fetch_array();

      }

?>

<div id="head">
<div class="topnav-right">
    <div class="dropdown">
      <a href ="Admin_customer_info.php"><button class="dropbtn">CUSTOMER INFO |</button></a>
    </div>


    <div class="dropdown">
      <a href ="Admin_order.php"><button class="dropbtn">ORDER |</button></a>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><?php echo $row['FirstName']. "- Admin|" ;?></button>
      <div class="dropdown-content">
        <a href="../logout.php">LOG OUT</a>
      </div>
    </div>


  </div>
  </div>
