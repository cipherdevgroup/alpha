// https://github.com/gruntjs/grunt-contrib-concat
module.exports = {
	js: {
		files: [
			{
				src: [
					'<%= paths.authorAssets %>/js/vendor/theme/**/*.js',
					'<%= paths.authorAssets %>js/mobileMenu.js',
					'<%= paths.authorAssets %>js/theme.js'
				],
				dest: 'js/theme.js'
			}
		]
	}
};
