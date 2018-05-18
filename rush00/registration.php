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

<div class="container mregister">
<div id="login">
 <h1>Registration</h1>
	<form action="registration.php" id="registerform" method="POST" name="registration.php">
 		<p><label for="user_login">Full name<br>
 			<input class="input" id="full_name" name="full_name" type="text" required="required" value=""></label></p>
		<p><label for="user_pass">E-mail<br>
			<input class="input" id="email" name="email" required="required" type="email" value=""></label></p>
		<p><label for="user_pass">Username<br>
			<input class="input" id="username" name="username" required="required" type="text" value=""></label></p>
		<p><label for="user_pass">Password<br>
			<input class="input" id="password" name="password" required="required" type="password" value=""></label></p>
		<p class="submit"><input class="button" id="register" name="register" type="submit" value="submit"></p>
	  	<p class="regtext">Already registered?<br /><a href="login.php">Log in</a>!</p>
	  </form>
</div>
</div>

<?php include("includes/footer.php"); ?>
<?php
	if ($_SESSION['loggued_on_user'] != NULL && $_SESSION['loggued_on_user'] != "Guest")
	{
		$_SESSION['fail'] = "You're still logged in.";
		header("Location:index.php");
		exit ;
	}
	if($_POST['register'] == 'submit' && $_POST['username'] != "" && $_POST['password'] != "" &&
		$_POST['email'] != "" && $_POST['full_name']) {
		if (!file_exists('private/bd'))
			mkdir('private');
		$array = unserialize(file_get_contents('private/bd'));
		if ($array != NULL || $array != "") {
			foreach ($array as $elem) {
				if ($elem['username'] == $_POST['username'] || $elem['email'] == $_POST['email']) {
						$_SESSION['fail'] = "Username or email is arleady used.";
						header("Location:registration.php");
						exit ;
				}
			}
		}
		$getusr['username'] = $_POST['username'];
		$getusr['password'] = hash('whirlpool', $_POST['password']);
		$getusr['email'] = $_POST['email'];
		$getusr['full_name'] = $_POST['full_name'];
		$array[] = $getusr; 
		file_put_contents('private/bd', serialize($array));
		$_SESSION['success'] = "Account created.You can log in.";
		header("Location:login.php");
		exit ;
	}
	else if ($_POST['register'] == 'submit') {
		$_SESSION['fail'] = "Incorrect input.Please,fill it again";
		header("Location:registration.php");
		exit ;
	}
?>