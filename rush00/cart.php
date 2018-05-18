<?php include("includes/header.php"); ?>
<?php
	if ($_SESSION['loggued_on_user'] == NULL || $_SESSION['loggued_on_user'] == "Guest")
	{
		$_SESSION['fail'] = "Not logged in.";
		header("Location: index.php");
		exit ;
	}
	if (isset($_POST['submit'])) {
		foreach ($_POST['quantity'] as $key => $val) {
			if ($val == 0) {
				unset($_SESSION['cart'][$key]);
			}
			else {
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
	}
?>
<div class="container mlogin">
<div id='login' >
	<h1>View cart</h1>
<form method="POST" action="cart.php">
	<table>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Items Price</th>
		</tr>
    
    <?php
    require("includes/define.php");
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());}
	mysqli_select_db($con, DB_NAME) or die("Cannot select DB");
	$sql ="SELECT * FROM products WHERE id IN (";
	foreach ($_SESSION['cart'] as $id => $value) {
		$sql .= $id.",";
	}
	$sql = substr($sql, 0, -1).") ORDER BY name ASC";
	$query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($query)) {
		$loopprice = $_SESSION['cart'][$row['id']]['quantity']*$row['price'];
		$total += $loopprice;
		?>
		<tr>
			<td><?php echo $row['name'] ?></td>
			<td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="6" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" /></td>
			<td><?php echo $row['price'] ?>$</td>
			<td><?php echo $row['price']*$_SESSION['cart'][$row['id']]['quantity']."$"; ?></td>
		</tr>
		<?php

	}
	?>
	<tr>
		<td>Total price</td>
		<td><?php echo $total."$" ?></td>
	</tr>
</table>
<p class="submit"><input class="button" name="submit" type="submit" value="Update"></p>
<p class="submit"><input class="button" name="hi" type="submit" value="Submit"></p>
</form>
</div>
</div>

<?php
	if (isset($_POST['hi'])) {
		header("Location: index.php");
		$_SESSION['success'] = "Your request is submitted.Check our contacts for futher instructions";
		unset($_SESSION['cart']);
	}
?>
 <?php include("includes/footer.php"); ?>