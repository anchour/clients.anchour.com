var elixir = require('laravel-elixir');

// Include all paths for the plugin
elixir.config.css.sass.pluginOptions = {
    outputStyle: 'nested', // libsass doesn't support expanded yet
    precision: 10,
    includePaths: ['.']
};

elixir(function(mix) {
    mix.sass('main.scss')
        .browserSync({
            proxy: 'clients.dev'
        });
});
