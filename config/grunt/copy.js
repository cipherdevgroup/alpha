// https://github.com/gruntjs/grunt-contrib-copy
module.exports = {
	css: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.node %>',
				src: [
					'normalize.css/normalize.css',
					'sass-mediaqueries/_media-queries.scss'
				],
				dest: '<%= paths.cssVend %>',
				rename: function( dest, src ) {
					return dest + src.replace( '.css', '.scss' );
				}
			},
			{
				expand: true,
				flatten: false,
				cwd: '<%= paths.node %>susy/sass/',
				src: [
					'*.scss',
					'**/*.scss'
				],
				dest: '<%= paths.cssVend %>susy/'
			},
			{
				expand: true,
				flatten: false,
				cwd: '<%= paths.node %>ionicons/scss',
				src: [
					'*.scss',
					'**/*.scss'
				],
				dest: '<%= paths.cssVend %>ionicons/'
			}
		]
	},
	js: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: '<%= paths.node %>',
				src: [
					'skip-link-focus/skip-link-focus.js',
					'vanilla-fitvids/jquery.fitvids.js',
					'accessible-menu/dist/jquery.accessible-menu.js'
				],
				dest: '<%= paths.jsVend %>theme/'
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
				cwd: '<%= paths.node %>',
				src: [
					'ionicons/fonts/*'
				],
				dest: '<%= paths.fonts %>'
			}
		]
	},
	php: {
		files: [
			{
				expand: true,
				cwd: '<%= paths.node %>carelib',
				src: ['**/*'],
				dest: '<%= paths.phpVend %>carelib/'
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
				dest: '<%= paths.theme %><%= paths.languages %>',
				filter: 'isFile'
			}
		]
	}
};
