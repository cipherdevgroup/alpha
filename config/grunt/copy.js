// https://github.com/gruntjs/grunt-contrib-copy
module.exports = {
	css: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.tmp %>',
				src: [
					'style*.css',
					'style*.map'
				],
				dest: '',
				filter: 'isFile'
			},
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.tmp %>',
				src: [
					'editor-style*.css',
					'editor-style*.map'
				],
				dest: 'css/',
				filter: 'isFile'
			},
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.bower%>',
				src: [
					'normalize-css/normalize.css',
					'sass-mediaqueries/_media-queries.scss'
				],
				dest: '<%= paths.authorAssets%>scss/vendor/'
			},
			{
				expand: true,
				flatten: false,
				cwd: '<%= paths.bower%>susy/sass/',
				src: [
					'*.scss',
					'**/*.scss'
				],
				dest: '<%= paths.authorAssets%>scss/vendor/susy/'
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
				dest: '<%= paths.authorAssets%>js/vendor/theme/'
			}
		]
	},
	fonts: {
		files: [
			{
				expand: true,
				flatten: true,
				src: [
					'<%= paths.authorAssets %>fonts/**/*',
					'<%= paths.bower %>fonts/**/*'
				],
				dest: 'fonts/'
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
		files: [
			{
				expand: true,
				flatten: false,
				cwd: '<%= paths.tmp %>images',
				src: [ '*', '*/**', '!screenshot.png'],
				dest: 'images',
				filter: 'isFile'
			},
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.tmp %>images',
				src: ['screenshot.png'],
				dest: '',
				filter: 'isFile'
			}
		]
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
