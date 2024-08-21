import 'package:flutter/material.dart';

void main()=> runApp( MeuApp() );

class MeuApp extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home:Scaffold(
        appBar: AppBar(
          title: Text('Layouts no flutter[1]')    // 'Text' é um width 'visual' que apareçe na tela
        ),
        body: Container(   // 'Container' é um eidth de 'layout' que aceita apenas um child, 'Container' é o puro, uma area vazia
          color:Colors.red,
          child: Row(   // 'Row' são linhas, que pode reçeber quantos itens quiser
            children:[    //'children' é um array com linhas contendo o nome do profissional
              Expanded(
                child:Text('NOME'),
              ),
              Expanded(     // 'Expanded' espalha os elementos para pegar toda largura do aplicativo
                child:Text('SOBRENOME'),
              ),
              Expanded(
                child:Text('IDADE'),

              ),
            ]
          )
        )
      ),
    );
  }

}