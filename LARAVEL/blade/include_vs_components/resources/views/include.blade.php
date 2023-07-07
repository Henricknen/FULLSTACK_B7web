<h1>Include x Components</h1>

{{-- @include('components/component')      {{-- fazendo 'include' do arquivo 'component' que se encontra dentro da pasta 'components' --}
@include('components/component')
@include('components/component')        {{-- pode ser publiado quantas vezes neçessitar --}
@include('components/component') --}}
@include('components/include', ['name' => 'componente-5'])        {{-- pode passar informações da mesma forma que é passado no 'controller' --}}

@component('components/component')
    @slot('slot')       <!-- 'slot' permite inserir conteudo 'html' -->
        <h1>Componente 1 - HTML</h1>
        <p>Utilizando 'component'</p>
    @endslot
@endcomponent