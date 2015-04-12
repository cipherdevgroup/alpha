// https://github.com/gruntjs/grunt-contrib-concat
module.exports = {
	js: {
		src: [
			'<%= paths.bower %>/js/concat/**/*.js',
			'<%= paths.authorAssets %>js/mobileMenu.js',
			'<%= paths.authorAssets %>js/theme.js'
		],
		dest: 'js/theme.js'
	}
};
