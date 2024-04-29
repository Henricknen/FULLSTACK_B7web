import 'package:flutter/material.dart';   // importando biblioteca 'material.dart'

void main() {   // função principal, 'void' que não retorna nada
  runApp( app_flutter());   // função 'runApp' é onde a função 'app_flutter' rodara
}

class app_flutter extends StatelessWidget {   // widget do tipo state

  @override
  Widget build(BuildContext context) {    // função 'build' ou seja construir, retorna o proprio widget (a tela)
    return Center(    // retornara o texto no centro da tela
      child: Text(
        'Codificando Flutter',
        textDirection: TextDirection.ltr,   // espeçificando o texto da 'esquerda para direita'
      ),
    );
  }
}