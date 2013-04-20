/*
 * File: controller.js
 * ----------------------------------------
 * Defines functions for initializing and controlling dynamic page elements.
 * 
 */

function initCompanyDescrips() {
	$('.partner .partner-name').hover(function(){
		var id = $(this).attr('id');
		appendCompanyDescrip(id);
	});
}