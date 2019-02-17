// load modules
const gulp = require('gulp');
const del = require('del');
const livereload = require('gulp-livereload');
const htmlmin = require('gulp-htmlmin');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const csso = require('gulp-csso');
const sourcemaps = require('gulp-sourcemaps');

// declare functions
// delete all the assets in public
function assetsClean(done) {
    return del(
        ['public/**/*', '!public/**/*.css'], 
        { force: true }
    );
}
 
// Copy all assets from src/assets into public
function assetsPublish(done) {
    return gulp.src('src/assets/**/*')
      .pipe(gulp.dest('public'));
}

function jsPublish(done) {
    return gulp.src('src/assets/**/*.js')
    .pipe(gulp.dest('public'));
}

// function vendorPublish(done) {
//   return gulp.src('vendor/**')
//   .pipe(gulp.dest('public'));
// }

// publish HTML files
function htmlPublish(done) {
    return gulp.src('src/assets/**/*.php')
      .pipe(htmlmin({ collapseWhitespace: true, ignoreCustomFragments: [ /<%[\s\S]*?%>/, /<\?[=|php]?[\s\S]*?\?>/ ] }))
      
      .pipe(gulp.dest('public'))
      .pipe(livereload());
}

// compile SCSS files
function scssCompile(done) {
    return gulp.src('src/scss/**/*.scss')
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      }))
    //   .pipe(csso())
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('public/css'))
      .pipe(livereload());
}
 
// watch files
function watchFiles(done) {
    gulp.watch("src/assets/**/*.php", htmlPublish);
    gulp.watch("src/scss/**/*.scss", scssCompile);
    gulp.watch("src/assets/**/*.js", jsPublish);
    // gulp.watch("vendor/**", vendorPublish);
    
}

// start livereload
function livereloadStart(done) {
    livereload.listen();
}

// export tasks
exports.publish = gulp.series(assetsClean, assetsPublish, scssCompile);
exports.watch = gulp.parallel(livereloadStart, watchFiles);