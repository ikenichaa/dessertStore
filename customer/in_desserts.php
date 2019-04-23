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
			if (isset($_POST['hi3']))
			{

				$number = $_POST['hi3'];

				$up = "SELECT * FROM Product WHERE ProductID = '$number' ";
				$res=$mysqli->query($up);
				$rows=$res->fetch_array();
				$menu = $rows['ProductName'];
				$price = $rows['Price'];




				if (in_array($menu, $_SESSION['food'])) {
			    //
				}
				else{
					$_SESSION['food'][] = $menu;

					$_SESSION['quantity'][] = 1;
					$_SESSION['price'][] = $price;

				}



				//print_r ($_SESSION['food']);

			//
			}
?>
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
.selected{
  opacity: 0.5;
  cursor: none;
}

.button3 {background-color: #f44336;}
.button4 {background-color: #e7e7e7; color: black;} /* Gray */
</style>
</head>
<body>

  <!-- Navigation-->

<?php include 'customer_header.php'; ?>
    <h5> Desserts </h5>

<div class="center">
  <!-- 1 -->
      <div class="box">
      <div class="hvrbox">
				<center><img src="../dessert/crumb.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
		    <p class="serif"> Pie </p>
		    <font size = "5px"> 45 bath</font>
    	</div>

  <table bgcolor="black" align="center" width=100%>
		<tr>
      <td>
				<form action="in_desserts.php" method="POST">

					<?php if (in_array( "pie", $_SESSION['food'])){?>
						<button class="button button3" type="Submit"  value="1"> In Cart </button>

					<?php
					}
					else{?>
							<button class="button button4" type="Submit" name="hi3" value="1"> Buy Here </button>
						<?php
					}
					?>

				</form>
  			<!--<img type="image" src="food/shop.png" alt="Submit" width="50" height="50"></td>-->
			</tr>
		</table>
  	</div>
  <!-- 2-->
		<div class="box">
		<div class="hvrbox">
			<center><img src="../dessert/cake2.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
		  <p class="serif"> Cake </p>
		  <font size = "5px"> 45 bath</font>
		</div>

<table bgcolor="black" align="center" width=100%>
	<tr>
		<td>
			<form action="in_desserts.php" method="POST">

				<?php if (in_array( "cake", $_SESSION['food'])){?>
					<button class="button button3" type="Submit"  value="2"> In Cart </button>

				<?php
				}
				else{?>
						<button class="button button4" type="Submit" name="hi3" value="2"> Buy Here </button>
					<?php
				}
				?>

			</form>
			<!--<img type="image" src="food/shop.png" alt="Submit" width="50" height="50"></td>-->
		</tr>
	</table>
	</div>

  <!-- 3-->
	<div class="box">
	<div class="hvrbox">
		<center><img src="../dessert/popcorn.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
		<p class="serif"> Pop corn </p>
		<font size = "5px"> 45 bath</font>
	</div>

<table bgcolor="black" align="center" width=100%>
<tr>
	<td>
		<form action="in_desserts.php" method="POST">

			<?php if (in_array( "popcorn", $_SESSION['food'])){?>
				<button class="button button3" type="Submit"  value="3"> In Cart </button>

			<?php
			}
			else{?>
					<button class="button button4" type="Submit" name="hi3" value="3"> Buy Here </button>
				<?php
			}
			?>

		</form>
		<!--<img type="image" src="food/shop.png" alt="Submit" width="50" height="50"></td>-->
	</tr>
</table>
</div>

  <!-- 4-->
<div class="box">
<div class="hvrbox">
	<center><img src="../dessert/brownies.jpg" class="hvrbox-layer_bottom" width="70%" height="70%"></center>
	<p class="serif"> Brownies </p>
	<font size = "5px"> 45 bath</font>

</div>

<table bgcolor="black" align="center" width=100%>
<tr>
<td>
	<form action="in_desserts.php" method="POST">

		<?php if (in_array( "brownies", $_SESSION['food'])){?>
			<button class="button button3" type="Submit"  value="4"> In Cart </button>

		<?php
		}
		else{?>
				<button class="button button4" type="Submit" name="hi3" value="4"> Buy Here </button>
			<?php
		}
		?>

	</form>
	<!--<img type="image" src="food/shop.png" alt="Submit" width="50" height="50"></td>-->
</tr>
</table>
</div>

    </div>

    </div>   <!-- center-->


    <script>
      function toggle(productID, event){
        if(document.getElementById(productID).checked == true){
          document.getElementById(productID).checked = false
          event.target.className = event.target.className.replace(' selected','')
        } else {
          document.getElementById(productID).checked = true
          event.target.className += " selected"
        }
      }
      function clickSubmit(){
        document.getElementById('form').submit()
      }
    </script>


      <!-- background-->


    </body>
    </html>
