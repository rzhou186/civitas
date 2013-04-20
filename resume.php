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
			$user = fetch('GET', '/v1/people/~:(firstName,lastName,emailAddress,positions,summary)');
		?>
		<div id="civitas-resume-container" class="container">
			<div id="civitas-resume-name">
				<? echo $user->firstName . ' ' . $user->lastName; ?>
			</div>
			<div id="civitas-resume-contactinfo">
				<? echo 'Email: ' . $user->emailAddress; ?>
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
		</div>
	</body>
</html>