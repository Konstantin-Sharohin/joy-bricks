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
        src: ['css/*.css'],
        dest: 'css/dest/styles.min.css'
      }
    },

    babel: {
      options: {
        sourceMap: true
      },
      dist: {
        files: [{
          expand: true,     // Enable dynamic expansion.
          cwd: 'js/src/',      // Src matches are relative to this path.
          src: ['*.js'],
          dest: 'js/dest/',   // Destination path prefix.
          ext: '.js',   // Dest filepaths will have this extension.
          extDot: 'first'   // Extensions in filenames begin after the first dot
        }]
      }
    },

    jshint: {
      files: ['js/dest/*.js']
    },

    uglify: {
        options: {
          mangle: true,
          sourceMap: true,
          sourceMapName: 'js/dest/sourcemap.map'
        },
        dist: {
          files: [{
            expand: true,     // Enable dynamic expansion.
            cwd: 'js/dest/',      // Src matches are relative to this path.
            src: ['*.js'],
            dest: 'js/dest/ugly/',   // Destination path prefix.
            ext: '.js',   // Dest filepaths will have this extension.
            extDot: 'first'   // Extensions in filenames begin after the first dot
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