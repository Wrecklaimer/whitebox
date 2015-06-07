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
				dest: 'css/',
				ext: '.min.css'
			},
			style: {
				expand: true,
				cwd: '',
				src: ['style.css', '!style.min.css'],
				dest: '',
				ext: '.min.css'
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
				files: ['style.css', '!style.min.css'],
				tasks: ['newer:cssmin:style'],
				options: {
					spawn: false
				}
			}
		}

	});

	grunt.registerTask('default', ['newer:uglify', 'newer:cssmin']);
	grunt.registerTask('dev', ['watch']);
};