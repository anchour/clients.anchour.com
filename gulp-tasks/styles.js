import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import gulp from 'gulp';
import lost from 'lost';
import postCss from 'gulp-postcss';
import postCssAssets from 'postcss-assets';
import postCssCalc from 'postcss-calc';
import postCssImport from 'postcss-import';
import postCssNested from 'postcss-nested';
import postCssSimpleVars from 'postcss-simple-vars';
import postCssCustomMedia from 'postcss-custom-media';

gulp.task('styles', () => {
  let plugins = [
    postCssImport,
    postCssSimpleVars,
    postCssCustomMedia,
    postCssNested,
    postCssCalc,
    postCssAssets,
    lost,
    autoprefixer,
    cssnano
  ];

  gulp.src('./resources/assets/styles/**/*')
    .pipe(postCss(plugins))
    .pipe(gulp.dest('./public/assets/css'));
});
