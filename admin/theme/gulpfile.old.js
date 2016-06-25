/**
 * Runs the init for gulp javascript files and css files
 */
// Include Gulp
var gulp = require('gulp');
var gutil = require("gulp-util");
var notify = require("gulp-notify");
var sass = require("gulp-sass");
var cleanCSS = require('gulp-clean-css');
var watch = require('gulp-watch');
var batch = require('gulp-batch');

//Include plugins
var plugins = require("gulp-load-plugins")({
	pattern: ['gulp-*', 'gulp.*', 'main-bower-files'],
	replaceString: /\bgulp[\-.]/
});

var config = {
    bowerDir: './bower_components',
    destDir: '../docroot/'
}

// Update the bower components
gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

// Save the icons for font-awesome
gulp.task('icons', function() {
	gutil.log("\n  Saving FA Fonts...");
    gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(config.destDir + '/fonts'));

	gutil.log("\n  Saving Bootstrap Fonts...");
	gulp.src(config.bowerDir + '/bootstrap-sass/assets/fonts/bootstrap/**.*')
		.pipe(gulp.dest(config.destDir + '/fonts/bootstrap'));
});

// Compile the javascript files
gulp.task('js', function() {
	
	var jsFiles = ['src/js/pnotify/pnotify.custom.min.js',
	               'src/js/rad/jquery.rad.js', 
	               'src/js/jquery.number.min.js',
	               'src/js/slick-grid-1.4/lib/jquery.event.drag.min.2.0.js', 
	               'src/js/slick-grid-1.4/slick.model.rad.js',
	               'src/js/slick-grid-1.4/slick.pager.rad.js',
	               'src/js/slick-grid-1.4/slick.columnpicker.rad.js',
	               'src/js/slick-grid-1.4/slick.grid.rad.js',
	               'src/js/slick-grid-1.4/jquery.slickgrid.rad.js',
	               'src/js/app.js'];
	
	
	var files = plugins.mainBowerFiles('**/*.js').concat(jsFiles);
	
	gutil.log(files);
	
	var src = gulp.src(files)
		.pipe(plugins.concat('main.js'))
		.pipe(gulp.dest(config.destDir + '/js'))
		.pipe(plugins.jshint())
		.pipe(plugins.uglify())
		.pipe(plugins.rename({ extname: '.min.js' }))
		.pipe(gulp.dest(config.destDir + '/js'));
		
});

//Compile the css files
gulp.task('css', function() {
	
	var jsFiles = ['src/js/pnotify/pnotify.custom.min.css',
	               'src/js/slick-grid-1.4/css/*.css', 
	               'src/css/skins/skin-blue.css', 
	               'src/css/AdminLTE.css', 
	               'src/css/main.scss'];
	
	var files = plugins.mainBowerFiles(['**/*.{scss,css,sass}']).concat(jsFiles);
	
	gutil.log(files);
	
	var src = gulp.src(files)
		.pipe(sass({
            style: 'compressed',
            loadPath: [
                './src/css/main.scss',
                config.bowerDir + '/bootstrap-sass/assets/stylesheets/',
                config.bowerDir + '/font-awesome/scss',
            ]
        }).on("error", notify.onError(function (error) {
                return "Error: " + error.message;
        })))
		.pipe(plugins.concat('main.css'))
		.pipe(gulp.dest(config.destDir + '/css'))
		.pipe(cleanCSS())
		.pipe(plugins.rename({ extname: '.min.css' }))
		.pipe(gulp.dest(config.destDir + '/css'));
	
	gutil.log('Completed with main css compilation');
		
});

//Compile the css files for the login page
gulp.task('login', function() {
	
	var jsFiles = ['src/js/pnotify/pnotify.custom.min.css',
	               'src/js/slick-grid-1.4/css/*.css', 
	               'src/css/skins/skin-blue.css',
	               'src/css/AdminLTE.css', 
	               'src/css/login.scss'];
	
	var files = plugins.mainBowerFiles(['**/*.{scss,css,sass}']).concat(jsFiles);
	
	gutil.log(files);
	
	var src = gulp.src(files)
		.pipe(sass({
            style: 'compressed',
            loadPath: [
                './src/css/login.scss',
                config.bowerDir + '/bootstrap-sass/assets/stylesheets/',
                config.bowerDir + '/font-awesome/scss',
            ]
        }).on("error", notify.onError(function (error) {
                return "Error: " + error.message;
        })))
		.pipe(plugins.concat('login.css'))
		.pipe(gulp.dest(config.destDir + '/css'))
		.pipe(cleanCSS())
		.pipe(plugins.rename({ extname: '.min.css' }))
		.pipe(gulp.dest(config.destDir + '/css'));
	
	gutil.log('Completed with login css compilation');
});

gulp.task('watch', function () {
    watch('**/login.scss', batch(function (events, done) {
        gulp.start('login', done);
    }));
    watch('**/main.scss', batch(function (events, done) {
        gulp.start('css', done);
    }));
});

//Default task to run (runs js and css compilation
gulp.task('build', ['js', 'css', 'login']);

// Default task to run (runs js and css compilation
gulp.task('default', ['js', 'css', 'login', 'icons']);