import 'package:flutter/material.dart';

void main()=> runApp( MeuApp() );

class MeuApp extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData(
        primaryColor: Colors.red,
        primaryTextTheme: TextTheme(
          title: TextStyle(
            color: Colors.green,    // alterando a cor 
            fontSize: 50    // alterando o tamanho do título
          )
        ),
        textTheme: TextTheme(
          body1: TextStyle(
            color: Colors.blue
          )
        )
      ),
      home:Scaffold(
        appBar: AppBar(
          title: Text('Manipulando tema')
        ),
        body: Column(
          children: <Widget>[
            Container(
              padding: EdgeInsets.all(20),
              child:Text('Olá Mundo')
            ),
            Container(
              padding: EdgeInsets.all(20),
              child:Text('Segundo Texto')
            ),
          ],
        )
      )
    );
  }

}