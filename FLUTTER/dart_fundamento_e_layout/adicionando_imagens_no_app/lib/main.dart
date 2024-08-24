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
              width: 100, // diminuindo o tamanho da imagem
              image: AssetImage('assets/flutter-logo.jpg'),     // especificando o caminho da imagem local
            ),
            Image.network(
              'https://flutter.dev/assets/images/shared/brand/flutter/logo/flutter-lockup.png',     // carregando imagem externa
            ),
          ],
        ),
      ),
    );
  }
}
