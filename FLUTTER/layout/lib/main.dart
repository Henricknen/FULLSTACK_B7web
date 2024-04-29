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
        body:Center(
          child: Row(
            mainAxisSize: MainAxisSize.min,
            children: [
              Icon(Icons.star, color: Colors.green),
              Icon(Icons.star, color: Colors.green),
              Icon(Icons.star, color: Colors.green),
              Icon(Icons.star, color: Colors.black),
              Icon(Icons.star, color: Colors.black),
            ],
          )
        )
      )
    );
  }
}