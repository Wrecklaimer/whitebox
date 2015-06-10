module.exports = function(grunt) {
	require('jit-grunt')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Uglify JavaScript files
		uglify: {
			options: {
				preserveComments: 'some'
			},
			build: {
				src: 'assets/js/scripts.js',
				dest: 'assets/js/scripts.min.js'
			}
		},

		// Minify CSS files
		cssmin: {
			minify: {
				expand: true,
				cwd: 'assets/css/',
				src: ['*.css', '!*.min.css'],
				dest: 'assets/css/',
				ext: '.min.css'
			}
		},

		// Build LESS files
		less: {
			development: {
				options: {
					compress: true,
					yuicompress: true,
					optimization: 2
				},
				files: {
					"style.min.css" : "style.less"
				}
			}
		},

		// Watch for changes to source files
		watch: {
			scripts: {
				files: ['assets/js/*.js'],
				tasks: ['newer:uglify'],
				options: {
					spawn: false
				}
			},
			css: {
				files: ['assets/css/*.css', '!css/*.min.css'],
				tasks: ['newer:cssmin:minify'],
				options: {
					spawn: false
				}
			},
			style: {
				files: ['style.less', '!style.min.css'],
				tasks: ['newer:less'],
				options: {
					spawn: false
				}
			}
		}

	});

	grunt.registerTask('default', ['newer:uglify', 'newer:cssmin', 'newer:less']);
	grunt.registerTask('dev', ['watch']);
};