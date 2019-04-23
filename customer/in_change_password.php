<?php
session_start();
if(isset($_SESSION['s_role'])){
  if($_SESSION['s_role']!='Customer'){
    header("Location: ../frontHome/login.php");
  }
} else {
  header("Location: ../frontHome/login.php");
}

?>
<?php

include ('../dbconnect.php');
if (isset($_SESSION['s_id']))
			{
        $getID = $_SESSION['s_id'];
				// $q = "SELECT * FROM Customer, Address, LogIn
				// WHERE Address.Customer_CID = Customer.CID AND
				//       LogIn.UID = Customer.LogIn_UID AND
				//       Customer.LogIn_UID = $getID";
        //
        // $result=$mysqli->query($q);
        // $row=$result->fetch_array();

				$o = "SELECT Password FROM LogIn WHERE UID = $getID";
				$old = $mysqli->query($o);
				$older=$old->fetch_array();
				$oldpw = $older['Password'];


				$message="";




      }

if (isset($_POST['changepass']))
			{
					$oldp = $_POST['oldpass'];
          $newp = $_POST['newpass'];
          $oldpass = MD5($oldp);


          $newpass = MD5($newp);


					if ($oldpw==$oldpass)
					 {


             $t = "UPDATE LogIn SET " .
              "Password = '".$newpass."' " .
             "WHERE UID = '".$getID."'; " ;
              if($res=$mysqli->query($t)){
                header("Location: changepass_success.php");
              }
              else{
                echo 'Query Failed';
              }

						}

					else
					{
						$message="wrong old password";
					}

			}
?>

<html>
<head>
<title> clean food </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../database.css">
<style>
body  {
    background-image: url("../bg/nut.jpg");
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
  <!-- Contact us-->
  <div class="container">

    <div class="row">

      <div class="col">
        <h2>Reset Password</h2><hr><br>
        <form action="in_change_password.php" method="POST">
          <label>Old Password</label>
          <input type="password" name="oldpass" placeholder="old password">

					<label>New Password</label>
          <input type="password" name="newpass" placeholder="new password">
					<label><font color="red"><?php echo $message?></font></label>






      <input type="submit" id="signin" value="SUBMIT" name="changepass">

        </form>
      </div>
    </div>




</body>
</html>
