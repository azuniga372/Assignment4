<?php
    include_once 'header.php';
?>
    <section class="signup">
        <h2>Sign Up</h2>
        <div class="signup-form">
            <form action="includes/signup-inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat password">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <br>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p>Choose a proper username.</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords do not match.</p>";
            }
            else if ($_GET["error"] == "usernamecontainsspace") {
                echo "<p>Username can't contain any spaces.</p>";
            }
            else if ($_GET["error"] == "statementfailed") {
                echo "<p>Something went wrong. Please refresh the page and try again.</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Account already exists. Please log in.</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
            }
        }
    ?>
    </section>



<?php
    include_once 'footer.php';
?>