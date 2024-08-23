import 'package:flutter/material.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {

botaoAction() {   // função 'botaoAction' fora do build executa uma ação espeçifica
  print('Clicou no botão');
}

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Botão'),
        ),
        body: Center(   // centralizando os elementos na tela
          child: Column(    // coluna com texto e botão
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text('Clique no botão abaixo...'),    // texto
              TextButton(     // botão
                child: Text('Clique aqui'),   // texto do botão
                onPressed: botaoAction   // propriedade 'onPressed' pucha e executa uma ação espeçifica 'botaoAction'
                  
              ),
            ],
          ),
        ),
      ),
    );
  }
}
