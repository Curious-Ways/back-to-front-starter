module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {

      options: {
        livereload: true,
      },
      php: {
        files: ['**/*.php'],
        options: {
          livereload: true,
        }
      },
      css: {
        files: ['**/*.scss'],
        tasks: ['compass', 'autoprefixer','cssmin', 'cssshrink']
      },

      scripts: {
        files: ['assets/js/scripts.js'],
        tasks: ['uglify']
      },

    }, // watch ends

    uglify: {
      dev: {
        options: {
          mangle: true
        },
        files: {
          'assets/js/scripts.min.js': 'assets/js/scripts.js'
        }
      }
    },

    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'assets/css',
          src: ['*.css', '!*.min.css'],
          dest: 'assets/css',
          ext: '.min.css'
        }]
      }
    },

    cssshrink: {
      options: {
        log: false
      },
      your_target: {
        files: {
          'assets/css': ['assets/css/global.min.css']
        }
      }
    },

    compass: {
      dist: {
        options: {
          sassDir: 'assets/scss',
          cssDir: 'assets/css',
          outputStyle: 'expanded'
        }
      }
    },


    autoprefixer: {
      options: {
        //  map: true
      },
      single_file: {
        options: {
          // Target-specific options go here.
        },
        src: 'assets/css/global.css',
        //dest: '_/css/screen.css'
      },
    },

  });

  // Load the Grunt plugins.
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-cssshrink');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Register the default tasks.
  grunt.registerTask('default',['watch']);

};