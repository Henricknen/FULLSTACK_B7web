const { src, dest, parallel } = require('gulp');
const webpack = require('webpack-stream');
const named = require('vinyl-named');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

function html() {
    return src('src/*.html')
        .pipe(desc('public/'));
}

function vue() {
    return src('node_modules/vue/dist/vue.min.js')
        .pipe(dest('public/assets/js'));
}

function js() {
    return src('src/js/index.js')
        .pipe(named())
        .pipe(webpack())
        .pipe(dest('public/assets/js'));
}

exports.default = parallel(html, vue, js);