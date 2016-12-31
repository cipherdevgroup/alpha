// https://github.com/gruntjs/grunt-contrib-copy
module.exports = {
	css: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.bower%>',
				src: [
					'normalize-css/normalize.css',
					'sass-mediaqueries/_media-queries.scss'
				],
				dest: '<%= paths.cssSrc%>vendor/'
			},
			{
				expand: true,
				flatten: false,
				cwd: '<%= paths.bower%>susy/sass/',
				src: [
					'*.scss',
					'**/*.scss'
				],
				dest: '<%= paths.cssSrc%>vendor/susy/'
			}
		]
	},
	js: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.bower%>',
				src: [
					'skip-link-focus/skip-link-focus.js',
					'fitvids/jquery.fitvids.js',
					'accessible-menu/dist/jquery.accessible-menu.js'
				],
				dest: '<%= paths.jsSrc%>vendor/theme/'
			}
		]
	},
	fonts: {
		files: [
			{
				expand: true,
				flatten: true,
				src: [
					'<%= paths.fontsSrc %>**/*'
				],
				dest: '<%= paths.fonts %>'
			},
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.bower%>',
				src: [
					'themicons/dist/fonts/*',
					'!themicons/dist/fonts/*.html'
				],
				dest: '<%= paths.fonts %>'
			}
		]
	},
	php: {
		files: [
			{
				expand: true,
				cwd: '<%= paths.composer %>wpsitecare/carelib',
				src: ['**/*'],
				dest: 'includes/vendor/carelib'
			},
			{
				expand: true,
				cwd: '<%= paths.composer %>zamoose/themehookalliance',
				src: ['tha-theme-hooks.php'],
				dest: 'includes/vendor/'
			}
		]
	},
	images: {
		files: []
	},
	languages: {
		files: [
			{
				expand: true,
				cwd: '<%= paths.assets %><%= paths.languages %>',
				src: ['*.po'],
				dest: '<%= paths.theme%><%= paths.languages %>',
				filter: 'isFile'
			}
		]
	}
};
