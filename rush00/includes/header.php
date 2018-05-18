<?php
    session_start();
?>
<!DOCTYPE html>
    <html lang="en">
<head>
 <meta charset="utf-8">
<title> stuffed animals shop </title>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <div id="header">
            
            <nav>
                <ul>

                           <li><a href="/index.php">Main Page</a></li>
                            <li><a href="/registration.php">Registration</a></li>
                              <li><a href="/login.php">Login</a></li>
                               <li> <a href="/logout.php">Logout</a></li>
                               <li> <a href="/modify.php">Change password</a></li>
                                <li> <a href="/contacts.php">Contact page</a></li>
                          <li>  <?php echo "Current user: ";
                             if ($_SESSION['loggued_on_user'] == NULL)
                                echo "Guest";
                            else
                                echo $_SESSION['loggued_on_user'];
                            ?></li>
                    </ul>
                </div>
            </nav>
            </div>
    </head>

        <body>