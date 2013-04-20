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
		
		$('.landing-page').hide();

		// Append all companies to the selection page sidebar
		// Note: companyData is the global array defined (and modified) in companies.js functions
		$('.selection-page').fadeIn('slow');
		appendAllCompanies();

	}

	else if (currStep === 2) {
		
		$('.selection-page').hide();

		// Add all companies selected to clientCompanies (defined in variables.js)
		var checkboxes = $('.partner-list :checkbox');

		for (var i=0; i<checkboxes.length; i++){
			if (checkboxes[i].checked === true){
				clientCompanies.push(checkboxes[i].value);
			}
		}

		$('.application-page').fadeIn('slow');
        $('html, body').animate({scrollTop:0}, 'slow');

	}
	else if (currStep === 3) {
		var q1 = $('#q1').val();
		var q2 = $('#q2').val();
		var q3 = $('#q3').val();
		var q4 = $('#q4').val();
		var form_data = {
		q1 : q1,
		q2 : q2,
		q3 : q3,
		q4 : q4
	};
		var request = $.ajax({
		url : "resume",
		type: "POST",
		data : form_data,
		success: function(data){
			allCompanies(data);
		}
	});
	}

}
