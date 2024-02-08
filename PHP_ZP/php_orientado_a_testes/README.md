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

Para executar os testes,entre na pasta do seu projeto e executa o seguinte comando no terminal, no diretório raiz do seu projeto:

(./vendor/bin/phpunit)

Isso executará todos os testes disponíveis em seu projeto.

Se o PHPUnit precisar de um arquivo de inicialização (bootstrap), você pode especificá-lo usando a opção --bootstrap:

(./vendor/bin/phpunit --bootstrap vendor/autoload.php pasta_do_teste/nome_do_teste)

## Atualizando Dependências do Composer

Se você precisar atualizar as dependências do Composer, incluindo o PHPUnit, você pode executar o seguinte comando no terminal, no diretório raiz do seu projeto:

(composer update)

Isso atualizará todas as dependências do Composer para suas versões mais recentes, incluindo o PHPUnit, se uma versão mais recente estiver disponível.