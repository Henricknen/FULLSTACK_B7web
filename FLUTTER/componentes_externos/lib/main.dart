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
          title: Text('Componentes externos'),
        ),
        body:Column(
          children: <Widget>[
            Exemplo(),
            Exemplo(),    // utilizando 'Componente' externo novamente
          ],
        )
      ),
    );
  }
}



class Exemplo extends StatelessWidget {   // componente 'Exemplo' vai executar a ação do click do botão

@override
Widget build(BuildContext context) {

  return Container(
    width:200,
    color:Colors.red,
    margin: EdgeInsets.all(10),   // inserindo um espaçamento 'externo' em todos os lados do componente
    padding: EdgeInsets.all(10),    // espaçamento 'interno'
    child: Column(
      children: [
        Text('Texto de exemplo'),
        TextButton(
          child: Text('Clique aqui...'),
          onPressed: () {                  
                  print('Clicou no botão');   // Ação ao clicar no botão
                },
        )
      ]
      )
  );
}

}