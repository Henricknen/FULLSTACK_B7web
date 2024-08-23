import 'package:flutter/material.dart';

class Exemplo extends StatelessWidget {   // componente 'Exemplo'

  Exemplo({   // repetindo o componente com a definição de parâmetros
    required this.title,     // 'this' significa 'este'
    required this.onPressed, // 'onPressed' será a ação que acontecerá quando o botão for clicado, 'required' transforma a ação em um item obrigatório
  });

  final String title;    // criação dos  'title' e 'onPressed'
  final Function onPressed;

  @override
  Widget build(BuildContext context) {

    return Container(
      width: 200,
      color: Colors.red,
      margin: EdgeInsets.all(10),
      padding: EdgeInsets.all(10),
      child: Column(
        children: [
          Text(title),    // pegando o título que está sendo passado
          TextButton(   // botão 'TextButton'
            child: Text('Clique aqui...'),
            onPressed: () => onPressed(),    // adicionando a ação 'onPressed'
          )
        ],
      ),
    );
  }

}
