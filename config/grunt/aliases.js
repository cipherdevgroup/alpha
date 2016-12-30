module.exports = function() {
	'use strict';
	var tasks = {
		'build:dependencies:fonts': [
			'clean:fonts',
			'copy:fonts'
		],
		'build:dependencies:css': [
			'clean:css',
			'copy:css'
		],
		'build:dependencies:js': [
			'clean:js',
			'copy:js'
		],
		'build:dependencies:php': [
			'clean:php',
			'newer:copy:php'
		],
		'build:fonts': [
			'build:dependencies:fonts'
		],
		'build:css': [
			'build:dependencies:css',
			'newer:sass',
			'newer:postcss',
			'newer:rtlcss',
			'newer:cssmin'
		],
		'build:images': [
			'newer:imagemin:images'
		],
		'build:js': [
			'build:dependencies:js',
			'newer:concat:js',
			'newer:uglify'
		],
		'build:js:dist': [
			'build:dependencies:js',
			'newer:concat:js'
		]
	};

	return tasks;
};
