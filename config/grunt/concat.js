// https://github.com/gruntjs/grunt-contrib-concat
module.exports = {
	js: {
		files: [
			{
				src: [
					'<%= paths.jsVend %>theme/**/*.js',
					'<%= paths.jsSrc %>mobileMenu.js',
					'<%= paths.jsSrc %>theme.js',
					'<%= paths.jsSrc %>theme-init.js'
				],
				dest: '<%= paths.js %>theme.js'
			}
		]
	}
};
