## PHPUnit

PHPUnit é um framework de testes unitários para a linguagem de programação PHP. Ele fornece uma estrutura para escrever testes automatizados e garantir que o código funcione conforme o esperado.

## Instalação

Para instalar o PHPUnit em seu projeto, siga estas etapas:

Certifique-se de ter o Composer instalado em seu sistema. Se ainda não tiver o Composer, você pode baixá-lo e instalá-lo seguindo as instruções em (getcomposer.org.)

Abra o terminal e navegue até o diretório raiz do seu projeto.

Execute o seguinte comando para adicionar o PHPUnit como uma dependência de desenvolvimento em seu projeto:

(composer require phpunit/phpunit --dev)

Isso adicionará o PHPUnit à lista de dependências em seu arquivo composer.json e instalará o PHPUnit em seu projeto.

Após a conclusão da instalação, você poderá escrever e executar testes unitários em seu código PHP usando o PHPUnit.

## Executando Testes

Para executar os testes, basta executar o seguinte comando no terminal, no diretório raiz do seu projeto:

(vendor/bin/phpunit)

Isso executará todos os testes disponíveis em seu projeto e exibirá os resultados no terminal.