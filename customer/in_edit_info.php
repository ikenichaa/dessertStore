
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
        <?php
          if(isset($_POST['sub'])){
            if (isset($_POST['address'])){
              if ($_POST['address']!=''){
                $t = "INSERT INTO Address (Address, Customer_CID) VALUES ('".$_POST['address']."',".$row['CID'].")";

                echo $t."<br><br>";
                $mysqli->query($t);
              }
            }

              $getUID = $_SESSION['s_id'];
              $fname = trim($_POST['firstname']);
              $lname = trim($_POST['lastname']);
              $gender = trim($_POST['gender']);
              $tele = trim($_POST['telephone']);
              $email = trim($_POST['email']);
              $addr = trim($_POST['subject']);
              echo $getUID;
              echo $fname;
              echo $lname;
              echo $gender;
              echo $tele;
              echo $email;
              echo $addr;

              $q = "UPDATE customer SET " .  //sql query = single quote
              "FirstName = '".$fname."', " .
              "LastName = '".$lname."', " .
              "Tel = '".$tele."', " .
              "Gender = '".$gender."', " .
              "Address = '".$addr."' " .
              "WHERE Login_UID = '".$getUID."'; " ;

              //echo '<hr>';
              //echo $q;

              $t = "UPDATE LogIn SET " .
               "Email = '".$email."' " .
              "WHERE UID = '".$getUID."'; " ;
              if($res=$mysqli->query($t)){
                header("Location: in_edit_info.php");
              }
              else{
                echo 'Query Failed';
              }

              if($res=$mysqli->query($q)){
                header("Location: in_edit_info.php");
              }
              else{
                echo 'Query Failed';
              }

              $s = "UPDATE Address SET " .
               "Address = '".$addr."' " .
               "WHERE Address.Customer_CID = '".$row['CID']."';";

              if($res=$mysqli->query($s)){
                header("Location: in_edit_info.php");
              }
              else{
                echo 'Query Failed';
              }



          }
        ?>

        <h2>Edit Profile</h2><hr><br>
        <form action="in_edit_info.php" method="POST">
          <label for="fname">First Name</label>
          <input type="text" name="firstname" value=<?php echo $row['FirstName']?>>

          <label for="lname">Last Name</label>
          <input type="text"  name="lastname" value=<?php echo $row['LastName']?>>

          <label for="gender">Gender</label>
          <input type="radio" name="gender" value="male" <?php if($row['Gender']=='Male' || $row['Gender']=='male' ){echo 'checked';}?>> Male
          <input type="radio" name="gender" value="female"<?php if($row['Gender']=='Female' || $row['Gender']=='female' ){echo 'checked';}?> > Female
          <input type="radio" name="gender" value="other" <?php if($row['Gender']=='Other' || $row['Gender']=='other' ){echo 'checked';}?>> Other<br><br>
          <label for="tel">Telephone No.</label>
      <input type="text" name="telephone" value=<?php echo $row['Tel']?>>

      <label for="email">Email</label>
      <?php
      $v = "SELECT Email FROM Customer,LogIn WHERE Customer.LogIn_UID = LogIn.UID AND Customer.LogIn_UID = $getID";
      $res=$mysqli->query($v);
      $ro=$res->fetch_array();
      ?>
      <input type="text" name="email" value=<?php echo $ro['Email']?>>
      <?php

                $getUID = $_SESSION['s_id'];
                $q2 = "SELECT Address FROM Customer,LogIn WHERE Customer.LogIn_UID = LogIn.UID AND Customer.LogIn_UID = $getID";
                if($new = $mysqli->query($q2)){
                  $r = $new->fetch_array()
              ?>
                <label for="add">Address</label>
                <textarea name="subject" style="height:50px"><?php echo $r['Address']; ?></textarea>

              <?php
                  }


             ?>


      <p style="color: #9494b8"> <a href="in_change_password.php" style="color: #9494b8">Change password</a> </p>
      <input type="submit" id="signin" value="SUBMIT" name="sub">

        </form>

      </div>
    </div>
</body>
</html>
