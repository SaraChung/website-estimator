<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
		body {
				background-color: #D6EBF2;
			}

	</style>
</head>
<body>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_REQUEST['projectName'])) {

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$database = 'website_estimator';

	$con = new mysqli($host, $user, $pass, $database);
	
	if ($con->connect_error) {
  	die ("Failed to connect to MySQL: " . $con->error());
  }

	 $project_id 			= $_REQUEST['projectId'];
	 $name 						= $_REQUEST['projectName'];
   $number 	        = $_REQUEST['number'];
   $email 					= $_REQUEST['email'];
   $comment 				= $_REQUEST['comment'];
   $cms 						= $_REQUEST['cms'];
   $multilingual 		= $_REQUEST['multilingual'];
   $analytics 			= $_REQUEST['analytics'];
   $encryptioncert 	= $_REQUEST['encryptioncert'];
   $hosting 				= $_REQUEST['hosting'];
   $wordpress 			= $_REQUEST['wordpress'];
   $drupal 					= $_REQUEST['drupal'];
   $umbraco 				= $_REQUEST['umbraco'];
   $django 					= $_REQUEST['django'];
   $template 				= $_REQUEST['template'];
   $landingpage 		= $_REQUEST['landingpage'];
   $navigation 			= $_REQUEST['navigation'];
   $productpage 		= $_REQUEST['productpage'];
   $payment 				= $_REQUEST['payment'];
   $registration 		= $_REQUEST['registration'];
   $contactform 		= $_REQUEST['contactform'];
   $about 					= $_REQUEST['about'];

	$sql = "UPDATE projects SET
						name 						= '$name',
				 		contactnumber 	= '$number',
				 		contactemail 		= '$email',
				 		comments				= '$comment',
				 		cms 						= $cms,
				  	multilingual 		= $multilingual,
				  	analytics 			= $analytics,
				  	encryptioncert 	= $encryptioncert,
				  	hosting 				= $hosting,
				  	wordpress 			= $wordpress,
				  	drupal 					= $drupal,
				  	umbraco 				= $umbraco,
				  	django 					= $django,
				  	template 				= $template,
				  	landingpage 		= $landingpage,
				  	navigation 			= $navigation,
				  	productpage 		= $productpage,
				  	payment				 	= $payment,
				  	registration 		= $registration,
				  	contactform 		= $contactform,
				  	about 					= $about
				 	WHERE project_id 	= $project_id";

		if ($con->query($sql) === TRUE) {
			echo "Updated data successfully!";
		} else {
			// die('Could not update data: ' . $con->error());
			die('Could not update data.');
		}
		
	// echo("<form action='saveorderdeets.php' method='POST'>");
	// 	echo("-----Updated Project Details-----<br><br>");

	// 	echo ("Project Name <input name='project' value='$row[1]'><br>");
	// 	echo ("Contact number <input name='number' value='$row[2]'><br>");
	// 	echo ("Contact email <input name='email' value='$row[3]' style='width: 200px;'><br>");
	// 	echo ("Comments <input name='comment' value='$row[4]' style='height: 110px, width: 250px;'><br><br>");
		
	// 	echo ("Multilingual: <input name='multilingual' value='$row[5]' style='width: 20px;'><br>");
	// 	echo ("Analytics: <input name='analytics' value='$row[6]' style='width: 20px;'><br>");
	// 	echo ("Encryption cert: <input name='encryption' value='$row[7]' style='width: 20px;'><br>");
	// 	echo ("Hosting: <input name='hosting' value='$row[8]' style='width: 20px;'><br><br>");

	// 	echo ("CMS <input name='cms' value='$row[9]' style='width: 20px;'><br>");
	// 	echo ("Wordpress: <input name='wordpress' value='$row[10]' style='width: 20px;'><br>");
	// 	echo ("Drupal: <input name='drupal' value='$row[11]' style='width: 20px;'><br>");
	// 	echo ("Umbraco: <input name='umbraco' value='$row[12]' style='width: 20px;'><br>");
	// 	echo ("Django: <input name='django' value='$row[13]' style='width: 20px;'><br><br>");

	// 	echo ("Template <input name='template' value='$row[14]' style='width: 20px;'><br>");
	// 	echo ("Landing Page: <input name='landingpage' value='$row[15]' style='width: 20px;'><br>");
	// 	echo ("Navigation: <input name='navigation' value='$row[16]' style='width: 20px;'><br>");
	// 	echo ("Product Page: <input name='productpage' value='$row[17]' style='width: 20px;'><br>");
	// 	echo ("Payment: <input name='payment' value='$row[18]' style='width: 20px;'><br>");
	// 	echo ("Registration: <input name='registration' value='$row[19]' style='width: 20px;'><br>");
	// 	echo ("Contact Form: <input name='contactform' value='$row[20]' style='width: 20px;'><br>");
	// 	echo ("About: <input name='about' value='$row[21]' style='width: 20px;'><br><br>");

	// 	echo ('Total: $ CAD<br><br>------- END -------<br><br>');
	// echo("</form>");

	// 	echo ("<script>alert('$message');</script>");

				$con->close();

		echo( "<script>" );
		echo( "window.alert('Your new project details have been saved!');" );
		echo( "window.location('getorderdeets.php?project=$name')" );
		echo( "</script>" );

}
?>

</body>
</html>
