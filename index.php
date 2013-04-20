<!doctype html>
<html>

	<head>
		<title>Civitas</title>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="stylesheets/fonts.css" type="text/css"/>
		<link rel="stylesheet" href="stylesheets/style.css" type="text/css"/>
        <style>
            .partner:hover {
                color: #6778E6;
            }
            .description p {
                margin-top: 20px;
                line-height: 25px;
            }
			#civitas-user {
                margin-top: 20px;
                text-align: right;
			}
		</style>

	</head>

 	<? 
		//session_start(); 
		// include_once('linkedin.php');
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
	                     		print "Hello $user->firstName $user->lastName ($user->emailAddress) "; ?>
	                     		<br /><a href="logout.php">Logout</a>
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
								<p>Seeking a summer internship or job in the social sector? Apply to over 170 companies and nonprofit organizations with a single application.</p>
								<button class="next-app-step btn btn-info btn-block">Open new application</button>
							</div>
						</div>
						<div class="span4">
							<div class="span4-inner">
								<img src="images/icons/discover.png">
								<h1>Discover</h1>
								<p>Lorem ipsum dolor sit amet. Duis faucibus, lacus in venenatis molestie, velit metus malesuada augue, at vehicula leo est sit amet mauris.</p>
								<button class="btn btn-info btn-block" disabled="disabled">Browse organizations list</button>
							</div>
						</div>
						<div class="span4">
							<div class="span4-inner">
								<img src="images/icons/join.png">
								<h1>Join</h1>
								<p>Lorem ipsum dolor sit amet. Duis faucibus, lacus in venenatis molestie, velit metus malesuada augue, at vehicula leo est sit amet mauris.</p>
								<button class="btn btn-info btn-block" disabled="disabled">Become a partner</button>
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
						<div class="partners">
							<div class="partner-list"></div>
							<button class="btn btn-info next-app-step">Apply</button>
						</div>
					</div>
					<div class="span8 description">
						<p>Hover over our partner organizations to the left to learn more about them.</p>
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

</html>
