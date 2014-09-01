/*!
 * LearnLaravel Gruntfile
 * @author Nirmal Thapa
 */
 
'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {

	/**
	 * Configuration
	 */
	grunt.initConfig({


		/**
		 * Get package meta data
		 */
		pkg: grunt.file.readJSON('package.json'),


		/**
		 * Set project object
		 */
		project: {
		  app: 'app',								// app/
		  assets: '<%= project.app %>/assets',		// app/assets
		  src: '<%= project.assets %>/src',			// app/assets/src
		  css: [
		    '<%= project.src %>/scss/style.scss'	// app/assets/src/scss/style.scss
		  ],
		  js: [
		    '<%= project.src %>/js/*.js'			// app/assets/src/scss/js/*.js
		  ]
		},

		/**
		 * Project banner
		 */
		tag: {
		  banner: '/*!\n' +
		          ' * <%= pkg.name %>\n' +
		          ' * @author <%= pkg.author %>\n' +
		          ' * @version <%= pkg.version %>\n' +
		          ' */\n'
		},


		// Uglify
		uglify: {
		  options: {
		    banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
		  },
		  build: {
		    src: '<%= project.src %>/js/<%= pkg.name %>.js',
		    dest: '<%= project.src %>/js/<%= pkg.name %>.min.js'
		  }
		},



		/**
		 * Sass
		 */
		sass: {
		  dev: {
		    options: {
		      style: 'expanded',
		      banner: '<%= tag.banner %>',
		      compass: true
		    },
		    files: {
		      '<%= project.assets %>/css/style.css': '<%= project.css %>'
		    }
		  },
		  dist: {
		    options: {
		      style: 'compressed',
		      compass: true
		    },
		    files: {
		      '<%= project.assets %>/css/style.css': '<%= project.css %>'
		    }
		  }
		},	


		/**
		 * Watch
		 */
		watch: {
		  sass: {
		    files: '<%= project.src %>/scss/{,*/}*.{scss,sass}',
		    tasks: ['sass:dev']
		  }
		}			

	 
	});
	//===== grunt configuration ====

	//Loading the Grunt plugins
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	/**
	 * Default task
	 * Run `grunt` on the command line
	 */
	grunt.registerTask('default', [
	  'sass:dev',
	  'watch'
	]);	
 
};