<?php
include("nav.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$selectedProject = $_REQUEST['project'];

echo ("<h2 style='text-align:center;'>" . $selectedProject . "</h2>");

$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'website_estimator';

$con = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

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

	/*set width on form instead of fieldset seems less screwed up*/
		form { 
		  font:100% verdana,arial,sans-serif;
		  margin: 0 auto;
		  padding: 0;
		  min-width: 500px;
		  max-width: 600px;
		  width: 560px; 
		  line-height: 25px;
		}

		form fieldset {
			background-color: #FFF;
		  clear: both;
		  border-color: #000;
		  border-width: 1px;
		  border-style: solid;
		  padding: 10px;        
		  margin: 0;
		}
		
		/*overly largef ont size overwrites border AND padding seems to shift border top*/
		form fieldset legend {
			font-size: 1.1em; 
		}

		form label { 
			display: block;  /* block float the labels to left column, set a width */
			float: left; 
			width: 150px; 
			padding: 0; 
			margin: 3px 0 0; /* set top margin same as form input - textarea etc. elements */
			text-align: right; 
		}

		form input, form textarea {
			width:auto;      
			margin:5px 0 0 10px; 
		}

		form input#reset {
			margin-left:0px;
		}

		textarea { overflow: auto; }

		form small {
			display: block;
			margin: 0 0 5px 160px;
			padding: 1px 3px;
			font-size: 88%;
		}

		form .required{font-weight:bold;}

		/*clear on input doesnt seem to work all that well so using br instead*/
		form br {
			clear:left;
		}

		#project-name {
			display: block;
			padding-left: 30px;
		}

		.chkbox{
			clear: both;
			float: left;
		}

		.chkbox-wrapper{		
			width: 360px;
			float: left;
		}

		.chk-content{
			margin-top: 2px;
			margin-left: 2px;
			display: inline-block;
		}

		.chkbox-line{
			display: block;
		}

		.select-multi{
			margin-left: 10px;
		}

		.total-box{
			margin-left: 10px;
			margin-top: 5px;
			font-weight: bold;
			display: inline-block;
		}

		.submit-btn{
			width: 100px;
		}

		.template-count{
			margin-left: 10px;
			margin-top: 5px;
			border: 1;
			border-style: solid;
			padding-left: 5px;
			padding-right: 5px;
		}

		#total, #form-total-payment {
			color: #FF0000;
			font-weight: 900;
		}

		</style>
	</head>

	<body>


<?php
$projectQuery = "SELECT * FROM projects WHERE name = '$selectedProject'";

$result = $con->query($projectQuery);

$row = $result->fetch_array();

$multilingual = $row["multilingual"] ? $productsDecoded[0]->productPrice : 0;
$analytics = $row["analytics"] ? $productsDecoded[1]->productPrice : 0;
$encryptioncert = $row["encryptioncert"] ? $productsDecoded[2]->productPrice : 0;
$hosting = $row["hosting"] ? $productsDecoded[3]->productPrice : 0;
$wordpress = $row["wordpress"] ? $cmsDecoded[0]->productPrice : 0;
$drupal = $row["drupal"] ? $cmsDecoded[1]->productPrice : 0;
$umbraco = $row["umbraco"] ? $cmsDecoded[2]->productPrice : 0;
$django = $row["django"] ? $cmsDecoded[3]->productPrice : 0;
$template = 0;
$landingpage = $row["landingpage"] ? $productsDecoded[5]->productPrice : 0;
$navigation = $row["navigation"] ? $productsDecoded[6]->productPrice : 0;
$productpage = $row["productpage"] ? $productsDecoded[7]->productPrice : 0;
$payment = 0;
$registration = $row["registration"] ? $productsDecoded[9]->productPrice : 0;
$contactform = $row["contactform"] ? $productsDecoded[10]->productPrice : 0;
$about = $row["about"] ? $productsDecoded[11]->productPrice : 0;


echo ("<form action='saveorderdeets.php' method='POST'>");
echo ("<fieldset>");
echo ("<legend>Project Details</legend>");

echo ("<input name='projectId' type='hidden' value=" . $row["project_id"] . "><br>");
echo ("<label class='form-label' id=''>Project Name: </label> <input name='projectName' style='width: 200px;' value='" . $row["name"] . "'><br>");
echo ("<label class='form-label' id=''>Contact number: </label> <input name='number' style='width: 200px;' value='" . $row["contactnumber"] . "'><br>");
echo ("<label class='form-label' id=''>Contact email: </label> <input name='email' value='" . $row["contactemail"] . "' style='width: 200px;'><br>");
echo ("<label class='form-label' id=''>Comments: </label> <input name='comment' value='" . $row["comments"] . "' style='width: 200px;'><br><br>");

echo ("<label class='form-label' id=''>Multilingual: </label><input name='multilingual' value=" . $row["multilingual"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Analytics: </label><input name='analytics' value=" . $row["analytics"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Encryption cert: </label><input name='encryptioncert' value=" . $row["encryptioncert"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Hosting: </label><input name='hosting' value=" . $row["hosting"] . " style='width: 100px;'><br><br>");

echo ("<label class='form-label' id=''>CMS </label><input name='cms' value=" . $row["cms"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Wordpress: </label><input name='wordpress' value=" . $row["wordpress"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Drupal: </label><input name='drupal' value=" . $row["drupal"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Umbraco: </label><input name='umbraco' value=" . $row["umbraco"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Django: </label><input name='django' value=" . $row["django"] . " style='width: 100px;'><br><br>");

echo ("<label class='form-label' id=''>Template </label><input name='template' value=" . $row["template"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Landing Page: </label><input name='landingpage' value=" . $row["landingpage"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Navigation: </label><input name='navigation' value=" . $row["navigation"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Product Page: </label><input name='productpage' value=" . $row["productpage"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Payment: </label><input name='payment' value=" . $row["payment"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Registration: </label><input name='registration' value=" . $row["registration"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>Contact Form: </label><input name='contactform' value=" . $row["contactform"] . " style='width: 100px;'><br>");
echo ("<label class='form-label' id=''>About: </label><input name='about' value=" . $row["about"] . " style='width: 100px;'><br><br>");

$total = $multilingual + $analytics + $encryptioncert + $hosting + $wordpress + $drupal + $umbraco + $django + $landingpage + $navigation + $productpage + $payment + $registration + $contactform + $about;

echo ('Total: $' . $total . ' CAD<br><br>');

echo ('<label class="form-label" id="">&nbsp;</label> <input type="submit" class="form-control submit-btn" value="Update" name="Update">');
echo ("</fieldset>");
echo ("</form>");



$con->close();
?>


	</body>
</html>