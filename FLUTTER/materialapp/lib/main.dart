import 'package:flutter/material.dart';   // importando biblioteca 'material.dart'

void main() {
  runApp( app_flutter());
}

class app_flutter extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(   // ultilizando o 'MaterialApp'
      home: Scaffold(   // dentro de 'Scaffold' é criado os detalhes do projeto
        appBar: AppBar(   // barra superior do projeto"
          title: Text('Codificando MaterialApp'),
        ),
        body:Center(    // corpo do projeto
          child: Text('Desenvolvedor Luis Henrique S F')
        )
      ),
    );
  }
}