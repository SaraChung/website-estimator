<?php
	include("nav.php")
?>

<head>
	<style>
		body {
			background-color: #0e83cd
		}

		h2 {
			margin: 0 auto;
			padding: 20px 0 20px 0;
			width: 400px;
		  font-size: 36px;
		  text-align: center;
		  font-family: 'Lato', sans-serif;
		  color: whiteSmoke;
		}

		.buttonyes, .buttonno {
		  background: #5a34d9;
		  border-radius: 20px;
		  font-family: Arial;
		  color: #ffffff;
		  font-size: 15px;
		  padding: 10px 20px 10px 20px;
		  text-decoration: none;
		}

		.button:hover {
		  background: #793cfc;
		  cursor: pointer;
		}
		
		#container {
		  height: 350px;
		  margin: 0 auto;
		  overflow: hidden;
		  position: relative;
		  top: -20px;
		  width: 326px;
		}

		#container div { 
			position: absolute; 
		}

		/* Pouring the liquid in */

		.pour {
		  position: absolute;
		  left: 45%;
		  width: 20px;
		  top: -40px;
		  height: 0px;
		  background-color: #edaf32;
		  border-radius: 10px
		}

		/* Beaker */

		#beaker {
		  border: 10px solid #FFF;
		  border-top: 0;
		  border-radius: 0 0 30px 30px;
		  height: 300px;
		  left: 14px;
		  bottom: 0;
		  width: 300px;
		}

		#beaker:before,
		#beaker:after {
		  border: 10px solid #FFF;
		  border-bottom: 0;
		  border-radius: 30px 30px 0 0;
		  height: 30px;
		  position: absolute;
		  top: -40px;
		  width: 30px;
		}

		#beaker:before { 
			left: -50px; 
		}

		#beaker:after { 
			right: -50px; 
		}

		/* Liquid */

		#liquid {
		  background-color: #edaf32;
		  border: 10px solid #edaf32;
		  border-radius: 0 0 20px 20px;
		  bottom: 0;
		  height: 0px;
		  overflow: hidden;
		  width: 280px;
		}

		#liquid:after {
		  background-color: rgba(255, 255, 255, 0.25);
		  bottom: -10px;
		  height: 200px;
		  left: -40px;
		  position: absolute;
		  transform: rotate(30deg);
		  -webkit-transform: rotate(15deg);
		  width: 110px;
		}

		/* Bubbles */

		#liquid .bubble {
		  -webkit-animation-name: bubble;
		  -webkit-animation-iteration-count: infinite;
		  -webkit-animation-timing-function: linear;
		  background-color: rgba(255, 255, 255, 0.2);
		  bottom: 0;
		  border-radius: 10px;
		  height: 20px;
		  width: 20px;
		}

		@-webkit-keyframes bubble {
		  0% { bottom: 0; }
	    50% {
	      background-color: rgba(255, 255, 255, 0.2);
	      bottom: 150px;
	    }
	    100% {
	      background-color: rgba(255, 255, 255, 0);
	      bottom: 300px;
	    }
		}

		.bubble1 {
		  left: 10px;
		  -webkit-animation-delay: 1000ms;
		  -webkit-animation-duration: 1000ms;
		}

		.bubble2 {
		  left: 70px;
		  -webkit-animation-delay: 700ms;
		  -webkit-animation-duration: 1100ms;
		}

		.bubble3 {
		  left: 110px;
		  -webkit-animation-delay: 1200ms;
		  -webkit-animation-duration: 1300ms;
		}

		.bubble4 {
		  left: 160px;
		  -webkit-animation-delay: 1100ms;
		  -webkit-animation-duration: 700ms;
		}

		.bubble5 {
		  left: 220px;
		  -webkit-animation-delay: 1300ms;
		  -webkit-animation-duration: 1200ms;
		}

		.bubble6 {
		  left: 240px;
		  -webkit-animation-delay: 1100ms;
		  -webkit-animation-duration: 700ms;
		}

		/* Foam */

		.beer-foam {
		  position: absolute;
		  bottom: 10px;
		  left: 4px;
		}

		.foam-1, .foam-2, .foam-3, .foam-4, .foam-5, 
		.foam-6, .foam-7, .foam-8, .foam-9, .foam-10 {
		  float: left;
		  position: absolute;
		  z-index: 999;
		  width: 50px;
		  height: 50px;
		  border-radius: 30px;
		  background-color: #fefefe;
		}

		.foam-1 {
		  top: -30px;
		  left: -10px;
		}
		.foam-2 {
		  top: -35px;
		  left: 20px; 
		}
		.foam-3 {
		  top: -25px;
		  left: 50px; 
		}
		.foam-4 {
		  top: -35px;
		  left: 80px; 
		}
		.foam-5 {
		  top: -30px;
		  left: 110px; 
		}
		.foam-6 {
		  top: -20px;
		  left: 140px; 
		}
		.foam-7 {
		  top: -30px;
		  left: 160px;
		}

		.foam-8 {
		  top: -25px;
		  left: 1800px; 
		}
		.foam-9 {
		  top: -35px;
		  left: 200px; 
		}
		.foam-10 {
		  top: -29px;
		  left: 233px;
		}
	
		/* Drinkforyou? Text */

		.animated {
		  -webkit-animation-fill-mode:both;		  
		  -webkit-animation-duration:5s;		  
		  -webkit-animation-delay:3.5s; 
		}

		.animated.drunk {
		  -webkit-animation-duration:2s;
		}

		@-webkit-keyframes drunk {
			0% { 
		    -webkit-transform: rotate(0); 
		    -webkit-transform-origin: top left; 
		    -webkit-animation-timing-function: ease-in-out; 
		  }
		  
		  20%, 60% { 
		    -webkit-transform: rotate(80deg); 
		    -webkit-transform-origin: top left; 
		    -webkit-animation-timing-function: ease-in-out; 
		  }	
			40% { 
		    -webkit-transform: rotate(60deg); 
		    -webkit-transform-origin: top left; 
		    -webkit-animation-timing-function: ease-in-out; 
		  }	
		  
			80% { 
		    -webkit-transform: rotate(60deg) translateY(0);  
		    -webkit-transform-origin: top left; 
		    -webkit-animation-timing-function: ease-in-out;
		    opacity: 1;
		  }	
		  
			100% {
			  -webkit-transform: translateY(700px); 
		    opacity: 0; 
		  }
		}

		.drunk {
			-webkit-animation-name: drunk;
		}

	</style>
</head>

<body>

<h2 class="animated drunk">Drink for you?</h2>

	<div id="container">
	  <div class="pour"></div>
		  <div id="beaker">

		    <div class="beer-foam">
		      <div class="foam-1"></div>
		      <div class="foam-2"></div>
		      <div class="foam-3"></div>
		      <div class="foam-4"></div>
		      <div class="foam-5"></div>
		      <div class="foam-6"></div>
		      <div class="foam-7"></div>
		      <div class="foam-8"></div>
		      <div class="foam-9"></div>
		      <div class="foam-10"></div>
		    </div>
		    
		    <div id="liquid">	      
		      <div class="bubble bubble1"></div>
		      <div class="bubble bubble2"></div>
		      <div class="bubble bubble3"></div>
		      <div class="bubble bubble4"></div>
		      <div class="bubble bubble5"></div>
		      <div class="bubble bubble6"></div>
		    </div>

		  </div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" ></script>

	<script>

		$(document).ready(function() {
		  $('.pour')
		    .delay(2000)
		    .animate({height: '430px'}, 1500)
		    .delay(1600)
		    .slideUp(500);
		  
		  $('#liquid')
		    .delay(3400)
		    .animate({height: '300px'}, 2500);
		  
		  $('.beer-foam')
		    .delay(3400)
		    .animate({bottom: '290px'}, 2500);   
		});

	</script>

</body>

<?php
	include("footer.php")
?>