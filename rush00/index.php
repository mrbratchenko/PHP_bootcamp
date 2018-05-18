<?php include("includes/header.php"); ?>
<div class="error">
    <?php
        if(isset($_SESSION["fail"]) && !empty($_SESSION["fail"])){
            echo $_SESSION["fail"];
            unset($_SESSION["fail"]);
        }
        if(isset($_SESSION["success"]) && !empty($_SESSION["success"])){
            echo $_SESSION["success"];
            unset($_SESSION["success"]);
        }

    ?>
</div>

<?php

require("includes/define.php");
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());}

mysqli_select_db($con, DB_NAME) or die("Cannot select DB");

$res = mysqli_query($con, "SELECT * FROM products ORDER BY price");
    if (isset($_GET['action']) && $_GET['action']== "add")
        {
            $id=intval($_GET['id']);
            if(isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity']++;
            }
            else
            {
                $sql_s="SELECT * FROM products
                WHERE id={$id}";
                $query_s=mysqli_query($con, $sql_s);
                if (mysqli_num_rows($query_s) != 0) {
                    $row_s=mysqli_fetch_array($query_s);

                    $_SESSION['cart'][$row_s['id']]=array(
                        "quantity" => 1,
                        "price" => $row_s['price']
                    );

                } else {
                   $_SESSION["fail"] = "This product id it's invalid!";
                }
            }
        }
?>

    <?php
     if (isset($message)) {
        echo "<h2>$message</h2>";
    }

    ?> 
    <div id="name"><h1>Welcome to ToyFactory&trade;</h1></div>
    <div id="sidebar">

        <h2>Cart Preview</h2>

        <?php

        if (isset($_SESSION['cart'])) {
            $sql ="SELECT * FROM products WHERE id IN (";

            foreach ($_SESSION['cart'] as $id => $value) {
                $sql .= $id.",";
            }

            $sql = substr($sql, 0, -1).") ORDER BY name ASC";
            $query = mysqli_query($con, $sql);
            while($row=mysqli_fetch_array($query)) {
                ?>
                <?php echo "\"" . $row['name']. "\"" ." Quantity: ".$_SESSION['cart'][$row['id']]['quantity'] . "; ";?>

        <?php
        }
        ?>

        <input type="button" value="Go to cart" onclick="window.location.href='cart.php'"/>

        <?php
        } else {
            echo "<p>Your Cart is empty.Please, add some products</p>";
        }
        ?>

    </div>


	
	<?php
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());}

		mysqli_select_db($con, 'us_db') or die("Cannot select DB");

		$res = mysqli_query($con, "SELECT * FROM products ORDER BY price");
		echo "<table style='float: left; font-size: 18; font-weight: bold; max-width: 1000px; min-height: 10vmin; width: 100%; text-align: center; margin-bottom: 5vmin;'>";
		$i = 0;
		while($row = mysqli_fetch_assoc($res))
		{
			if( $i % 4 == 0 ) 
				echo "<tr>";
			echo "<td>"; ?> <img src="<?php echo $row["img_path"];?>" style="height: 250px; width:250px";  > <?php echo "</td>";
			echo "<td>" ; echo $row["name"];  echo "<br/><br/>Price:<br/>$"; echo $row["price"]; ?>
			<br/><a href="index.php?page=index&action=add&id=<?php echo $row['id'] ?>"><button>Buy!</button></a></td>
			<?php
			if( $i % 4 == 3 ) 
				echo "</tr>";
			$i++;
		}
		echo "</table>";

	?>
		<?php
		
		$res = mysqli_query($con, "SELECT * FROM products ORDER BY category");?>
		<ul class="menu" style="position: absolute; left: 1300px;">
		<?php

		while($row = mysqli_fetch_assoc($res))
		{
			if ($row['category'] != $currentCategory) 
			{
				?>
				<li class="item"><?php echo $row['category'];?> <ul class="options"></ul></li>
				<?php
		        $currentCategory = $row['category'];
		    }
		    ?>
		    <li class="opt" > "<?php echo $row["name"]; ?>" <img src="<?php echo $row["img_path"];?>" style="height: 50px; width:50px";</li> 
		    Price:  $<?php echo $row["price"]; ?> <a href="index.php?page=index&action=add&id=<?php echo $row['id'] ?>"><button>Buy!</button></a>
		    <?php
			}
		    ?> 
			
		</ul>
		
	
<?php include("includes/footer.php"); ?>