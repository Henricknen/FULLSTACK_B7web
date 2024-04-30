import 'package:flutter/material.dart';   // importando biblioteca 'material.dart'

void main() {
  runApp( app_flutter());
}

class app_flutter extends StatelessWidget {

  botaoAction() {   // função
    print("Clicou no botão");
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Botão')   // definição do título
        ),
        body:Center(
          child: Column(
            children: <Widget>[
              Text('Clique no botão abaixo'),
              ElevatedButton(   // botão 'ElevatedButton'
                child: Text('Clique aqui'),
                onPressed: () {   // 'onPressed' executa uma função espeçifica
                  botaoAction();
                },
              )
            ],
          )
        )
      )
    );
  }
}