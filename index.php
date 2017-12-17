<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();


if (login_check($mysqli) == true) {
    $logged = 'in';
    $checked = true;
} else {
    $logged = 'out';
    $checked = false;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <link rel="stylesheet" href="styles/main.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
	    <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
    <div id="div1">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
            echo $_GET['res'];
        }
        ?>
        <?php
        if ($checked == false) {
            echo "<form action='includes/process_login.php' method='post' name='login_form'><table>";		
            echo "<tr><td>Email:</td><td><input type='email' name='email' required/></td></tr>";
            echo "<tr><td>Password: </td><td><input type='password' name='password' id='password' required/></td></tr>";
            echo "<tr><td colspan='2'><div class='g-recaptcha' data-sitekey='6LcIZzoUAAAAADBsXbLMFQNS3KYIcczBhrSIQqTM'></div></td></tr>";
            echo "<tr><td><input type='button' value='Login' onclick='formhash(this.form, this.form.password);' /></td></tr>";
            echo "</table></form>";
            echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
            echo "<p>You are currently logged <em>".$logged."</em></p>";
        
        
        } else {
            echo "<p><a href='protected_page.php'>Go on</a><p>";
            echo "<p>If you are done, please <a href='includes/logout.php'>log out</a>.</p>";
            echo "<p>You are currently logged <em>".$logged."</em> as <em>".$_SESSION['username']."</em></p>";
        }
        ?>

        
    </div>    
    </body>
</html>
