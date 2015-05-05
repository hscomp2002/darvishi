/*jslint  browser: true, white: true, plusplus: true */
/*global $, countries */

$(function () {
    'use strict';

    var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });

   



    // Initialize autocomplete with local lookup:
    $('#autocomplete').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        autoSelectFirst: true,
        onSelect: function (suggestion) {
            $('#source').val(suggestion.data);
        }, 
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'شهری با این نام وجود ندارد',
        groupBy: 'category'
    });
    $('#autocomplete1').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        autoSelectFirst: true,
        onSelect: function (suggestion) {
            $('#destination').val(suggestion.data);
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'شهری با این نام وجود ندارد',
        groupBy: 'category'
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});