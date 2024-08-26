import 'package:flutter/material.dart';

void main() => runApp(MeuApp());

class MeuApp extends StatelessWidget {
  const MeuApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Adicionando Imagens'),
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
              )
          ],
        ),
      ),
    );
  }
}
