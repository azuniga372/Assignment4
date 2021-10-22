<?php
    include_once 'header.php';
?>

    <section class="signup">
    <h2>Login</h2>
        <div class="signup-form">
            <form id= "sign-up" action="includes/login-inc.php" method="post"> 
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "incorrectlogin") {
                echo "<p>Wrong username or password.</p>";
            }
            else if ($_GET["error"] == "incorrectpassword") {
                echo "<p>Password incorrect.</p>";
            }
        }
        ?>
    </section>



<?php
    include_once 'footer.php';
?>