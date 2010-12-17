<?
include "db.php";
// You may copy this PHP section to the top of file which needs to access after login.
session_start(); // Use session variable on this page. This function must put on the top of page.
$_SESSION["prevpage"] = "mumble.php";
if(!session_is_registered("username")){ // if session variable "sername" does not exist.
	header("location:login.php"); // Re-direct to index.php
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
{
  $name=addslashes($_POST['name']);
  $email=addslashes($_POST['email']);
  $comments=addslashes($_POST['message']);

 // you can specify which email you want your contact form to be emailed to here

  $toemail = "webmaster@grosinger.net";
  
  $subject = "Invitation to Server - Atrium Minecraft";

  $headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";

  $body = $comments;

  if (!ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $email))
  {
    echo "That is not a valid email address.  Please return to the"
           ." previous page and try again.";
    exit;
  }

    mail($toemail, $subject, $body, $headers);
	mail($email, $subject, $body, $headers);
    echo "Thanks for submitting your comments";
	$_SESSION["message"] = "Your invitation has been sent"
}
?>

<?php
	$title = "Refer-a-Friend";
	include("./includes/header.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <h2>Refer-A-Friend</h2>
	<p>Please enter the name of the person that you would like to refer as well as the 
		the email address to send the referal to.  Feel free to edit the message.</p>
		
	<?php
		if(isset($_SESSION["message"])){
			echo '<h4>' . $_SESSION["message"] . '</h4>';
			$_SESSION["message"] = NULL;
		}
	?>
	<form action="refer.php" method="post">
				</p>
					<table>
						<tr>
							<td>Name of friend: </td>
							<td><input name="name" type="text" /></td>
						</tr>
						<tr>
							<td>Email Address: </td>
							<td><input type="text" name="email" /></td>
						</tr>
					</table>
				
					<textarea rows="4" cols="33" name="message">Hello, you have been invited to join the Atrium Minecraft server.  Please visit 
						http://minecraft.grosinger.net/register.php
						to create an account.  Once you have an account you will be able to view all the information on how to join
						the server and the voice chat.  If you have any questions there is a contact page at http://minecraft.grosinger.net/contact.php
						</textarea>
				</p>
				<input type="submit" value="Submit" />
			</form>
	
	<p>Make sure to tell them to check their spam mail folder, just incase.</p>
    
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>