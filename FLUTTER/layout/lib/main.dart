import 'package:flutter/material.dart';   // importando biblioteca 'material.dart'

void main() {
  runApp( app_flutter());
}

class app_flutter extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Codificando MaterialApp'),   // definição do título
        ),
        body:Container(    // Container é um width que deixa o corpo do projeto vazio, para possíveis códificações
        color: Colors.red,
          child: Row(   // linha para posiçionar os 'widgets'
            children: [
              Expanded(   // da um 'espaço' entre os widgets
              child: Text('Luis Henrique'),   // 'exibe' o nome na tela
              ),
              Expanded(
              child: Text('Silva Ferreira'),
              )
            ],
          )
        )
      ),
    );
  }
}