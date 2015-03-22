<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

<?php
	include("nav.php")
?>

<style>
		body {
				background-color: #D6EBF2;
			}

		h2 {
			text-align: center;
			padding: 20px 0 20px 0;
		}

		.wrap {
			display: inline;
		  position: relative;
		  width: 120px;
		  height: 120px;
		  margin: 50px auto;
		}

		.clsFront {
		  -webkit-animation: toFront 618ms 1;
		  transition: z-index 618ms;
		  -webkit-animation-fill-mode: forwards;
		  z-index: 10;
		}

		.clsBack {
		  -webkit-animation: toBack 618ms 1;
		  transition: z-index 618ms;
		  -webkit-animation-fill-mode: forwards;
		  z-index: -10;
		}

		@-webkit-keyframes toFront {
		  0% {
		    transform: translateX(0) rotate(0deg);
		  }
		  50% {
		    transform: translateX(40px) rotate(45deg);
		  }
		  100% {
		    transform: translateX(0) scale(1) rotate(0deg);
		  }
		}
		@-webkit-keyframes toBack {
		  0% {
		    transform: translateX(0) rotate(0deg);
		  }
		  50% {
		    transform: translateX(-40px) rotate(-45deg);
		  }
		  100% {
		    transform: translateX(0) scale(0.9) rotate(0deg);
		  }
		}

		#fiesta, #edge, #f350, #focus, #superduty, #escape {
			width: 15%;
			float: left;
			margin-right: 10px;
			height: 200px;
		}

		.toggleMeAlt1, .toggleMeAlt2, .toggleMeAlt3, .toggleMeAlt4, .toggleMeAlt5, .toggleMeAlt6 {
			position: relative; 
			top: -150px
		}

		.button1, .button2, .button3, .button4, .button5, .button6 {
			margin-bottom: 10px;
		}

		img {
			width: 150px;
			height: 150px;
		}

	</style>

</head>

<body>
	<div class="rainbow">
		<h2>Ford - built without a bailout.</h2>
			<div class="wrap">
				<div id="fiesta">
					<button class="button1">Click!</button>
					<div class="toggleMe1"><img src="images/fiesta1.jpg"></div>
					<div class="toggleMeAlt1"><img src="images/fiesta.jpg"></div>				  
				</div>
				<div id="edge">
					<button class="button2">Click!</button>
					<div class="toggleMe2"><img src="images/mustang1.jpg"></div>
					<div class="toggleMeAlt2"><img src="images/edge.jpg"></div>				  
				</div>
				<div id="f350">
					<button class="button3">Click!</button>
					<div class="toggleMe3"><img src="images/fusion1.jpg"></div>
					<div class="toggleMeAlt3"><img src="images/350.jpg"></div>				  
				</div>
				<div id="focus">
					<button class="button4">Click!</button>
					<div class="toggleMe4"><img src="images/focus1.jpg"></div>
					<div class="toggleMeAlt4"><img src="images/focus.jpg"></div>				  
				</div>
				<div id="superduty">
					<button class="button5">Click!</button>
					<div class="toggleMe5"><img src="images/taurus1.jpg"></div>
					<div class="toggleMeAlt5"><img src="images/superduty.jpg"></div>				  
				</div>
				<div id="escape">
					<button class="button6">Click!</button>
					<div class="toggleMe6"><img src="images/cmax1.jpg"></div>
					<div class="toggleMeAlt6"><img src="images/escape.jpg"></div>				  
				</div>				
			</div>
	</div>

<?php
	// include("footer.php")
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" ></script>

<script>
	var nClicks = 0;

		$('.button1').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMeAlt1').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMe1').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMeAlt1').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMe1').removeClass('clsBack').addClass('clsFront');
			}
		});

		$('.button2').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMe2').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMeAlt2').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMe2').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMeAlt2').removeClass('clsBack').addClass('clsFront');
			}
		});

		$('.button3').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMe3').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMeAlt3').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMe3').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMeAlt3').removeClass('clsBack').addClass('clsFront');
			}
		});

		$('.button4').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMe4').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMeAlt4').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMe4').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMeAlt4').removeClass('clsBack').addClass('clsFront');
			}
		});

		$('.button5').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMe5').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMeAlt5').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMe5').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMeAlt5').removeClass('clsBack').addClass('clsFront');
			}
		});

		$('.button6').click( function() {
			++nClicks;
			if (nClicks % 2 == 0) {
			  $('.toggleMe6').removeClass('clsBack').addClass('clsFront');
			  $('.toggleMeAlt6').removeClass('clsFront').addClass('clsBack');
			} else {
			  $('.toggleMe6').removeClass('clsFront').addClass('clsBack');
			  $('.toggleMeAlt6').removeClass('clsBack').addClass('clsFront');
			}
		});

</script>

</body>
</html>

<?php
	include ("footer.php")
?>
