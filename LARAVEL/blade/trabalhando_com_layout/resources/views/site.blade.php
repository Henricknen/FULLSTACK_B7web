@extends('layouts.app')      {{-- exendendo o layouts 'app' --}}

{{-- @section('header')      {{-- passando conteúdo da seção 'header' --}
    @parent     {{-- 'parent' acrescenta o conteúdo que tem do 'layout' prinçipal --}
    <x-nav>     {{-- inserindo componente 'nav' --}
    </x-nav>
@endsection --}}

@section('content')

    <h1>Este é o conteúdo principal</h1>
    
@endsection

{{-- @section('footer')      {{-- passando conteúdo da seção 'footer' --}
    <x-footer>     {{-- inserindo componente 'nav' --}
    </x-footer>
@endsection --}}