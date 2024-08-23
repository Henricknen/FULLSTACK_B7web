import 'package:flutter/material.dart';   // importando biblioteca 'material.dart'
import 'exemplo.dart';    // importando arquivo externo 'exemplo.dart'

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {

  void botaoAction() {   // função 'botaoAction' fora do build executa uma ação específica
    print('Clicou no botão');
  }

  @override
  Widget build(BuildContext context) {

    if(Title == null) {      // verificação do título
      String title = 'Título de exemplo';
    }

    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Componentes externos'),
        ),
        body: Column(
          children: <Widget>[
            Exemplo(
              title: 'Texto 1',   // inserindo 'propriedades' no componente
              onPressed: () {
                print('Clicou no item 1');
              },
            ),
            Exemplo(
              title: 'Texto 2',
              onPressed: botaoAction,  // utilizando a função definida anteriormente
            ),
          ],
        ),
      ),
    );
  }
}
