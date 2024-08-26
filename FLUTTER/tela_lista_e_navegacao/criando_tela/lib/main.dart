import 'package:flutter/material.dart';

void main() => runApp(MeuApp());

class MeuApp extends StatelessWidget {
  const MeuApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Criando Tela'),
        ),
        body: Column(
          children: <Widget>[
            Image(
              image: AssetImage('assets/flutter-logo.jpg')),
              Container(
                padding: EdgeInsets.all(20),    // dando 'espaço' no Container
                child:Row(      // linha
                  children:[
                    Expanded(
                      child:Column(
                        crossAxisAlignment: CrossAxisAlignment.start,   // alinha os itens a esquerda
                        children: [
                          Text(
                            'Muro das lamentações',
                            style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: Colors.black),     // estilizando texto
                            ),
                          Text(
                            'Jesusalém, Israel',
                            style: TextStyle(fontSize: 16, color: Colors.grey),
                            )
                        ],
                        ),
                    ),
                    Row(
                      children: <Widget>[
                        Icon(Icons.star, color:Colors.blue),
                        Text('9.876')
                      ],
                    )
                  ]
                )
              ),
              Container(
                padding: EdgeInsets.all(20),
                child: Row(
                  children:[
                    Expanded(
                      child: TextButton(     // criando botão
                        onPressed: (){},
                        child: Column(
                          children: [
                            Icon(Icons.call, color:Colors.blue),    // icone do botão
                            Text('Ligar')     // texto do botão
                          ],
                        ),
                ),
                    ),
                    Expanded(
                      child: TextButton(     // segundo botão
                        onPressed: (){},
                        child: Column(
                          children: [
                            Icon(Icons.location_on, color:Colors.blue),    // icone
                            Text('Mapa')     // texto
                          ],
                        ),
                ),
                    ),
                    Expanded(
                      child: TextButton(     // terçeiro botão
                        onPressed: (){},
                        child: Column(
                          children: [
                            Icon(Icons.share, color:Colors.blue),    // icone
                            Text('Compartilhar')     // texto
                          ],
                        ),
                ),
                    ),
                  ]
                ),
              ),
              Container(
                padding: EdgeInsets.all(20),
                child:Text('O Muro das Lamentações é sagrado para os judeus devido a ser o último pedaço do muro que rodeava o Templo pelos lados sul e leste. Alem disso, o Muro é o lugar mais próximo do sancta sanctorum ou lugar “sagrado entre os sagrados” (1 Reis 8:6-8).')
              )
          ],
        ),
      ),
    );
  }
}
