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
//include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Delet Account</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Deleting your account on this site, means:</li>
            <li>You wont be able to login</li>
            <li>Your Data will be deleted from the Server</li>
            <li>To continue:
                <ul>
                    <li>Enter your email and password</li>
                    <li>press delete Account</li>
                    <li>Wait for confirmation</li>
                </ul>
            </li>
        </ul>
        <form method="post" name="deletion_form" action="includes/process_delete.php">
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>

            <input type='button' value='Delete' onclick='formhash(this.form, this.form.password);' /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>
