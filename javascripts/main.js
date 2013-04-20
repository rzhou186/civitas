/*
 * File: main.js
 * ----------------------------------------
 * Initializes web application.
 * 
 */
$(document).ready(function(){

	currStep = 1;
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
		$('.landing-page').show();
	}

	else if (currStep === 1) {
		
		$('.landing-page').hide();

		// Append all companies to the selection page sidebar
		// Note: companyData is the global array defined (and modified) in companies.js functions
		$('.selection-page').show();
		appendAllCompanies();

	}

	else if (currStep === 2) {
		
		// Add all companies selected to clientCompanies (defined in variables.js)
		var checkboxes = $('.partner-list :checkbox');

		for (var i=0; i<checkboxes.length; i++){
			if (checkboxes[i].checked === true){
				clientCompanies.push(checkboxes);
			}
		}

		$('.application-page').show();
	}

}