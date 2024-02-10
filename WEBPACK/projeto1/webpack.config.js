const path = require('path');

module.exports = {
    entry: './src/index.js',        // entrada
    output: {       // saída
        filename:'script.js',
        path:path. resolve(__dirname, 'dist')
    },
    mode:'production',       // modo 'padrão' o script ilegível
    // mode:'development'          // modo 'desenvolvimento' o script fica legível
    module: {       // regras de funçionamento
        rules: [        // array de regras
            { test:/\.css$/, use:['style-loader', 'css-loader'] }      // webpack vai procurar arquivos que tem a extensão '.css'
        ]
    }
};