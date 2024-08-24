import 'package:flutter/material.dart';

void main() => runApp(MeuApp());

class MeuApp extends StatelessWidget {
  const MeuApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Estilizando textos'),
        ),
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,      // centraliza verticalmente
            crossAxisAlignment: CrossAxisAlignment.center,      // centraliza horizontalmente
            children: <Widget>[
              const Text(
                'Estilização de Texto',
                style: TextStyle(     // dentro de 'TextStyle' é inserido as estilizações
                  fontSize: 24,    // tamanho da fonte
                  color: Colors.red,      // cor do texto
                  fontWeight: FontWeight.bold,  // negrito
                ),
              ),Icon(
                  Icons.star,
                  size: 50,        // tamanho do ícone
                  color: Colors.blue,     // cor do ícone
                ),
              TextButton(
                onPressed: () {
                  // Ação quando o botão for pressionado
                },
                child: const Text('Clique aqui...'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
