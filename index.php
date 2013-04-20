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
            .application-question {
                font-size: 2em;
                margin: 20px 0px;
            }
            .application-answer {
                width: 100%;
                font-size: 1.4em;
                height: 200px;
            }
			#civitas-user {
                margin-top: 20px;
                text-align: right;
			}
		</style>

	</head>

 	<? 
		//session_start(); 
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
						<div class="partners">
							<div class="partner-list"></div>
							<button class="btn btn-info next-app-step">Apply</button>
						</div>
					</div>
					<div class="span8 description">
					</div>
				</div>

			</div>

			<!-- Application page -->
            <div class="application-page">

            <div class="application-question">Why do you want to work in the social sector?</div>
            <textarea id="q1" class="application-answer"></textarea>

            <div class="application-question">What is something now that you want to make ridiculous ten years from now?</div>
            <textarea id="q2" class="application-answer"></textarea>

            <div class="application-question">What excites you about mankind?</div>
            <textarea id="q3" class="application-answer"></textarea>

            <div class="application-question">Would you rather fight 100 duck sized horses or 1 horse sized duck?</div>
            <textarea id="q4" class="application-answer"></textarea>

            <button class="btn btn-info next-app-step">Confirm</button>

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
