<?php
session_start();
error_reporting(0);
include('db/db_connection.php');
error_reporting(0);
?>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css\home_page.css" rel="stylesheet" media="all">
</head>
<div class="header-desktop">
	<h1 class="title-text">TSF Bank</h1>
</div>
<body style="background-image:url(img2.jpg)">
<div class="topnav">
  <a href="transaction_details.php"><p>Transaction Details</p></a>
  <a href="Customers.php"><p>Customers</p></a>
  <a href="Home_Page.php"><p>Home Page</p></a>
</div>
<div class="content">
	
	<h2 style="font-size:30px; color:red" padding: "70px 0px" align="left"> WELCOME TO TSF BANK.</h2>
	<p>   </p>
	<a href="customers.php"><button class="button" style="position: absolute; right: 115; bottom : 115" name="Get Started"><span>Get Started </span></button>
	</div>

</body>
