module.exports = function (grunt) {
  grunt.initConfig({
    postcss: {
      task: {
        options: {
          map: true,
          processors: [
            require('autoprefixer')({ browsers: 'last 2 versions' }), // add vendor prefixes
            require('cssnano')() // minify the result
          ]
        },
        files: [{
          expand: true,     // Enable dynamic expansion.
          cwd: '../assets/css/src/',      // Src matches are relative to this path.
          src: ['*.css'],
          dest: '../assets/css/dest/',   // Destination path prefix.
          ext: '.min.css',   // Dest filepaths will have this extension.
          extDot: 'first'   // Extensions in filenames begin after the second dot
        }]
      }
    },

    babel: {
      task: {
        options: {
          sourceMap: true
        },
        files: [{
          expand: true,
          cwd: 'js/src/',
          src: ['*.js'],
          dest: 'js/dest/babelified/',
          ext: '.js',
          extDot: 'first'
        }]
      }
    },

    jshint: {
      task: {
        files: ['js/src/*.js']
      }
    },

    uglify: {
      task: {
        options: {
          sourceMap: true
        },
        files: [{
          expand: true,
          cwd: 'js/dest/babelified',
          src: ['*.js'],
          dest: 'js/dest/ugly/',
          ext: '.js',
          extDot: 'first'
        }]
      }
    },

    imagemin: {
      jpgs: {
        options: {
          optimizationLevel: 3,
          progressive: true
        },
        files: [{
          expand: true,
          cwd: '../assets/images/',
          src: ['**/*.{png,jpg,jpeg,gif}'],
          dest: '../assets/images/dest/'
        }]
      }
    }
  });

  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  grunt.registerTask('default', ['postcss', 'babel', 'uglify', 'imagemin']);
};