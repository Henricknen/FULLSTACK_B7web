<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    Tela de Login
    <a href="{{route('home')}}">
        Ir para home
    </a>
</x-layout>