<?php
	include("nav.php")
?>

<head>
	<style>

		body {
			background-color: #D6EBF2;
		}

		.nyancat {
			width: 300px;
			height: 100px;
			-webkit-animation-name: movenyancat;
			-webkit-animation-duration: 4s;
			-webkit-animation-iteration-count: 200;
			-webkit-animation-timing-function: ease-in;
			-webkit-animation-direction: alternate;
		}

		@-webkit-keyframes movenyancat {
			from {transform: translate(0);}
			to {transform: translate(1200px);}
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

<img src="http://img3.wikia.nocookie.net/__cb20140627073036/animaljam/images/d/d5/Nyan-cat_zps4adb5b0e.png" class="nyancat">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


	$con = new mysqli("localhost","root","root","website_estimator");
	 if (mysqli_connect_errno())
	   {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
		$result_set = $con->query("SELECT project_id, name FROM projects");

		$costs = $con->query("SELECT * FROM costs");
			$featureCosts = array();
				while($row = $costs->fetch_row()) {
					$name = $row[1];
					$cost = $row[2];
					$featureCosts[ $name ] = $cost;
					// echo("$name = " . $featureCosts[ $name ] . "<br>");
				}

			// $landingPagePrice = 111;		
			$multilingualPrice = $featureCosts[ 'multilingual' ];
			$analyticsPrice = $featureCosts[ 'analytics' ];
			$encryptioncertPrice = $featureCosts[ 'encryptioncert' ];
			$hostingPrice = $featureCosts[ 'hosting' ];
			$wordpressPrice = $featureCosts[ 'wordpress' ];
			$drupalPrice = $featureCosts[ 'drupal' ];
			$umbracoPrice = $featureCosts[ 'umbraco' ];
			$djangoPrice = $featureCosts[ 'django' ];
			$landingpagePrice = $featureCosts[ 'landingpage' ];
			$navigationPrice = $featureCosts[ 'navigation' ];
			$productpagePrice = $featureCosts[ 'productpage' ];
			$paymentPrice = $featureCosts[ 'payment' ];
			$registrationPrice = $featureCosts[ 'registration' ];
			$contactformPrice = $featureCosts[ 'contactform' ];
			$aboutPrice = $featureCosts[ 'about' ];
?>

<form id='projectForm' action='getorderdeets.php' action='POST'>
	<fieldset>
		<legend>Existing Orders</legend>
			<select id="project" name='project' style="display: block, margin-left: 20px;">

				<?php
					while($row = $result_set->fetch_row()) {
						echo("<option>" . $row[1] . "</option>");
					}
					mysqli_close($con);
				?>

			</select>
	</fieldset>
</form>

<form action="neworder.php" method="post">

<fieldset>
<legend>New Order</legend>

	<label class="form-label" id="">Project Name</label>
		<input type="text" class="form-control" name="name" placeholder="Name"><br>
	<label class="form-label" id="">Contact Number</label>
		<input type="number" class="form-control" name="number" placeholder="123-456-7890"><br>
	<label class="form-label" id="">Contact Email</label>
		<input  type="email" class="form-control" name="email" placeholder="green@hive.ca"><br>

		
	<label class="form-label" id="">Features</label>
	
		<div class="chkbox-wrapper">
			<div class="chkbox-line">
				<input type="checkbox" class="chkbox form-control" name="chkbox[]" value="0"> 
				<span class="chk-content">Multilingual : $<?php echo( "$multilingualPrice" )?> CAD</span>
			</div>
			<div class="chkbox-line">
				<input type="checkbox" class="chkbox form-control" name="chkbox[]" value="1"> 
				<span class="chk-content">Analytics : $<?php echo( "$analyticsPrice" )?> CAD</span>
			</div>
			<div class="chkbox-line">
				<input type="checkbox" class="chkbox form-control" name="chkbox[]" value="2"> 
				<span class="chk-content">Encryption Cert (SSL) : $<?php echo( "$encryptioncertPrice" )?> CAD</span>
			</div>
			<div class="chkbox-line">
				<input type="checkbox" class="chkbox form-control" name="chkbox[]" value="3"> 
				<span class="chk-content">Hosting : $<?php echo( "$hostingPrice" )?> CAD</span>
			</div>
			
			<div class="chkbox-line">
				<input type="checkbox" class="chkbox form-control" name="chkbox[]" value="4"> <span class="chk-content">CMS</span>
					<select id="select-multi" class="select-multi" multiple name="cms_options[]" style="display: block;">
						<option value="0">Wordpress (PHP) - $<?php echo( "$wordpressPrice" )?> CAD</option>
						<option value="1">Drupal (PHP) - $<?php echo( "$drupalPrice" )?> CAD</option>
						<option value="2">Umbraco (ASP.net) - $<?php echo( "$umbracoPrice" )?> CAD</option>
						<option value="3">Django (Python) - $<?php echo( "$djangoPrice" )?> CAD</option>
					</select>			
			</div>

			<br>

			<div class="chkbox-line">
			 <span class="template-count">0</span> <span class="chk-content">Templates</span>				
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="5"> 
					<span class="chk-content">Landing Page : $<?php echo( "$landingpagePrice" )?> CAD </span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="6"> 
					<span class="chk-content">Navigation : $<?php echo( "$navigationPrice" )?> CAD</span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="7"> 
					<span class="chk-content">Product Page : $<?php echo( "$productpagePrice" )?> CAD</span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="8"> 
					<span class="chk-content">Shopping Cart / Payment : $<?php echo( "$paymentPrice" )?> CAD</span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="9"> 
					<span class="chk-content">Registration / Profile : $<?php echo( "$registrationPrice" )?> CAD</span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="10"> 
					<span class="chk-content">Contact Form : $<?php echo( "$contactformPrice" )?> CAD</span>
				</div>
				<div class="chkbox-line">
					<input data-type="templates" type="checkbox" class="chkbox form-control" name="chkbox[]" value="11"> 
					<span class="chk-content">About : $<?php echo( "$aboutPrice" )?> CAD</span>
				</div>
			</div>			
			
		</div>
		<br>
		
	<label class="form-label" id="total">Total</label><span id="form-total-payment" class="total-box">$0 CAD</span><br>		
		
	<label class="form-label" id="">Comments</label><textarea rows="7" cols="30" name="comment"></textarea><br>
	
	<label class="form-label" id="">&nbsp;</label> <input type="submit" class="form-control submit-btn" value="Submit" name="Submit"><br>
	
</fieldset>
	
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" ></script>

<script>

	$('#project').click(function(){
		$('#projectForm').submit();
	});

	var products = [
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
];
	
var cms = [
  {"productId":"1", "productName":"Wordpress (PHP)", "productPrice":"5000"},
	{"productId":"2", "productName":"Drupal (PHP)", "productPrice":"7000"},
  {"productId":"3", "productName":"Umbraco (ASP.net)", "productPrice":"10000"},
	{"productId":"4", "productName":"Django (Python)", "productPrice":"10000"}
];


  $(document).ready(function() {
	  $('.chkbox, #select-multi').click( function() {		  
		  var curTotal = 0;		  
			$("input:checkbox:checked").each(function() {					
				var chkboxValue = products[$(this).val()]['productPrice'];			
				curTotal += parseInt(chkboxValue);			
				if(chkboxValue == '0')
				$('#select-multi option:selected').each(function() {
					curTotal += parseInt(cms[$(this).val()]['productPrice']);
				});
			});

			$('.template-count').html($('[data-type="templates"]:checked').length);
			$('#form-total-payment').html('$' + curTotal + ' CAD');		
	  });   
  });

</script>

<?php
	include("footer.php")
?>

</body>
</html>