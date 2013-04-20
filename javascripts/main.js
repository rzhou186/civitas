/*
 * File: main.js
 * ----------------------------------------
 * Initializes web application.
 * 
 */

$("#company").click(function(){
	
 });

 /* Company data returned. This function adds the data to a list/some structure */

 function companyEvent(data) {
 	console.log(data);
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
 	console.log(data);
 }

 /* make AJAX request to get company data from a given ID */
 function getCompanyById(companyID){

	var form_data = {
		id : companyID
	};

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
function getAllCompanies() {

		var request = $.ajax({
		url: "http://goodjobs.rogr.me/api/list-companies.php",
		type: "GET",
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

