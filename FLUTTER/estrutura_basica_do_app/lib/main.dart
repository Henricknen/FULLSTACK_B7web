import 'package:flutter/material.dart';     // importando a biblioteca 'material'

void main()=> runApp( MeuApp() );     // 'main' é a função prinçipal, que não retorna nada, o aplicativo é criado dentro da função 'runApp'

class MeuApp extends StatelessWidget {      // class MeuApp é praticamente um 'Widget' do tipo 'StatelessWidget'

  @override
  Widget build(BuildContext context) {    // função build significa 'construir' e retorna um 'widget' a propria tela
    return Center(    // retornando um texto no 'centro' da tela
      child: Text(
        'Hello Word, praticando Flutter',
        textDirection: TextDirection.ltr,   // espeçificando a direção do texto em ltr 'esquerda para direita'
      )
    );
  }

}