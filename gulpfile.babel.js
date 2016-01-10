import elixir from 'laravel-elixir';

require('laravel-elixir-vueify');

// Include all paths for the plugin
elixir.config.css.sass.pluginOptions = {
    outputStyle: 'nested', // libsass doesn't support expanded yet
    precision: 10,
    includePaths: ['.']
};

elixir(function(mix) {
    mix.sass('main.scss')
        .phpUnit()
        .browserify('main.js')
        .browserSync({
            proxy: 'clients.dev'
        });
});
