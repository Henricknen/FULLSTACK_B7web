<h1>Variações do include</h1>

@includeif('components/include1', ['html' => '[includeif] faz a inclusão da [view] somente se ela existir'])

@includeWhen(true, 'components/component', ['html' => '[includeWhen] ira retornar se determinada variavel for [true] se for [false] não retornará'])

@includeUnless(false, 'components/component', ['html' => '[includeUnless] retorna se variavel for [false]'])

@includeFirst(['components/include1', 'components/component1'], ['html' => '[includeFirst] retorna o primeiro componente que existir dentro do array'])

