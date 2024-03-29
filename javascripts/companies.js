/*
 * File: companies.js
 * ----------------------------------------
 * Defines functions for retrieving, sending, and managing company information.
 * Note that companyData is defined in main.js.
 * 
 */

function make_base_auth(user, password) {
  var tok = user + ':' + password;
  var hash = Base64.encode(tok);
  return hash;
}

/* Company data returned. This function adds the data to a list/some structure */
function companyEvent(data) {
	var obj = jQuery.parseJSON(data);
	var company = {
		name : obj[0][1].company_name,
		description : obj[0][2].company_description,
		url : obj[0][3].company_url,
		image : obj[0][4].company_image,
		location : obj[0][5].company_location
	};
	
	// Display the company in the description page
	// NOTE: This really is not a long-term solution
	$('.description').html(
		'<h1>' + '<a href = "' + company.url + '">' + company.name + '</a></h1>' + '<h4 style = "color:grey">' + company.location + '</h4>' +
		'<p>' + company.description + '</p>'
	);

}

/* Job data returned. This function adds the data to a list/some structure */
function jobEvent(data) {
	console.log(data);
}

/* All jobs for a given company returned. This function adds the data to a list/some structure */
function allJobsFromID(data) {
	console.log(data);
}

/* All companies returned . This function adds the data to a list/some structure */
function allCompanies(data) {
	var obj = jQuery.parseJSON(data);
	for (var i = 0; i < obj.length; i++) {
		var company = {
			id : obj[i][0].company_id,
			name : obj[i][1].company_name,
			description : obj[i][2].company_description,
			url : obj[i][3].company_url,
			image : obj[i][4].company_image,
			location : obj[i][5].company_location
		};
		companyData.push(company);
	}

	// Display the company names in the sidebar
	// NOTE: This really is not a long-term solution
	$('.partner-list').html('');
	for (var i=0; i<companyData.length; i++){
		$('.partner-list').append(
			'<div class="partner">' + 
				'<input type="checkbox" value="' + companyData[i].name + '">' + 
				'<div class="partner-name" id="' + companyData[i].id + '">' + 
					companyData[i].name + 
				'</div>' + 
			'</div>'
		);
	}
	// Make the newly append names clickable
	initCompanyDescrips();

}

/* make AJAX request to get company data from a given ID */
function appendCompanyDescrip(companyID){

	var form_data = {
		id : companyID
	};
	var company;
	var request = $.ajax({
		url: "http://goodjobs.rogr.me/api/company.php",
		type: "GET",
		data: form_data,
		success: function(data){
			companyEvent(data);
		}
	});

}

/* make AJAX request to get job data from a given ID */
function getJobById(jobID){

	var form_data = {
		id : jobID
	};

	var request = $.ajax({
		url: "http://goodjobs.rogr.me/api/job.php",
		type: "GET",
		data: form_data,
		success: function(data){
			jobEvent(data);
		}
	});

}

/* get all job data for a given company */
function getAllJobs(companyID) {

	var form_data = {
		id : companyID
	};

	var request = $.ajax({
		url: "http://goodjobs.rogr.me/api/jobs.php",
		type: "GET",
		data: form_data,
		success: function(data){
			allJobsFromID(data);
		}
	});

}

/* make AJAX request to get data for all companies */
function appendAllCompanies() {
	/*var auth = make_base_auth('bbrandt@guidestar.org', 'gu1d3st@r');
	var url = 'https://data.guidestar.org/v1/search/?q=zip:10027';*/
	var request = $.ajax({
		url : "http://goodjobs.rogr.me/api/list-companies.php",
		type: "GET",
		/*beforeSend : function(req) {
			req.setRequestHeader('Authorization', auth);
		},*/
		success: function(data){
			allCompanies(data);
		}
	});
	
}

/* adds the given company (name, description, url) to the database */
function addCompany(company_name, company_description, company_url) {

	var form_data  = {
		company_name : company_name,
		company_description : company_description,
		company_url : company_url
	};

	var request = $.ajax({
		url: "http://goodjobs.rogr.me/api/add-company.php",
		type: "POST",
		data :  form_data,
		success: function(data){
			allCompanies(data);
		}
	});

}