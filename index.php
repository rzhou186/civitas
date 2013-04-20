<!doctype html>
<html>

	<head>
		<title>Civitas PHP</title>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="stylesheets/fonts.css" type="text/css"/>
		<link rel="stylesheet" href="stylesheets/style.css" type="text/css"/>
		<style>
			#civitas-user {
				margin-top: 30px;
			}
		</style>

	</head>

	<? 
		session_start(); 
		include_once('linkedin.php');
	?>

	<body>
		<div class="container">		

			<!-- Topbar -->
			<div class="topbar">
				<div class="topbar-inner">
					<div class="pull-left">
						<div class="logo">
							<h1>C I V I T A S</h1>
						</div>
                    </div>
                    <div class="pull-right">
                    	<div id="civitas-user">
                    	<?
                    		if ($_SESSION['access_token']) {
			                 	$user = fetch('GET', '/v1/people/~:(firstName,lastName,emailAddress)');
	                     		print "Hello $user->firstName $user->lastName. $user->emailAddress"; ?>
	                     		<a href="logout.php">Logout</a>
	                     		<? 
                    		} else { ?>
                    			<a href="auth.php">Authorize with LinkedIn</a>
                    		<? }
                    	?>
                    	</div>
                    </div>
				</div>
			</div>

			<!-- Landing page -->
			<div class="landing-page">
				<div class="hero">
					<div class="hero-inner">
					</div>
				</div>

				<div class="options">
					<div class="row">
						<div class="span4">
							<div class="span4-inner">
								<img src="images/icons/apply.png">
								<h1>Apply</h1>
								<p>Lorem ipsum dolor sit amet. Duis faucibus, lacus in venenatis molestie, velit metus malesuada augue, at vehicula leo est sit amet mauris.</p>
								<button class="next-app-step btn btn-info btn-block">Open new application</button>
							</div>
						</div>
						<div class="span4">
							<div class="span4-inner">
								<img src="images/icons/discover.png">
								<h1>Discover</h1>
								<p>Lorem ipsum dolor sit amet. Duis faucibus, lacus in venenatis molestie, velit metus malesuada augue, at vehicula leo est sit amet mauris.</p>
								<button class="btn btn-info btn-block">Open new application</button>
							</div>
						</div>
						<div class="span4">
							<div class="span4-inner">
								<img src="images/icons/join.png">
								<h1>Join</h1>
								<p>Lorem ipsum dolor sit amet. Duis faucibus, lacus in venenatis molestie, velit metus malesuada augue, at vehicula leo est sit amet mauris.</p>
								<button class="btn btn-info btn-block">Open new application</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Selection page -->
			<div class="selection-page">

				<div class="subhead"></div>

				<div class="row">
					<div class="span4">
						<h1>O R G A N I Z A T I O N S</h1>
						<hr>
						<form>
							<div class="partner-list">
							</div>
							<input class="btn btn-info" type="submit" value="Apply">
						</form>
					</div>
					<div class="span8 description">
						<h1>Hello.</h1>
						<p>What's your name?</p>
					</div>
				</div>

			</div>

			<!-- Application page -->
			<div class="application-page">
			</div>

			<!-- Footer -->
			<img class="divider" src="images/other/divider.png">
			<div class="footer">
				<div class="footer-inner">
					<h1>A 
						<a href="http://www.github.com/rzhou186">Ray Zhou</a>, 
						<a href="http://www.rogr.me">Roger Chen</a>, and 
						<a href="http://www.github.com/gshubham">Shubham Goel </a>
						production.
					</h1>
					<p>Copyright &copy; 2013 Civitas. All rights reserved.</p>
				</div>
			</div>

		</div>
	</body>

	<!-- Javascripts -->
	<script src="javascripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="javascripts/variables.js" type="text/javascript"></script>
	<script src="javascripts/controller.js" type="text/javascript"></script>
	<script src="javascripts/companies.js" type="text/javascript"></script>
	<script src="javascripts/main.js" type="text/javascript"></script>
	<script src="javascripts/Base64.js" type="text/javascript"></script>
	<script src="javascripts/controller.js" type="text/javascript"></script>
	<script src="javascripts/companies.js" type="text/javascript"></script>

</html>
