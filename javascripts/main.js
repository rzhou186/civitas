/*
 * File: main.js
 * ----------------------------------------
 * Initializes web application.
 * 
 */
$(document).ready(function(){

	// This variable tracks the current page of the client
	// 0 = landing page; 1 = selection page; 2 = application page
	// We might want to stash this variable in cookies later
	var currStep = 1;
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
		
		$('.selection-page').show();
	}

	else if (currStep === 2) {
		$('.application-page').show();
	}

}
