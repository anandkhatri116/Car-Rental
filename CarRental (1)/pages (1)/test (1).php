<html>
<Doctype!html>
<head>
<title>Register</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function changeformcolor($color)
    {
        document.getElementById('RegisterForm').style.backgroundColor=$color;
    }

	window.onload=function(){
							document.getElementById("linkid").click();
							};


</script>
<style>
	form
	{
		padding:3%;
		
	}
	p
	{
	padding-left:340px;
	color:red;
	}
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark">
  <ul class="navbar-nav col-13">
	  
    <li class="nav-item col-2 " style=''><img src='../images/logo2.jpg' height='50px'/></li>
    <li class="nav-item col-1 " style='margin:0 2% 0 20% ;text-align:center'><a class='nav-link' href="index.php" style=color:white>Home</a></li>
	<li class="nav-item col-1 " style='margin:0 2% 0 2% ;text-align:center'><a class='nav-link' href="#" style=color:white>Explore</a></li>
	<li class="nav-item col-1 " style='margin:0 2% 0 2% ;text-align:center'><a class='nav-link' href="#" style=color:white>About</a></li>
	<li class="nav-item col-1 " style='margin:0 20% 0 2% ;text-align:center'><a class='nav-link' href="#" style=color:white>Contact</a></li>
	</ul>	
	<?php
		include("myconnection.php");
		session_start();
		if(isset($_SESSION['uid']))
		{
			echo "<div class='nav-item dropdown col-2'>";
			echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white;float:right;'>".$_SESSION['uid']."</a>";
			echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown' style='margin-left:16%;'><a class='dropdown-item' href='#'>My Bookings</a>";
			echo "<a class='dropdown-item' href='#'>View Profile</a>";
			echo "<div class='dropdown-divider'></div>";
			echo "<button class='btn btn-primary' style='padding:0px;margin-left:23%;'><a class='nav-link' href='logout.php' style=color:white>Logout</a></button></div>";
			echo "</div>";
		}

		else
		{
			echo "<div style='float:right;'><ul class='navbar-nav'><li class='nav-item'><a class='nav-link' href='login.php' style=color:white>Login</a></li>";
			echo "<li class='nav-item '><button type='button' class='btn btn-light'><a href='register.php' style='text-decoration:none;'>Sign up</a></button></li></ul></div>";
		}
	?>
</nav>

<div class="container">
<form method=post style=width:700px >

<div class="btn-group" data-toggle="buttons-radio">
  <button type="button" class="btn " id='linkid' data-toggle="buttons-radio" name='role' value='User' style='background-color:#D5D5D5' onload=clicked>User</button>
  <button type="button" class="btn " data-toggle="buttons-radio" name='role' value='Renter' style='background-color:#9D84B7'>Renter</button>
</div>
<br>
<div class='col-15' style='border:solid red 2px;padding:10%;float:left; ' id='RegisterForm'>
<label>Email Id</label><input type=text name='uid' placeholder="Enter Email"  class="InputForm"><br>
<label>Name</label><input type=text name='name' placeholder="Enter Name" class="InputForm"><br>
<label>Password</label><input type=password name='pwd' placeholder="Enter Password" class="InputForm"><br>
<label>Contact no.</label><input type=text name='phoneno' placeholder='Enter Contact no.' class='InputForm'><br>
<?php
		$role='Renter';
		if($role=='Renter')
		{
			echo "<label>Building No.</label><input type=text name='buildingNo' placeholder='Eg. 310 or 120-A' class='InputForm' ><br>";
			echo "<label>Area</label><input type=text name='area' placeholder='Enter Area' class='InputForm' ><br>";
			echo "<label>City</label><input type=text name='city' placeholder='Enter city' class='InputForm'><br>";
			echo "<label>State</label><input type=text name='state' placeholder='Enter state' class='InputForm'><br>";
			echo "<label>Pincode</label><input type=text name='pincode' placeholder='Enter pincode' class='InputForm'><br>";
		}
	
?>
</div>
<button type=submit class="btn btn-primary">Signup</button> 
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['uid']))
{
$uid=$_POST['uid'];
$name=$_POST["name"];
$pwd=$_POST['pwd'];
$role=$_POST["role"];
$contactno=$_POST["phoneno"];
$building=$_POST["buildingNo"];
$area=$_POST["area"];
$city=$_POST["city"];
$state=$_POST["state"];
$pincode=$_POST["pincode"];
$address=$building.", ".$area." ".$city." ".$state." ".$pincode;
$accStatus='active';

include("myconnection.php");
if($role=='User')
{
	$r=$con->query("insert into customerdetails values ('$uid', '$name', '$pwd', '$address', $contactno, '$accStatus' )");
}

if($role=='Renter')
{
	$r=$con->query("insert into ownerdetails values ('$uid', '$name', '$pwd', '$address', $contactno, '$accStatus' )");
}


header("location:login.php");
$con->close();
}

?>