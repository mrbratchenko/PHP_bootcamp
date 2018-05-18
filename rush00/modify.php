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
 <h1>Change password</h1>
	<form action="modify.php" id="registerform" method="POST" name="registration.php">
		<p><label for="user_pass">Username<br>
			<input class="input" id="username" name="username" required="required" type="text" value=""></label></p>
		<p><label for="user_pass">Old password<br>
			<input class="input" id="password" name="oldpw" required="required" type="password" value=""></label></p>
		<p><label for="user_pass">New password<br>
			<input class="input" id="password" name="newpw" required="required" type="password" value=""></label></p>
		<p class="submit"><input class="button" id="register" name="submit" type="submit" value="OK"></p>
</div>
</div>

<?php
if ($_SESSION['loggued_on_user'] != NULL && $_SESSION['loggued_on_user'] != "Guest")
{
	$_SESSION["fail"] = "You need logout to perform this task";
		header("Location: index.php");
		exit ;
	}
	if($_POST['submit'] == 'OK' && $_POST['username'] != "" &&
		$_POST['oldpw'] != "" && $_POST['newpw'] != "" &&
		file_exists('private/bd')) {
		$array = unserialize(file_get_contents('private/bd'));
		if ($array != NULL || $array != "") {
			foreach ($array as $elem => $n ) {
				if ($n['username'] == $_POST['username']) {
					if ($n['password'] == hash('whirlpool', $_POST['oldpw'])){
						$array[$elem]['password'] = hash('whirlpool', $_POST['newpw']);
						$flag = 1;
					}
					else {

						$_SESSION["fail"] = "Invalid username or password";
						header("Location: modify.php");
						return ;
					}
				}
			}
			if ($flag != 1) {
				$_SESSION["fail"] = "Invalid username or password";
				header("Location: modify.php");
				return ;
			}
		}
		file_put_contents('private/bd', serialize($array));
		$_SESSION["success"] = "Now you can log in.";
		header("Location: login.php");
		return ;
	}
	else
		exit ;
?>