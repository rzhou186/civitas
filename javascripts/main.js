/*
 * File: main.js
 * ----------------------------------------
 * Initializes web application.
 * 
 */
$(document).ready(function(){

	currStep = 0;
	displayCurrStep(currStep);

	// Enable next-step buttons
	$('.next-app-step').click(function(){
		currStep++;
		displayCurrStep(currStep);
	});

});

/* This function advances the client to the next phase of his/her application */
function displayCurrStep(currStep){

	if (currStep === 0) {
		$('.landing-page').fadeIn('slow');
	}

	else if (currStep === 1) {
		
		$('.landing-page').fadeOut('fast');

		// Append all companies to the selection page sidebar
		// Note: companyData is the global array defined (and modified) in companies.js functions
		$('.selection-page').fadeIn('slow');
		appendAllCompanies();

	}

	else if (currStep === 2) {
		
		$('.selection-page').fadeOut('fast');

		// Add all companies selected to clientCompanies (defined in variables.js)
		var checkboxes = $('.partner-list :checkbox');

		for (var i=0; i<checkboxes.length; i++){
			if (checkboxes[i].checked === true){
				clientCompanies.push(checkboxes[i].value);
			}
		}

<<<<<<< HEAD
		$('.application-page').fadeIn('slow');
=======
		$('.application-page').show();
        $('html, body').animate({scrollTop:0}, 'slow');

>>>>>>> be3f583e6fc8ab151105439f93368101b21e5d94
	}

}
