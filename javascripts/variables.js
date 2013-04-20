/*
 * File: variables.js
 * ----------------------------------------
 * Defines global variables for other Javascript files.
 * 
 */

// This variable tracks the current page of the client
// 0 = landing page; 1 = selection page; 2 = application page
// We might want to stash this variable in cookies later
var currStep = 0;

// This variable stashes all of our company data
var companyData = new Array();

// This variable stashes the companies that the client is applying to
var clientCompanies = new Array();