module.exports = function(grunt) {
grunt.initConfig({
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
          require('cssnano')() // minify the result
        ]
      },
      dist: {
        files: [{
          expand: true,     // Enable dynamic expansion.
          cwd: 'css/src/',      // Src matches are relative to this path.
          src: ['*.css'],
          dest: 'css/dest/',   // Destination path prefix.
          ext: '.min.css',   // Dest filepaths will have this extension.
          extDot: 'first'   // Extensions in filenames begin after the second dot
        }]
      }
    },

    babel: {
      options: {
        sourceMap: true
      },
      dist: {
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
      files: ['js/src/*.js']
    },

    uglify: {
        options: {
          sourceMap: true
        },
        dist: {
          files: [{
            expand: true,
            cwd: 'js/dest/babelified',
            src: ['*.js'],
            dest: 'js/dest/ugly/',
            ext: '.js',
            extDot: 'first'
          }]
        }
    }
  });

  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['postcss', 'babel', 'jshint', 'uglify']);
};