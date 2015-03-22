<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include("nav.php");

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'website_estimator';

$con = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	$error = '';
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
	$email = $_REQUEST['email'];
	$comment = $_REQUEST['comment'];

if ($name == '' || $number == '' || $email == '') {
	echo "<center><h3>Fill in each field!</h3></center>"; die();
} else {


	$products = '[
    {"productId":"1", "productName":"Multilingual", "productPrice":"200"},
	{"productId":"2", "productName":"Analytics", "productPrice":"300"},
    {"productId":"3", "productName":"Encryption Cert", "productPrice":"100"},
	{"productId":"4", "productName":"Hosting", "productPrice":"150"},
	{"productId":"5", "productName":"CMS", "productPrice":"0"},
    {"productId":"6", "productName":"Landing Page", "productPrice":"100"},
	{"productId":"7", "productName":"Navigation", "productPrice":"100"},
	{"productId":"8", "productName":"Product Page", "productPrice":"100"},
	{"productId":"9", "productName":"Shopping Cart / Payment", "productPrice":"100"},
	{"productId":"10", "productName":"Registration / Profile", "productPrice":"100"},
    {"productId":"11", "productName":"Contact Form", "productPrice":"100"},
	{"productId":"12", "productName":"About", "productPrice":"100"}	
]';


	$cms = '[
    {"productId":"1", "productName":"Wordpress (PHP)", "productPrice":"5000"},
	{"productId":"2", "productName":"Drupal (PHP)", "productPrice":"7000"},
    {"productId":"3", "productName":"Umbraco (ASP.net)", "productPrice":"10000"},
	{"productId":"4", "productName":"Django (Python)", "productPrice":"10000"}
]';


	$productsDecoded = json_decode($products);
	$cmsDecoded = json_decode($cms);

	$total = 0;
	$dataToDisplay = '';
	foreach ($_POST['chkbox'] as $selected) {

		$productName = $productsDecoded[$selected]->productName;
		$productPrice = $productsDecoded[$selected]->productPrice;

		$total += $productPrice;


		if ($productsDecoded[$selected]->productName == 'CMS') {
			foreach ($_POST['cms_options'] as $selectedCms) {
				$productName = $cmsDecoded[$selectedCms]->productName;
				$productPrice = $cmsDecoded[$selectedCms]->productPrice;
				$total += $productPrice;

				$dataToDisplay .= '<br>CMS - ' . $productName . ': $' . $productPrice . ' CAD';
			}
		} else
			$dataToDisplay .= '<br>' . $productName . ': $' . $productPrice . ' CAD';
	}

	if(isset($_POST['cms_options']))
		$cmsOptionsGet = $_POST['cms_options'];
	else
		$cmsOptionsGet = array();


	$multilingual = (in_array(0, $_POST['chkbox'])) ? 1 : 0;
	$analytics = (in_array(1, $_POST['chkbox'])) ? 1 : 0;
	$encryptioncert = (in_array(2, $_POST['chkbox'])) ? 1 : 0;
	$hosting = (in_array(3, $_POST['chkbox'])) ? 1 : 0;
	$wordpress = (in_array(0, $cmsOptionsGet)) ? 1 : 0;
	$drupal = (in_array(1, $cmsOptionsGet)) ? 1 : 0;
	$umbraco = (in_array(2, $cmsOptionsGet)) ? 1 : 0;
	$django = (in_array(3, $cmsOptionsGet)) ? 1 : 0;
	$template = 0;
	$landingpage = (in_array(5, $_POST['chkbox'])) ? 1 : 0;
	$navigation = (in_array(6, $_POST['chkbox'])) ? 1 : 0;
	$productpage = (in_array(7, $_POST['chkbox'])) ? 1 : 0;
	$payment = 0;
	$registration = (in_array(9, $_POST['chkbox'])) ? 1 : 0;
	$contactform = (in_array(10, $_POST['chkbox'])) ? 1 : 0;
	$about = (in_array(11, $_POST['chkbox'])) ? 1 : 0;


	$isCMSRequired = $wordpress | $drupal | $umbraco | $django;

	$sql = "INSERT INTO projects 
   				(name, contactnumber, contactemail, comments, multilingual, analytics, encryptioncert, hosting, cms, wordpress, drupal, umbraco, django, template, landingpage, navigation, productpage, payment, registration, contactform, about)
   				VALUES ('$name', '$number', '$email', '$comment', $multilingual, $analytics, $encryptioncert, $hosting, $isCMSRequired, $wordpress, $drupal, $umbraco, $django, $template, $landingpage, $navigation, $productpage, $payment, $registration, $contactform, $about)";

	$save = $con->query($sql) or die ($con->error);

	echo "You have entered your data successfully!<br><br>";

	mysqli_close($con);


	echo 'Name: ' . $name . '<br>';
	echo 'Number: ' . $number . '<br>';
	echo 'Email: ' . $email . '<br>';
	echo 'Comments: ' . $comment . '<br><br>';

	echo '----- ORDER -----<br>' . $dataToDisplay;
	echo '<br><br>Total: $' . $total . ' CAD<br><br>------- END -------';
}
?>

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

	</body>
</html>
