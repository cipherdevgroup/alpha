/*jshint node:true */

module.exports = function( grunt ) {
	'use strict';

	var config = require( 'flagship-wp-theme-config' );
	require( 'load-flagship-grunt-config' )( grunt, config ).init({
		pkg: grunt.file.readJSON( 'package.json' )
	});
};
