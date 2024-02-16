const path = require('path');

module.exports = {
    entry: {        // entry [entrada] é um 'objeto {}' contendo nomes e locais dos arquivos 'home.js' e 'pedido.js'
        home:'./src/home.js',
        pedido:'./src/pedido.js'
    },
    output: {       // output [saida] 'geral'
        filename:'[name].bundle.js',       // '[name].js' gera os arquivos com seus devidos nomes
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