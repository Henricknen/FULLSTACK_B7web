const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {
        filename:'script.js',
        path:path. resolve(__dirname, 'dist')
    },
    mode:'production',
    module: {
        rules: [
            { test:/\.css$/, use:['style-loader', 'css-loader'] },      // regra de 'css'
            { test:/\.(png|jpg|gif|svg)$/, use:['file-loader']},     // regra de 'imagens'
            { test: /\.scss$/, use: ['style-loader', 'css-loader', 'sass-loader'] }        // ao encontrar um arquivo com a extensão  'scss' será ultilizando esses 'loaders' para interpretar
        ]
    }
};