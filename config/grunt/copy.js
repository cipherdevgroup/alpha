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
			}
		]
	},
	fonts: {
		files: [
			{
				expand: true,
				flatten: true,
				src: [
					'<%= paths.authorAssets %>fonts/**/*'
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
				flatten: true,
				cwd: '<%= paths.tmp %>images',
				src: ['*', '!screenshot.png'],
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
	},
	bowercss: {
		files: [
			{
				expand: true,
				cwd: 'bower_components/wp-normalize.scss/',
				src: ['_wp-normalize.scss'],
				dest: '<%= paths.bower%>scss/'
			}
		]
	},
	bowerjs: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: 'bower_components/',
				src: [
					'skip-link-focus/skip-link-focus.js',
					'fitvids/jquery.fitvids.js',
					'accessible-menu/dist/jquery.accessible-menu.js',
					'sidr/jquery.sidr.min.js'
				],
				dest: '<%= paths.bower%>js/concat'
			}
		]
	},
	bowerfonts: {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: 'bower_components/themicons/src/',
				src: ['**/*'],
				dest: '<%= paths.bower%>icons/webfont',
				rename: function( dest, src ) {
					'use strict';
					return dest + '/' + src.replace( 'themicons_', '' );
				}
			}
		]
	}
};
