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
          title: Text('Codificando Style'),   // definição do título
        ),
        body:Column(    // coluna
          children: <Widget>[
            Row(
              children: <Widget>[
                Expanded(
                  child:Container(
                    height: 100,
                    color: Colors.red
                  )
                ),
              ],
            ),
            Row(    // linha
              children: [
                Expanded(
                  child:Container(
                    height: 100,
                    width: 100,
                    color: Colors.blue
                  )
                ),
                Expanded(
                  child:Container(
                    height: 100,
                    width: 100,
                    color: Colors.green
                  )
                )
              ]
            ),
            Row(
              children: <Widget>[
                Expanded(
                  child:Container(
                    height: 100,
                    width: 100,
                    color: Colors.pink
                  )
                ),
                Expanded(
                  child:Container(
                    height: 100,
                    color: Colors.yellow
                  )
                ),
                Expanded(
                  child:Container(
                    height: 100,
                    color: Colors.black
                  )
                )
              ],
            ),
            Row(
              children: <Widget>[
                Expanded(
                  child:Container(
                    height: 100,
                    color: Colors.deepOrangeAccent
                  )
                ),
              ],
            ),
          ],          
        )
      )
    );
  }
}