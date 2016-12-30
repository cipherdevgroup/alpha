// https://github.com/gruntjs/grunt-contrib-concat
module.exports = {
	js: {
		files: [
			{
				src: [
					'<%= paths.jsSrc %>vendor/theme/**/*.js',
					'<%= paths.jsSrc %>mobileMenu.js',
					'<%= paths.jsSrc %>theme.js'
				],
				dest: '<%= paths.js %>theme.js'
			}
		]
	}
};
