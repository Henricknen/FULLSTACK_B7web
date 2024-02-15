const path = require('path');

module.exports = {
    entry: './src/index.js',
    output: {       // output 'geral'
        filename:'script.js',
        path:path. resolve(__dirname, 'dist/assets/js')     // configurando o js para ir para pasta 'js' dentro da pasta 'assets' que por sua vez estará dentro da 'dist'
    },
    mode:'production',
    module: {       // modulos cada um com sua regra
        rules: [
            { test:/\.css$/, use:['style-loader', 'css-loader'] },
            {
                 test:/\.(png|jpg|gif|svg)$/,     // [regra] finais de arquivos permitidos
                 use:[
                     {
                        loader:'file-loader',
                        options:{       // 'options' são configurações espeçificas
                            name:'../images/[name].[ext]'       // Bconfigurando caminho da imagem onde será salva
                        }
                     }
                ]
            },
            { test: /\.scss$/, use: ['style-loader', 'css-loader', 'sass-loader'] }
        ]
    }
};