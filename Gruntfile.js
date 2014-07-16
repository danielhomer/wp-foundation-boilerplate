module.exports = function(grunt) {
 
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      production: {
        options: {
          outputStyle: 'compact'
        },
        files: {
          'style.css': 'assets/scss/style.scss'
        } 
      }
    },

    uglify: {
      options: {
        mangle: {
          except: ['jQuery']
        }
      },
      production: {
        files: {
          'assets/scripts/min/jquery.min.js' : 'bower_components/jquery/dist/jquery.js',
          'assets/scripts/min/vendor.min.js' : [
          'bower_components/modernizr/modernizr.js',
          'bower_components/jquery.cookie/jquery.cookie.js',
          'bower_components/jquery-placeholder/jquery.placeholder.js',
          'bower_components/fastclick/lib/fastclick.js',
          'bower_components/foundation/js/foundation.js',
          ],
          'assets/scripts/min/home.min.js' : ['assets/scripts/home.js'],
          'assets/scripts/min/core.min.js' : ['assets/scripts/core.js']
        }
      }
    },

    watch: {
      grunt: { 
        files: ['Gruntfile.js'],
        tasks: ['sass', 'uglify']
      },

      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass']
      },

      uglify: {
        files: 'assets/scripts/*.js',
        tasks: ['uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass', 'uglify']);
  grunt.registerTask('default', ['build','watch']);

};