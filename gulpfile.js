/*////////////////////////////////////////////////////
    MODULES, ERRORS, FILES
*/////////////////////////////////////////////////////

// Set this to true if you want to use production, then run gulp build
var production = false;

// MODULES
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var browsersync  = require('browser-sync').create();
var util         = require('gulp-util');
var plumber      = require('gulp-plumber');
var inject       = require('gulp-inject');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var gulpif       = require('gulp-if');
var concat       = require('gulp-concat');
var uglify       = require('gulp-uglify');
var newer        = require('gulp-newer');

// ERRORS
var onError = function (err) {
     util.beep();
     util.log(util.colors.green(err));
     this.emit('end'); // allows to continue after error
};

// FILES
var mainSassFile    = 'assets/sass/style.scss';
var jsFiles         = 'assets/js/*.js';
var combinedJsFiles = 'dist/all.js';
var htmlFiles       = 'index.php'; // for all your views and stuff
var mainHtmlFile    = 'index.php';

/*////////////////////////////////////////////////////
    TASKS
*/////////////////////////////////////////////////////

// Serves a server and watches sass + html + js files
gulp.task('serve', function(){
    browsersync.init({
        proxy: "http://localhost/portfolio/"
    });

    gulp.watch(['assets/sass/*/*.scss', 'assets/sass/style.scss'], ['sass']);
    gulp.watch(htmlFiles, ['html']);
    // gulp.watch(jsFiles, ['inject']);
});

// SASS
gulp.task('sass', function() {
    return gulp.src(mainSassFile)
        .pipe(plumber(onError))
        .pipe(sourcemaps.init())
        .pipe(gulpif(production, sass({
            outputStyle: 'compressed'
        })))
        .pipe(gulpif(!production, sass({
            outputStyle: 'expanded'
        })))
        .pipe(sourcemaps.write({includeContent: false})) // autoprefix doesnt work if this isnt here
        .pipe(sourcemaps.init({loadMaps: true}))         // autoprefix doesnt work if this isnt here
        .pipe(autoprefixer({
            browser: ['last 2 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./dist'))
        .pipe(browsersync.stream());
});

// JS
gulp.task('js', function(){
    gulp.src(jsFiles)
        .pipe(concat('all.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/'));

    return gulp.src(mainHtmlFile) // Should DRY this up with inject task
            .pipe(inject(gulp.src(combinedJsFiles, {
                read: false
            })))
            .pipe(gulp.dest('./'));
});

// INJECT
gulp.task('inject', function(){
    return gulp.src(mainHtmlFile)
            .pipe(inject(gulp.src(jsFiles, {
                read: false
            })))
            .pipe(gulp.dest('./'));
});

// HTML
gulp.task('html', function() {
    browsersync.reload();
});

// DEFAULT TASK
gulp.task('default', ['serve']);

// BUILD TASK
gulp.task('build', ['sass', 'js', 'html']);