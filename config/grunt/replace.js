// https://github.com/outaTiME/grunt-replace
module.exports = {
	// Useful when forking this project into a new project
	packagename: {
		options: {
			patterns: [
				{
					match: /alpha/g,
					replacement: '<%= package.name %>'
				},
				{
					match: /Alpha/g,
					replacement: '<%= package.capitalname %>'
				}
			]
		},
		files: [
			{
				expand: true,
				src: [
					'**/*.{php,scss,css,js,html,txt,md,json}',
					'!<%= paths.bower %>**/*',
					'!<%= paths.composer %>**/*',
					'!node_modules/**',
					'!bower_components/**',
					'!.sass-cache/**',
					'!dist/**',
					'!logs/**',
					'!tmp/**'
				]
			}
		]
	}
};
