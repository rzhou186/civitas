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
	var currStep = 0;
	// Enable next-step buttons
	$('.next-app-step').click(function(){
		currStep++;
		advanceAppStep(currStep);
	});

});

/* This function advances the client to the next phase of his/her application */
function advanceAppStep(currStep){

	// if (currStep === )

}
