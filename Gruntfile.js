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
		},

		copy: {
			readme: {
				src: 'README.md',
				dest: 'dist/<%= pkg.name %>/README.txt'
			},
			license: {
				src: 'license.txt',
				dest: 'dist/<%= pkg.name %>/'
			},
			php: {
				src: [ '*.php' ],
				dest: 'dist/<%= pkg.name %>/',
				filter: 'isFile',
				expand: true
			},
			style: {
				src: [ 'style.*css' ],
				dest: 'dist/<%= pkg.name %>/',
				filter: 'isFile',
				expand: true
			},
			css: {
				cwd: 'assets/css',
				src: [ '**' ],
				dest: 'dist/<%= pkg.name %>/assets/css',
				expand: true
			},
			js: {
				cwd: 'assets/js',
				src: [ '**' ],
				dest: 'dist/<%= pkg.name %>/assets/js',
				expand: true
			},
			inc: {
				cwd: 'inc',
				src: [ '**' ],
				dest: 'dist/<%= pkg.name %>/inc',
				expand: true
			},
			partials: {
				cwd: 'partials',
				src: [ '**' ],
				dest: 'dist/<%= pkg.name %>/partials',
				expand: true
			},
			templates: {
				cwd: 'page-templates',
				src: [ '**' ],
				dest: 'dist/<%= pkg.name %>/page-templates',
				expand: true
			},
		},

		compress: {
			build: {
				options: {
					archive: 'dist/<%= pkg.name %>.zip'
				},
				expand: true,
				cwd: 'dist/<%= pkg.name %>',
				src: '**/*'
			}
		},

		clean: {
			build: {
				src: [ 'dist/*' ]
			},
		},

	});

	grunt.registerTask('default', 'build');
	grunt.registerTask('build', ['newer:uglify', 'newer:cssmin', 'newer:less']);
	grunt.registerTask('dev', ['watch']);
	grunt.registerTask('dist', [ 'build', 'clean', 'copy', 'compress' ]);
};