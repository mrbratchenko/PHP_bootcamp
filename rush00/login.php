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

<div class="container mlogin">
	<div id="login">
		<h1>Login</h1>
		<form action="login.php" id="loginform" method="POST" name="login.php">
		<p><label for="user_login">Username<br>
		<input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
		<p><label for="user_pass">Password<br>
		<input class="input" id="password" name="password" size="20" type="password" value=""></label></p> 
		<p class="submit"><input class="button" name="log" type="submit" value="login"></p>
		<p class="regtext">Not yet register? <br /> <a href="registration.php">Registration</a>!</p>
   		</form>
 	</div>
 </div>

<?php include("includes/footer.php"); ?>
<?php
include('auth.php');
if ($_SESSION['loggued_on_user'] != NULL && $_SESSION['loggued_on_user'] != "Guest")
	{
		$_SESSION['fail'] = "You're still logged in.";
		header("Location: index.php");
		exit ;
	}
$_SESSION['loggued_on_user'] = "Guest";
if ($_POST['username'] != NULL && $_POST['username'] != "" && 
	$_POST['password'] != NULL && $_POST['password'] != "" &&
	$_POST['log'] == 'login') {
	if (auth($_POST['username'], $_POST['password']) == FALSE) {
		$_SESSION["fail"] = "Invalid username or password";
		header("Location: login.php");
		return ;
	}
	else {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['loggued_on_user'] = $_SESSION['username'];
		$_SESSION["success"] = "Hello, ".$_SESSION['loggued_on_user'];
		header("Location: index.php");
	}
}
else if ($_POST['log'] == 'login') {
	$_SESSION["fail"] = "Fill all fields";
	header("Location: login.php");
	return ;
}
else
	exit ;
?>