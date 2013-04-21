<!DOCTYPE HTML>
<html>
	<head>
		<!-- Stylesheets -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="css/resume.css" type="text/css" />
		<link rel="stylesheet" href="css/resume.css" type="text/css" media="print" />
		<style>
			
		</style>
	</head>
	<body>
		<?
			function objectToArray($d) {
				if (is_object($d)) {
					// Gets the properties of the given object
					// with get_object_vars function
					$d = get_object_vars($d);
				}
		 
				if (is_array($d)) {
					/*
					* Return array converted to object
					* Using __FUNCTION__ (Magic constant)
					* for recursive call
					*/
					return array_map(__FUNCTION__, $d);
				}
				else {
					// Return array
					return $d;
				}
			}
		?>
		<?
			session_start();
			include_once('linkedin.php');
			$user = fetch('GET', '/v1/people/~:(firstName,lastName,phoneNumbers,emailAddress,positions,summary,pictureUrl)');
		?>
		<div id="civitas-resume-container" class="container">
			<img style="float: left; margin-right: 20px;" src="<? echo $user->pictureUrl; ?>" />
			<div id="civitas-resume-name">
				<? echo $user->firstName . ' ' . $user->lastName; ?>
			</div>
			<div id="civitas-resume-contactinfo">
                <? echo 'Email: ' . $user->emailAddress; ?><br />
                <? $phones = objectToArray($user->phoneNumbers); ?>
                <? echo 'Phone: ' . $phones['values'][0]['phoneNumber']; ?>
			</div>
			<div id="civitas-resume-summary">
				<? echo $user->summary; ?>
			</div>
			<div id="civitas-resume-positions">
				<?
				$positions = objectToArray($user->positions);
				foreach ($positions['values'] as $position) { ?>
				<div class="civitas-resume-position row">
					<div class="span1 civitas-resume-position-decoration"></div>
					<div class="span10 civitas-resume-position-information">
						<div class="civitas-resume-position-name"><? echo $position['title'] . ' at ' . $position['company']['name']; ?></div>
						<div class="civitas-resume-position-date"><? echo $position['startDate']['month'] . '/' . $position['startDate']['year'] . '-' . $position['endDate']['month'] . '/' . $position['endDate']['year']; ?></div>
						<div class="civitas-resume-position-summary"><? echo $position['summary']; ?></div>
					</div>
				</div>
				<? }
				?>
            </div>
            <div id="civitas-resume-questions">
            	<div class="civitas-resume-question">
            		<div class="civitas-resume-question-title">Why do you want to work in the social sector?</div>
                    <div class="civitas-resume-question-answer"><? echo $_POST[0]; ?></div>
            	</div>
            	<div class="civitas-resume-question">
            		<div class="civitas-resume-question-title">What is something now that you want to make ridiculous ten years from now?</div>
                    <div class="civitas-resume-question-answer"><? echo $_POST[1]; ?></div>
            	</div>
            	<div class="civitas-resume-question">
            		<div class="civitas-resume-question-title">What excites you about mankind?</div>
                    <div class="civitas-resume-question-answer"><? echo $_POST[2]; ?></div>
            	</div>
            	<div class="civitas-resume-question">
            		<div class="civitas-resume-question-title">Would you rather fight 100 duck sized horses or 1 horse sized duck?</div>
                    <div class="civitas-resume-question-answer"><? echo $_POST[3]; ?></div>
            	</div>
            </div>
            <div id="civitas-resume-companies">
                This is a list of organizations you are applying to for your own reference. It will not be shown on the application that is emailed out to organizations you have selected. 
                
                <? print_r($_POST); ?>
            </div>
            <button class="btn btn-info" script="alert(\"Thanks for submitting your application! Organizations will notify you if they are interested!\"); "class="btn">Submit</button> 
		</div>
	</body>
</html>
