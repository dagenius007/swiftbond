<!DOCTYPE html>
<html lang="en">

<head>
	<title>MoneyTalks | Account Blocked</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="all">
	<!--// css -->
	<!-- font -->
	<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Popup-Box-JavaScript -->
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.gallery-grids a').Chocolat();
		});
	</script>
	<!-- //Popup-Box-JavaScript -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<script>
		function submitLogin() {
			var data = $("#login-form").serialize();
			$.ajax({
				type: 'POST',
				url: 'login.php',
				data: data,
				beforeSend: function() {

					$("#signinbtn").html('Signing in...');
				},
				success: function(response) {
					if (response == "Valid") {
						$("#signinbtn").fadeOut();
						$("#check-e").fadeOut();

						setTimeout('window.location.href="dashboard"', 2000);
					} else if (response == "Invalid") {
						$("#check-e").fadeIn(3000, function() {
							$("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">Incorrect username or password.</span>');
							$("#signinbtn").text('SIGN IN');
						});

					} else {
						$("#check-e").fadeIn(1000, function() {
							$("#check-e").html('<span style="color:rgb(198, 53, 53);font-family:calibri;font-size:13px">' + response + '</span>');
							$("#signinbtn").text('SIGN IN');
						});
					}


				}
			});
			return false;
		}
	</script>
</head>

<body>
	<div class="header">
		<div class="container">
			<div class="w3l_header_left">
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ (234) 90x xxx xxxx</li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:support@moneytalks.com.ng">support@moneytalks.com.ng</a></li>
				</ul>
			</div>

			<div class="w3l_header_right">
				<ul>
					<li><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign In</a></li>

				</ul>
			</div>

			<div class="clearfix"> </div>

		</div>
	</div>
	<div class="logo-navigation-w3layouts">
		<div class="container">
			<div class="logo-w3">
				<a href="#">
					<h1><img src="images/logo.png" alt=" " /><span>MoneyTalks</span></h1>
				</a>
			</div>
			<div class="navigation agileits w3layouts">
				<nav class="navbar agileits w3layouts navbar-default">
					<div class="navbar-header agileits w3layouts">
						<button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
							<span class="sr-only agileits w3layouts">Toggle navigation</span>
							<span class="icon-bar agileits w3layouts"></span>
							<span class="icon-bar agileits w3layouts"></span>
							<span class="icon-bar agileits w3layouts"></span>
						</button>
					</div>
					<div class="navbar-collapse agileits w3layouts collapse hover-effect" id="navbar">
						<ul class="agileits w3layouts">
							<li class="agileits w3layouts"><a href="#" class="active">Home</a></li>
							<li class="agileits w3layouts"><a class="scroll" href="#about">About</a></li>
							<li class="agileits w3layouts"><a class="scroll" href="#contact">Contact</a></li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div>
			<h1 style="margin-top:100px">Unfortunately, Your account has been blocked.</h1>
			<p>Contact <a href="mailto:support@moneytalks.com.ng">support@moneytalks.com.ng</a> to re-activate your account</p>
			<div class="w3l_header_right" style="text-align: center;margin-right:40%">
				<ul>
					<li><a style="color:white;border:black;background: black;margin-left: -200px" class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign In</a></li>

				</ul>
			</div>
		</div>
	</div>


	<div class="pop-up">
		<div id="small-dialog" class="mfp-hide book-form">
			<h3>Sign In </h3>
			<form action="#" method="post" name="login-form" id="login-form">
				<input type="text" name="email" class="email" placeholder="Email" required="" />
				<input type="password" name="password" class="password" placeholder="Password" required="" />
				<ul>
					<li>
						<input type="checkbox" id="brand1" value="">
						<label for="brand1"><span></span>Remember me</label>
					</li>
				</ul>
				<br><br>
				<p id="check-e"></p>
				<a onclick="submitLogin()" class="bttn" id="signinbtn" style="cursor:pointer;background:black">Sign In</a>
				<a href="#">Forgot Password?</a><br>
				<div class="clearfix"></div>

			</form>
		</div>
	</div>