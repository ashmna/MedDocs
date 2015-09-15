module.exports = function(grunt) {

    var rootDir = 'global';

    grunt.initConfig({

        concat: {
            js: {
                files: [
                    {
                        src: [rootDir + '/ng/*.js', rootDir + '/ng/**/*.js'],
                        dest: rootDir + '/ng/build/app.js'
                    },
                    {
                        src: [rootDir + '/ng/*.js', rootDir + '/ng/**/*.js'],
                        dest: rootDir + '/ng/build/login.js'
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
                        src: [rootDir + '/ng/build/app.js'],
                        dest: rootDir + '/ng/build/app.min.js'
                    },
                    {
                        src: [rootDir + '/ng/build/login.js'],
                        dest: rootDir + '/ng/build/login.min.js'
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