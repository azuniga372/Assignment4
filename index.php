<?php
    include_once 'header.php';
?>
<?php
require_once 'includes/dbh-inc.php';

date_default_timezone_set('America/New_York');
?>
    
	<div class="full_form">
	<h1>Assignment 4</h1>
		<div class="form">
			<div class="row">
				<p> Welcome! </p>
				<br>
				<p> Please log in to post comments. If you do not have an account, please create an account.</p>
			</div>
		</div>
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