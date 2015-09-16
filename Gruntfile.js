module.exports = function(grunt) {

    var rootDir = 'global';

    grunt.initConfig({

        concat: {
            js: {
                files: [
                    {
                        src: [
                             rootDir + '/ng/app.js'
                            ,rootDir + '/ng/directives/*.js'
                            ,rootDir + '/ng/factory/*.js'
                            ,rootDir + '/ng/service/*.js'
                            ,rootDir + '/ng/controller/*.js'
                        ],
                        dest: rootDir + '/build/app.js'
                    },
                    {
                        src: [
                             rootDir + '/ng/login.js'
                            ,rootDir + '/ng/factory/*.js'
                            ,rootDir + '/ng/controller/userController.js'
                            ,rootDir + '/ng/service/userService.js'
                        ],
                        dest: rootDir + '/build/login.js'
                    }
                ]
            }

            //,css: {
            //    files: [
            //        {
            //            src: [rootDir + '/css/style.css', rootDir + '/css/datepicker.css'],
            //            dest: rootDir + '/build/css/style.css'
            //        },
            //        {
            //            src: [rootDir + '/css/html5/**.css', rootDir + '/css/html5/*/**.css'],
            //            dest: rootDir + '/build/css/bh5.css'
            //        }
            //    ]
            //}
        },

        uglify: {

            js: {
                files: [
                    {
                        src: [rootDir + '/build/app.js'],
                        dest: rootDir + '/build/app.min.js'
                    },
                    {
                        src: [rootDir + '/build/login.js'],
                        dest: rootDir + '/build/login.min.js'
                    }
                ]
            }
        }



    });

    //grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-contrib-cssmin');
    //grunt.loadNpmTasks('grunt-angular-gettext');
    //grunt.loadNpmTasks('grunt-potomo');



    grunt.registerTask('build', ['concat', 'uglify']);





};