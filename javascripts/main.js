/*
 * File: main.js
 * ----------------------------------------
 * Initializes web application.
 * 
 */

$("#company").click(function(){
	alert("Here");
	getCompanyById(1);
 });

 function companyEvent(data) {
 	console.log(data);
 	alert(data);
 }

 function getCompanyById(ID){

	var form_data = {
		id : ID
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