<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('db/db_connection.php');
error_reporting(0);

if(isset($_GET['account_no']))
{
$account_no=intval($_GET['account_no']);
$sql=mysqli_query($conn,"UPDATE bank_db.Users WHERE account_no ='$account_no'");
 echo "<script>alert(' successful');</script>"; 
 echo "<script>window.location.href = 'transfer_money.php'</script>";    
  
}

?>

<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/customers.css" rel="stylesheet" media="all">
<link href="css/tables.css" rel="stylesheet" media="all">
</head>

<body style="background-image:url(img2.jpg)">
<div class="header-desktop">
	<h1 class="title-text">Bank</h1>
</div>
<div class="topnav">
  <a href="transaction_details.php"><p>Transaction Details</p></a>
  <a href="Customers.php"><p>Customers</p></a>
  <a href="Home_Page.php"><p>Home Page</p></a>
</div>
<div class="content">
<table id="tables">
		  <tr>
			<th>Account No.</th>
			<th>Name</th>
			<th>Email-Id</th>
			<th>Balance</th>
			<th>Action</th>
		  </tr>
		  <?php
		  $sql = "SELECT account_no,name,email_id,balance FROM bank_db.Users ORDER BY account_no";
		  $result = $conn->query($sql);
		
		  while ($row=mysqli_fetch_array($result)) {
		  ?>
		  <tr>
			<td><?php echo $row['account_no'];?> </td>
			<td><?php echo $row['name'];?> </td>
			<td><?php echo $row['email_id'];?> </td>
			<td><?php echo $row['balance'];?> </td>		
			<td><a href="transfer_money.php?account_no=<?php echo $row['account_no'];?>"><button>View</button></a></td>
			</tr>
		  <?php 
		
			}
			?>  
		</table>
</div>
</body>
</html>


