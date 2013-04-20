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


function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default, if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        //if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("textarea");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         //}
    }

    document.body.appendChild(form);
    form.submit();
}

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
		var form_data = new Array();
		var q1 = $('#q1').val();
		var q2 = $('#q2').val();
		var q3 = $('#q3').val();
		var q4 = $('#q4').val();
		form_data.push(q1);
		form_data.push(q2);
		form_data.push(q3);
		form_data.push(q4);
		post_to_url("resume", form_data, "POST");
	}

}
