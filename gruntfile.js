/*jshint node:true */

module.exports = function( grunt ) {
	'use strict';

	var config = require( 'sitecare-theme-config' );
	require( 'load-project-config' )( grunt, config ).init({
		pkg: grunt.file.readJSON( 'package.json' )
	});
};
