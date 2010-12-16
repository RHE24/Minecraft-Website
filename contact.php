<?php 
	include "db.php";
	session_start(); // Use session variable on this page. This function must put on the top of page.
	$title = "Contact Form";
	$_SESSION["prevpage"] = "contact.php";
	include("./includes/header.php"); 
?>

<!-- End Header --> 
  <div class="content">
	<?php
		if(isset($_SESSION["message"])){
			echo '<h4>' . $_SESSION["message"] . '</h4>';
			$_SESSION["message"] = NULL;
		}
	
		echo 
			'<form action="formmail.php" method="post">
				</p>
					<table>
						<tr>
							<td>Username: </td>
							<td><input name="name" type="text" /></td>
						</tr>
						<tr>
							<td>Email Address: </td>
							<td><input type="text" name="email" /></td>
						</tr>
					</table>
				
					<textarea rows="4" cols="33" name="message">Enter your message here</textarea>
				</p>
				<input type="submit" value="Submit" />
			</form>';
					
	?>

  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>
