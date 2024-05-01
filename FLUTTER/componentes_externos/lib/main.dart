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
          title: Text('Componentes externos')   // definição do título
        ),
        body: Column(
          children: <Widget>[
            Exemplo(),    // ultilizando componete externo 'Exemplo'
            Exemplo(),
            Exemplo(),
          ],
        )
      )
    );
  }
}


  class Exemplo extends StatelessWidget {     // componente 'externo'

    botaoAction() {   // função

    }

    @override
    Widget build(BuildContext context) {

      return Container(
        width: 200,
        color: Colors.red,
        margin: EdgeInsets.all(10),     // espaçamente externo em todos os lados
        padding: EdgeInsets.all(10),    // espaçamento interno
        child: Column(    // child é inserido o conteúdo
          children: [
            Text('estou codificando Flutter'),
           ElevatedButton(    // botão
            onPressed: botaoAction,
            child: Text("Clique aqui..."),
          ),
          ]
        ),
      );
    }
  }