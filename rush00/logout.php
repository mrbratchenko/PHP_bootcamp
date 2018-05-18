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
<?php include("includes/footer.php"); ?>
<?php
	session_unset(); 
	session_destroy();
	unset($_SESSION["username"]);
	$_SESSION = array();
	$_SESSION['success'] = "Good Bye, Friend";
	$_SESSION['loggued_on_user'] = "Guest";
	header("Location: index.php");
	exit ;
?>