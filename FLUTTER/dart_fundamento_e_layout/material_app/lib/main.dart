import 'package:flutter/material.dart';

void main()=> runApp( MeuApp() );

class MeuApp extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(   // retornando a estrutura 'MaterialApp' do widget principal build
      home:Scaffold(    // tela home utilizando 'Scaffold' com duas propriedades (detalhes do aplicativo)
        appBar: AppBar(   // 'appBar' é a barra superior do aplicativo
          title: Text('Ultilizando biblioteca Material app')
        ),
        body: Center(   // 'body' é o corpo do aplicativo
          child: Text('Programando Flutter'),   // filho 'child' está centralizado com um texto 
        )
      ),
    );
  }

}