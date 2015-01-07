"use strict"

module.exports = (grunt) ->

	#Force use of unix newlines
	grunt.util.linefeed = '\n';

	grunt.initConfig
		jshint:
      		options:
        		jshintrc: ".jshintrc"
      		gruntfile: ["Gruntfile.js"]
      	pkg: grunt.file.readJSON("package.json")
	
	require("load-grunt-tasks")(grunt)
	grunt.registerTask "default", [ "jshint" ]
	return