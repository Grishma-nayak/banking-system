<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('db/db_connection.php');
error_reporting(0);
?>

<html lang="en">

<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/home_page.css" rel="stylesheet" media="all">
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
			<th>Transaction Date</th>
			<th>Sender's Name</th>
			<th>Recipient's Name</th>
			<th>Amount</th>
		</tr>
		<?php
		$sql = "SELECT transaction_date,t.name AS sender_name,y.name AS recipient_name,amount 
		FROM bank_db.Transactions u 
		LEFT JOIN bank_db.Users t ON t.account_no=u.sender_account_id 
		LEFT JOIN bank_db.Users y ON y.account_no=u.recipient_account_id 
		ORDER BY transaction_date desc";
		$result = $conn->query($sql);
        while ($row=mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row['transaction_date'];?> </td>
			<td><?php echo $row['sender_name'];?> </td>
			<td><?php echo $row['recipient_name'];?> </td>
			<td><?php echo $row['amount'];?> </td>		
		</tr>
        <?php
		}
		?>
	</table>		
</div>

</body>
</html>


