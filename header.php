<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assignment 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>


<header>
    <navbar>
        <ul class="nav-list">
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<li class='nav-item'><a href='comments.php'>Home</a></li>";
                    echo "<li class='nav-item'><a href='includes/logout-inc.php'>Log out</a></li>";
                }
                else {
                    echo "<li class='nav-item'><a href='index.php'>Home</a></li>";
                    echo "<li class='nav-item'><a href='login.php'>Login</a></li>";
                    echo "<li class='nav-item'><a href='signup.php'>Sign up</a></li>";
                }
            ?>
        </ul>
    </navbar>
</header>
<body>
<main>