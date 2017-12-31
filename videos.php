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
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> 
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <p>Welcome <?php echo htmlentities($_SESSION['username'])." you are an ".getUser($_SESSION['status']) ?>!</p>
            <p>
                This is an example protected page.  To access this page, users
                must be logged in.  At some stage, we'll also check the role of
                the user, so pages will be able to determine the type of user
                authorised to access the page.
            </p>
            <video width=320 height=240 controls>
                <source src="media\video\2017-09-09-GIF-00002519.mp4" type="video/mp4">
                <!--<source src="movie.mp4" type="video/mp4">     -->           
                Dein Browser ist Müll.
            </video>
            <p>Return to <a href="index.php">login page</a></p>
            <p>Please <a href="delete.php">delete</a> Account</p>
            <p>If you are done, please <a href='includes/logout.php'>log out</a>.</p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
