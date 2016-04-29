import manifest from '../resources/assets/manifest.js';
import config from '../webpack.config.js';
import gulp from 'gulp';
import sourcemaps from 'gulp-sourcemaps';
import webpack from 'gulp-webpack';

gulp.task('scripts', () => {
	return gulp.src(manifest.js.files)
		.pipe(sourcemaps.init())
		.pipe(webpack(config))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('public/js'));
});
