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
$s = getNewUsers($mysqli);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> 
        <link rel="stylesheet" href="styles/main.css" />
        <script src="js/main.js"></script>
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
           <?php if($_SESSION['status'] = 2) {
            echo "<p>Welcome ". $_SESSION['username']." !</p>";
            echo "    <table>";
                
                    echo "<table border='1'>";
                    echo "<tr><th>Username</th><th>Email</th><th>Activate</tdh</tr>";
                    echo $s;
                    echo "</table>";
            } else {
                echo "<p>";
                echo "<span class='error'>You are not authorized to access this page.</span>";
                echo "</p>";
            } 
            ?> 
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
