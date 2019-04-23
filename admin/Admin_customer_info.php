<?php
include_once '../dbconnect.php';
//include ('dbconnect.php');
if (isset($_SESSION['s_id']))
			{
        $getID = $_SESSION['s_id'];
        $q = "SELECT * FROM Staff WHERE Staff.LogIn_UID = $getID";
        $result=$mysqli->query($q);
        $row=$result->fetch_array();
      }


?>

<!DOCTYPE html>
<html>
<head>
<title> Customer Info </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../database.css">
<style>
body  {
    background-image: url("../bg/christmas.jpg");
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

  <?php include 'staff_header.php'; ?>
    <!-- Contact us-->
        <div class="container">

          <div class="row">

            <div class="mid">
              <h2>CUSTOMER INFORMATION</h2><hr>
              <center>


            <?php
						$q = "SELECT * FROM Customer,LogIn WHERE LogIn.UID = Customer.LogIn_UID ORDER BY CID";


						if($result = $mysqli->query($q)){

						echo '<table border="3" style="width:1000px;" cellpadding="8" cellspacing="0">';
						echo '<tr>';
						echo '<td>CID</td>';
						echo '<td>FirstName</td>';
						echo '<td>LastName</td>';
						echo '<td>Gender</td>';
						echo '<td>Tel.</td>';
						echo '<td>Email</td>';
						echo '<td>Adddress</td>';
						echo '</tr>';



							while($row = $result->fetch_array()){
								echo '<tr>';
								echo '<td style="color:black">'.$row['CID'].'</td>';
								echo '<td style="color:black">'.$row['FirstName'].'</td>';
								echo '<td style="color:black">'.$row['LastName'].'</td>';
								echo '<td style="color:black">'.$row['Gender'].'</td>';
								echo '<td style="color:black">'.$row['Tel'].'</td>';
								echo '<td style="color:black">'.$row['Email'].'</td>';
								echo '<td style="color:black">'.$row['Address'].'</td>';
							}
						echo '</table>';
						}
	?>


              <br>

            </center>


            </div>
          </div>
        </div>

</body>
</html>
