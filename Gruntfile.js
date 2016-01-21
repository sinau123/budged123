module.exports = function(grunt) {
 
    // Project configuration.
    grunt.initConfig({
 
        //Read the package.json (optional)
        pkg: grunt.file.readJSON('package.json'),
 
        // Metadata.
        meta: {
            basePath: '../',
            srcPath: 'web/',
            deployPath: 'web/'
        },
 
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
                '* Copyright (c) <%= grunt.template.today("yyyy") %> ',
 
        // Task configuration.
        // concat: {
        //     options: {
        //         stripBanners: true
        //     },
        //     dist: {
        //         src: ['<%= meta.srcPath %>js/main.js', '<%= meta.srcPath %>js/less.js'],
        //         dest: '<%= meta.deployPath %>scripts/app.js'
        //     }
        // }
        concat: { css: { src: [ 'web/css/*' ], dest: 'web/script/combined.css' }, 
                    js : { src : [ 'web/js/*' ], dest : 'web/script/combined.js' } },
        cssmin: {
                css: {
                    src: 'web/script/combined.css',
                    dest: 'web/script/css/combined.min.css'
                }
        },
        uglify: {            
                js: {
                    src: 'web/script/combined.js',
                    dest: 'web/script/js/combined.min.js'
                },
        },
    });
 
    // These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-concat'); 
    grunt.loadNpmTasks('grunt-contrib-uglify'); 
    grunt.loadNpmTasks('grunt-contrib-watch'); 
    grunt.loadNpmTasks('grunt-contrib-cssmin'); 
    grunt.registerTask('default', [ 'concat:css', 'cssmin:css', 'concat:js','uglify' ]);
 
    // Default task
    // grunt.registerTask('default', ['concat','uglify']);
 
};