<?php
//if (session_status() !== PHP_SESSION_ACTIVE){session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(isset($_SESSION["username"])){header("location:index.php");}
include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"
/>
<title>Login</title>
<link rel="stylesheet" href="css/foundation.css" />
<style type="text/css">
input[type=email], input[type=password]{
width: 70%;
padding: 12px 20px 8px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;}
input[type=submit],input[type=reset]{
width: 20%;
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;}
input[type=submit]:hover,input[type=reset]:hover{
background-color: #45a049;}
div{
text-align: center;
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;}
</style>
<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<nav class="top-bar" data-topbar role="navigation">
<ul class="title-area">
<li class="name">
<?php
if(isset($_SESSION['username'])) {
$user = $_SESSION["username"];
$result = $mysqli->query("SELECT wallet from users whereemail='".$user."'");
if($result){
$obj = $result->fetch_object();
echo '<h1 style="color: blue;margin-left: 20px;">Wallet:'.$obj->wallet.'<img src="college.png"
style="width:300px;height:168px;"></h1>';
}
}
login.php
else
echo '<h1><a href="index.php">MITSCOIN</a></h1>';
?>
</li>
<li class="toggle-topbar menu-icon"><a
href="#"><span></span></a></li>
</ul>
<section class="top-bar-section">
<!-- Right Nav Section -->
<ul class="right">
<li><a href="about.php">About</a></li>
<?php
if(isset($_SESSION['username']))
{echo '<li><a href="products.php">Pay</a></li>';
echo '<li><a href="addmoney.php">Add MITSCoins</a></li>';
echo '<li><a href="orders.php">My Orders</a></li>';
}
?>
<li><a href="contact.php">Contact</a></li>
<?php
if(isset($_SESSION['username'])){
echo '<li><a href="account.php">My Account</a></li>';
echo '<li><a href="logout.php">Log Out</a></li>';
}
else{
echo '<li class="active"><a href="login.php">Log In</a></li>';
echo '<li><a href="register.php">Register</a></li>';
}
?>
</ul>
</section>
</nav>
<div class="row" style="margin-top:10px;">
<div class="small-12"><div>
<form method="POST" action="verify.php">
<label style="text-align: left; margin:0 135px; font-weight:bolder;" for="left-label">Email</label>
<input type="email" id="right-label" placeholder=""name="username">
<label style="text-align: left; margin:0 135px; font-weight:bolder;" for="left-label">Password</label>
<input type="password" id="right-label" placeholder=""name="pwd"><br>
<input type="submit" id="right-label" value="Login">
<input type="reset" id="right-label" value="Reset"style="background-color: red;"><br>
<a href="resetpassword.php">Forgot password?</a>
</form>
</div>
</div>
</div>
<div class="row" style="margin-top:10px;">
<div class="small-12">
<footer>
<p style="text-align:center; font-size:0.8em;">&copy; MITScoins!All Rights Reserved.</p>
</footer>
</div>
</div>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html>