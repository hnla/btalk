/* jshint node:true */
/* global module */
module.exports = function(grunt) {
	var WORKING_DIR = 'community/',
					MAIN_WORKING_DIR = 'assets/',

		BP_NTP_CSS = [
			'**/*.css'
		],

		WP_NTP_CSS = [
			'css/*.css'
		],

		BP_NTP_EXCLUDED_CSS = [
			'!**/*-rtl.css',
			'!**/*.min.css'
		],

		WP_NTP_EXCLUDED_CSS = [
			'!css/*-rtl.css',
			'!css/*.min.css'
		],

		BP_NTP_JS = [
			'**/*.js',
			'!**/*.min.js'
		],

		stylelintConfigCss  = require('stylelint-config-wordpress/index.js'),
		stylelintConfigScss = require('stylelint-config-wordpress/scss.js');

	require( 'matchdep' ).filterDev( 'grunt-*' ).forEach( grunt.loadNpmTasks );

	grunt.initConfig( {
		pkg: grunt.file.readJSON('package.json'),

		rtlcss: {
			options: {
				opts: {
					processUrls: false,
					autoRename: false,
					clean: true
				},
				saveUnmodified: false
			},
			buildrtlwp: {
				expand: true,
				cwd: MAIN_WORKING_DIR,
				dest: MAIN_WORKING_DIR,
				extDot: 'last',
				ext: '-rtl.css',
				src: WP_NTP_CSS.concat( WP_NTP_EXCLUDED_CSS )
			}
		},
		sass: {

			options: {
				outputStyle: 'expanded',
				unixNewlines: true,
				indentType: 'tab',
				indentWidth: '1',
				indentedSyntax: false
			},
		wp: {
				cwd: MAIN_WORKING_DIR,
				extDot: 'last',
				expand: true,
				ext: '.css',
				flatten: true,
				src: [
					'sass/core-styles.scss',
					'sass/site-layout.scss'
					],
				dest: MAIN_WORKING_DIR + 'css/'
			}
		},
		stylelint: {
			css: {
				options: {
					config: stylelintConfigCss,
					format: 'css'
				},
				expand: true,
				cwd: WORKING_DIR,
				src: [
					'css/*.css',
					'!css/*.min.css'
				]
			},
			wpscss: {
				options: {
					config: stylelintConfigScss,
					format: 'scss'
				},
				expand: true,
				cwd: MAIN_WORKING_DIR,
				src: [
					'sass/*.scss',
					'sass/*/*.scss',
					'sass/*/*/*.scss'
				]
			},
			scss: {
				options: {
					config: stylelintConfigScss,
					format: 'scss'
				},
				expand: true,
				cwd: WORKING_DIR,
				src: [
					'sass/*.scss',
					'common-styles/*.scss',
					'sass/*.scss'
				]
			}
		},
		cssmin: {
			minify: {
				cwd: WORKING_DIR,
				dest: WORKING_DIR,
				extDot: 'last',
				expand: true,
				ext: '.min.css',
				src: [
					'css/*.css',
					'!css/*.min.css'
				]
			}
		},
		watch: {
			config: {
				files: 'Gruntfile.js'
			},
			wp: {
				files: [
					'assets/sass/*.scss',
					'assets/sass/*/*.scss',
					'assets/sass/*/*/*.scss'
					],
				tasks: 'sass'
			}
		},
	});

	// Lint CSS & JavaScript
	grunt.registerTask( 'lint', ['stylelint'] );

	// Build CSS & JavaScript
	grunt.registerTask( 'build', [ 'rtlcss', 'cssmin' ] );

	// Default task(s).
	grunt.registerTask( 'default', 'Runs the default Grunt tasks', [ 'checkDependencies', 'lint', 'build' ] );
};
