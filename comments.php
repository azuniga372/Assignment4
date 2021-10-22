<?php
    include_once 'header.php';
?>
<?php 

require_once 'includes/dbh-inc.php';

date_default_timezone_set('America/New_York');

if (isset($_POST['submit'])) {
	$name = $_SESSION["useruid"]; 
	$comment = $_POST['comment']; 
    $now = time();
    $timestamp = date('h:i:sa m/d/Y', $now);

	$sql = "INSERT INTO comments (usersUid, comment, time)
			VALUES ('$name', '$comment', '$timestamp')";
	$result = mysqli_query($conn, $sql);
}

?>
	<div class="full_form">
	<h1>Assignment 4</h1>
		<form action="" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Welcome</label>
                    <br>
                    <?php
                        if (isset($_SESSION["useruid"])) {
                            echo "<p>" . $_SESSION["useruid"] . "</p>";
                        }
                    ?>
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Comment</label>
				<textarea name="comment" id="comment"  placeholder="Enter your Comment" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post Comment</button>
			</div>
		</form>
		<div class="previous-comments">
			<?php 
			
			$sql = "SELECT * FROM comments";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="show-comments">
				<h4><?php echo $row['usersUid']; ?></h4>
                <br>
				<p><?php echo $row['comment']; ?></p>
                <br>
                <p><?php echo $row['time']; ?></p>
			</div>
            <?php

                }
            }

            ?>
		</div>
	</div>

<?php
    include_once 'footer.php';
?>