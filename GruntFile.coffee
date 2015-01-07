"use strict"

module.export = (grunt) ->

	#Force use of unix newlines
	grunt.util.linefeed = '\n';

	grunt.initConfig
		pkg: grunt.file.readJSON("package.json")

		jshint: 
      		options:
        		jshintrc: ".jshintrc"      		
      		gruntfile: ["Gruntfile.js"]

    require("load-grunt-tasks")(grunt)

    grunt.registerTask "default", [ "jshint" ]