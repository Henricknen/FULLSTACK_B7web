<x-layout page="To_do_App_Login">''{{-- 'page' alterará o titulo da tela --}}
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>
    Tela de login
</x-layout>