<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('db/db_connection.php');
error_reporting(0);

if(isset($_POST['submit'])){
	
	
	$sender_acc_no=$_GET['account_no'];
	$recipient_acc_no=$_POST['recp_acc_no'];
	$amount = $_POST['amount'];
		
	$sql="SELECT account_no,name,email_id,balance from bank_db.Users where account_no=$sender_acc_no";
	$result = $conn->query($sql);
	$sender_sql=mysqli_fetch_array($result);

	$sql = "SELECT * from bank_db.Users where account_no=$recipient_acc_no";
	$query = mysqli_query($conn,$sql);
	$receiver_sql=mysqli_fetch_array($query);
		
	if(($amount)<0){
		echo"<script>alert('Negative Value')</script>"; }
		
	else if($amount>$sender_sql['balance']){
		echo"<script>alert('Insufficient Balance')</script>"; }
		
	else if($amount==0){
		echo"<script>alert('Insufficient Balance')</script>"; }

	else{
		$newbalance = $sender_sql['balance'] - $amount;
		$sql = "Update bank_db.Users set balance=$newbalance where account_no=$sender_acc_no";
		mysqli_query($conn,$sql);
			
		$newbalance = $receiver_sql['balance'] + $amount;
		$sql = "Update bank_db.Users set balance=$newbalance where account_no=$recipient_acc_no";
		mysqli_query($conn,$sql);

		$sql = "INSERT INTO bank_db.Transactions( `sender_account_id`, `recipient_account_id`, `amount`) values ($sender_acc_no,$recipient_acc_no,$amount)";
		$query=mysqli_query($conn,$sql);
			
		if($query){
			echo"<script>alert('Transaction Successful')</script>"; 
			echo "<script>window.location.href = 'transaction_details.php'</script>"; 

			}
			
		else{
			$msg="Something Went Wrong. Please try again";
			}

			$newbalance=0;
	$amount=0;
		
		}
}
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
			<th>Account No.</th>
			<th>Sender's Name</th>
			<th>Email-Id</th>
			<th>Balance</th>
		  <?php		
		  $sid=$_GET['account_no'];
		  $sql = "SELECT account_no,name,email_id,balance FROM bank_db.Users where account_no=$sid";
		  $result = $conn->query($sql);
		   while ($row=mysqli_fetch_array($result)) {
		  ?>
		  <tr>
			<td><?php echo $row['account_no'];?> </td>
			<td><?php echo $row['name'];?> </td>
			<td><?php echo $row['email_id'];?> </td>
			<td><?php echo $row['balance'];?> </td>		
			</tr>
		  <?php
		  }?>  
		  </tr>	 
	</table>
	
	<div class="form">
		<form action="" method="post" name="transfer money">
			<table id="tables">
				<tr>  
					<td><p>Recipient's Name: </p></td>
					<td><select class="dropdown" name="recp_acc_no" required="true" >
									<option value="">select</option>
									<?php $ret=mysqli_query($conn,"SELECT account_no,name FROM bank_db.Users where account_no<>$sid");
									while ($row=mysqli_fetch_array($ret)) {
									?>
									<option value="<?php  echo $row['account_no'];?>">
									<?php  echo $row['name'];?></option>
									<?php } ?>
					</td>
				</tr>
				<tr>  
					<td><p>Amount: </p></td>
					<td><input class="input_box" type="integer" name="amount" placeholder="0.00" required="true"><br></td>
				</tr>	
			</table>
				<button class="transfer-btn" type="submit" name="submit" id="submit">Transfer Money</button>
		</form>                    
	</div>
</div>
</body>
</html>


