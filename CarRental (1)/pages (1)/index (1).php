<html>
<doctype! html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").innerHtml()="today";
</script>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark">
  <ul class="navbar-nav col-13">
	  
    <li class="nav-item col-2 " style=''><img src='../images/logo.png' height='50px'/></li>
    <li class="nav-item col-1 " style='margin:0 2% 0 20% ;text-align:center'><a class='nav-link' href="index.php" >Home</a></li>
	<li class="nav-item col-1 " style='margin:0 2% 0 2% ;text-align:center'><a class='nav-link' href="#" >Explore</a></li>
	<li class="nav-item col-1 " style='margin:0 2% 0 2% ;text-align:center'><a class='nav-link' href="#" >About</a></li>
	<li class="nav-item col-1 " style='margin:0 20% 0 2% ;text-align:center'><a class='nav-link' href="#" >Contact</a></li>
	</ul>	
	<?php
		include("myconnection.php");
		session_start();
		if(isset($_SESSION['uid']))
		{
			echo "<div class='nav-item dropdown col-2'>";
			echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white;float:right;'>".$_SESSION['uid']."</a>";
			
			if($_SESSION['role']=='User')
			{
				echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown' style='margin-left:16%;'><a class='dropdown-item' href='#'>My Bookings</a>";
			}
			else
			{
				echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown' style='margin-left:16%;'><a class='dropdown-item' href='#'>All Bookings</a>";
			}
			echo "<a class='dropdown-item' href='#'>View Profile</a>";
			echo "<div class='dropdown-divider'></div>";
			echo "<button class='btn btn-primary' style='padding:0px;margin-left:23%;background-color: #212529; border: none;'><a class='nav-link' href='logout.php' style=color:white>Logout</a></button></div>";
			echo "</div>";
		}

		else
		{
			echo "<div style='float:right;'><ul class='navbar-nav'><li class='nav-item'><a class='nav-link' href='login.php' style=color:white>Login</a></li>";
			echo "<li class='nav-item '><button type='button' class='btn btn-light'><a href='register.php' style='text-decoration:none;color:black;'>Sign up</a></button></li></ul></div>";
		}
	?>
</nav>

<div class='container col-5' id='searchDiv' >
		<form method='POST' action='searchVehicle.php'>
		<input type=text class='form-control' placeholder='Pick-up Location' name='pickupLocation' id='pickup' required>  
		<input type=date class='form-control' placeholder='Pick-up Date'  name='pickupDate' id='pickupDate' required>
		<input type=time class='form-control' placeholder='Pick-up Time' name='pickupTime' id='pickupTime' required>
		<input type=text class='form-control' placeholder='Drop Location' name='dropLocation' id='drop' required>
		<input type=date class='form-control' placeholder='Return Date' name='returnDate' id='returnDate' required>
		<input type=time class='form-control' placeholder='Return Time' name='returnTime' id='returnTime' required>
		<button type=submit class="btn btn-light" style='width: 50%; margin-left: 25%;'>Search</button>
		<div id='datefield'></div>
		</form>
</div>


<?php
$con->close();
?>
</body>
</html>
