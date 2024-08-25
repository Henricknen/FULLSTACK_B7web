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
            Image(image: AssetImage('assets/muro.jpg')),
          ],
        ),
      ),
    );
  }
}
