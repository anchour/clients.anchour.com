import elixir from 'laravel-elixir';
import gulp from 'gulp';

require('laravel-elixir-vueify');

// Include all paths for the plugin
elixir.config.css.sass.pluginOptions = {
    outputStyle: 'nested', // libsass doesn't support expanded yet
    precision: 10,
    includePaths: ['.']
}

elixir.extend('images', function() {
	gulp.task('images', function() {
		gulp.src('./resources/assets/images/**/*')
			.pipe(gulp.dest('public/images'));
		});
});;

elixir(function(mix) {
    mix.sass('main.scss')
        .images()
        .browserSync({
            proxy: 'clients.dev'
        });

    mix.browserify('main.js')
});

