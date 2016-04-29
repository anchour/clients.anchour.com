module.exports = {
    entry: {
        main: './resources/assets/js/main.js',
        'customer-new': './resources/assets/js/pages/customer-new.js'
    },
    output: {
        path: __dirname + '/public/js',
        filename: '[name].js'
    },
    watch: true
};
