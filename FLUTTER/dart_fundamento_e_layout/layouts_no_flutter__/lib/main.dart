import 'package:flutter/material.dart';

void main()=> runApp( MeuApp() );

class MeuApp extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home:Scaffold(
        appBar: AppBar(
          title: Text('Layouts no flutter[3]')    // 'Text' é um width 'visual' que apareçe na tela
        ),
        body: Column(   // 'Clumn' é um coluna com três linhas
          children: <Widget>[
            Row(    // primeira linha contém 'um' expanded com um 'container'
              children: [
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.red,
                  )
                ),
              ],
            ),            
            Row(    // segunda linha conté m 'dois' expanded
              children:[
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.green,
                  )
                ),  
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.blue,
                  )
                ),  
              ]
            ),
            Row(    // terçeira linha contém 'três' expanded
              children: <Widget>[
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.yellow,
                  )
                ), 
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.black,
                  )
                ), 
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.orange,
                  )
                ), 
              ],
            ),
            Row(    // quarta linho com um expanded
              children: <Widget>[
                Expanded(
                  child:Container(
                    width: 100,
                    height: 100,
                    color: Colors.pink,
                  )
                ), 
              ],)
          ],
        )            
      )
    );    
  }
}