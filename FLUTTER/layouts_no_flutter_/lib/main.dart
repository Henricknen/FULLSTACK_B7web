import 'package:flutter/material.dart';

void main()=> runApp( MeuApp() );

class MeuApp extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home:Scaffold(
        appBar: AppBar(
          title: Text('Layouts no flutter[2]')    // 'Text' é um width 'visual' que apareçe na tela
        ),
        body: Center(   // centralizando a linha 
          child: Row(
            mainAxisSize: MainAxisSize.min,     // 'mainAxisSize' é o tamanho que a linha irá utilizar, '.min' é o valor minimo possível
            children:[    // 'array' dentro de uma linha
              Icon(Icons.star, color: Colors.green,),   // inserindo icones de estrela 'star' de cor 'green' indica que a estrela está acionada
              Icon(Icons.star, color: Colors.green,),
              Icon(Icons.star, color: Colors.green,),
              Icon(Icons.star, color: Colors.black,),   // utilizando a cor 'black' indica que a estrela está desativada
              Icon(Icons.star, color: Colors.black,)
            ]
          )
        )
      ),
    );
  }

}