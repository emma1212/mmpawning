
<?php //session_start(); 
/**
* @version 2.0
* @package amsp
* @subpackage branch
* @copyright MiDi SL Team
* @license GNU/GPL v3
* login.php - This is the main login page for the system
*/
?>

<?php 
$logged = $_SESSION['logged'];
$user = $_SESSION['username'];
if ( !$logged ) { ?>		   
<form id="form1" method="post" action="index.php?page=login&loginAttempt=true">
	<!-- Using formatting set by the CSS for the login form -->
	<fieldset>
	<label for="inputtext1">Username:</label>
	<input id="inputtext1" type="text" name="inputtext1" value="" />
	<label for="inputtext2">Password:</label>
	<input id="inputtext2" type="password" name="inputtext2" value="" />
	<input id="inputsubmit1" type="submit" name="inputsubmit1" value="Login" />
   
	</fieldset>
</form>
<?php } else { ?>
<h4> You are already logged into the system as <strong><?php echo $user; ?></strong>. </h4>

<?php } ?>

<?php 
include_once('localDB.php');

$loginAttempt = $_GET['loginAttempt'];

if($loginAttempt==true) {
       

	$user = $_POST['inputtext1'];
	$pass = $_POST['inputtext2'];
	
	if($user == "" || $pass == "") {
		echo "<p>You have left one or more fields empty. Please fill in all fields</p>";
		$_SESSION['logged'] = false;
	}
	else {
		$usernameQuery = "SELECT username FROM users WHERE username = '$user'";
		$usernameResult = mysql_query($usernameQuery);
		//$i = mysql_numrows($result);
		//$usr = mysql_result($usernameResult,"username");
		//echo $usr;
		if( !$usernameResult ) {
			print("<p>The username you entered is invalid. Please enter a valid username</p>");
			$loginAttempt = false;
		}
		else {
			$passwordQuery = "SELECT password,isAdmin FROM users WHERE username = '$user'";
			$passwordResult = mysql_fetch_assoc(mysql_query($passwordQuery));
			$passwrd = $passwordResult['password'];
			//echo $passwrd;
			//check password hashing input using md5() function
			if( $passwrd == md5($pass) ) {
				echo '<p> Welcome to the Accounts Management System</p>';
				//echo '<p>Choose the <a href="home.php?page=branch"><strong>Branch</strong></a></p>';
				$_SESSION['logged'] = true;
				$_SESSION['username'] = $usr;
				//if user is admin, set session variable
				if ( (int)$passwordResult['isAdmin'] == 1 ) {
					$_SESSION['isAdmin'] = true;
				}
			}
			else {
				echo '<p>The password you entered is wrong. Please enter the correct password.</p>';
				$loginAttempt = false;
	        }
	    }
	}
}
?>




		
		
	
