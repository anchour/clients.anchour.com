import gulp          from 'gulp';
import browserSync   from 'browser-sync';
import concat from 'gulp-concat';
import minifyCss from 'gulp-cssnano';
import phpunit       from 'gulp-phpunit';
import plumber       from 'gulp-plumber';
import postcss       from 'gulp-postcss';
import webpack       from 'webpack-stream';
import webpackConfig from './webpack.config.js';
import requireDir from 'require-dir';
import runSequence from 'run-sequence'
import manifest from './resources/assets/manifest.js';

const server = browserSync.create('gulp');

// import all of our individual gulp tasks.
requireDir('./gulp-tasks');

gulp.task('tdd', function () {
    server.init(manifest.php.files, {
        proxy: 'clients.dev'
    });

    // Re-test PHP.
    gulp.watch(['**/*.php', '!vendor/**/*.php'], ['phpunit']);
});

// `gulp phpunit`
gulp.task('phpunit', function () {
    gulp.src('./phpunit.xml')
        .pipe(plumber())
        .pipe(phpunit());
});

gulp.task('watch', ['build'], function () {
    browserSync.init({
        proxy: manifest.devUrl
    });

    // Rebuild styles.
    gulp.watch('./resources/assets/styles/**/*', ['styles']);

    // Rebuild scripts.
    gulp.watch('./resources/assets/scripts/**/*', ['scripts']);
});

// Build task
gulp.task('build', function (callback) {
    runSequence(['styles', 'scripts'], callback);
})

gulp.task('default', ['build']);
