<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"
/>
<title>Pay</title>
<link rel="stylesheet" href="css/foundation.css" />
<script src="js/vendor/modernizr.js"></script>
<style>
input[type=number], input[type=password], select
{width: 70%;padding: 12px 20px 8px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}
input[type=submit] {
width: 70%;
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}
input[type=submit]:hover {
background-color: #45a049;
}
div {
text-align: center;
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
}
</style>
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
echo '<h1 style="color: white; margin-left: 20px;">Wallet:'.$obj->wallet.'<img
src="images/coi1ns.png"style="width:40px;height:40px;"></h1>';
}
}
?>
</li>
<li class="toggle-topbar menu-icon"><ahref="#"><span></span></a></li>
</ul>
<section class="top-bar-section">
<!-- Right Nav Section -->
<ul class="right">
<li><a href="about.php">About</a></li>
<li class='active'><a href="products.php">Pay</a></li>
<li><a href="addmoney.php">Add MITScoins</a></li>
<li><a href="orders.php">My Orders</a></li>
<li><a href="contact.php">Contact</a></li>
payment.php
<?php
if(isset($_SESSION['username'])){
echo '<li><a href="account.php">My Account</a></li>';
echo '<li><a href="logout.php">Log Out</a></li>';
}
else{
echo '<li><a href="login.php">Log In</a></li>';
echo '<li><a href="register.php">Register</a></li>';
}
?>
</ul>
</section>
</nav>
<div class="row" style="margin-top:10px;">
<div class="small-12">
<div>
<form method="POST" action="pay-wallet.php">
<label style="text-align: left; margin:0 135px; font-weight: bolder;" for="fname">Enter password</label>
<input type="password" id="fname" name="pwd"placeholder="Your password..">
<label style="text-align: left; margin:0 135px; font-weight: bolder;" for="lname">Enter Amount</label>
<input type="number" id="lname" name="amount"placeholder="Amount">
<label style="text-align: left; margin:0 135px; font-weight: bolder;" for="country">Payment to</label>
<select id="country" name="shop">
<?php
$result = $mysqli->query('SELECT payment_to FROM orders');
if($result === FALSE){die(mysql_error());
}
if($result){
while($obj = $result->fetch_object()) {
echo '<option>'.$obj->payment_to.'</option>';
}
}
?>
</select>
<input type="submit" value="Pay">
</form>
</div>
</div>
</div>
<!-- <?php /*
$i=0;$product_id = array();
$product_quantity = array();
$result = $mysqli->query('SELECT * FROM products');
if($result === FALSE){
die(mysql_error());
}
echo '<label for="country">Shop</label>';
echo '<select id="country" name="country">';
if($result){
while($obj = $result->fetch_object()) {
echo '<div class="large-4 columns">';
echo '<p><h3>'.$obj->product_name.'</h3></p>';
echo '<img src="images/products/'.$obj->product_img_name.'"/>';
echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
echo '<optionvalue="australia">Australia</option>';
if($obj->qty > 0){
echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart"
style="clear:both;background: #0078A0; border: none; color: #fff; font-size: 1em; padding:10px;" /></a></p>';
}
else {
echo 'Out Of Stock!';
}
echo '</div>';
$i++;
}
}
echo '</select>';
echo '<p'
$_SESSION['product_id'] = $product_id;
echo '</div>';
echo '</div>';
*/ ?> //-->
<div class="row" style="margin-top:10px;">
<div class="small-12">
<hr>
<footer style="margin-top:10px;">
<p style="text-align:center; font-size:0.8em;clear:both;">&copy;
MITSCoins! All Rights Reserved.</p>
</footer>
</div>
</div>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>
</body>
</html