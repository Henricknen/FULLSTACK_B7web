<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Registrar-se</h1>
        
        @if ($errors->any())        {{-- exibe erros de validação --}}  
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
             </ul>
        @endif

        <form method="POST" action="{{route('user.register_action')}}">
            @csrf       {{-- 'csrf' é um token é ultilizado para proxima página validar, iindicando que não é um robo enviando --}}

            <x-form.text_input     {{-- utilizando o componente 'text_input' --}}
                name="name"
                label="Nome"
                placeholder="Digite seu nome" />

            <x-form.text_input
                type="email"
                name="email"
                label="E-mail"
                placeholder="Digite seu e-mail" />

            <x-form.text_input
                type="password"
                name="password"
                label="Senha"
                placeholder="Digite sua senha" />

            <x-form.text_input
                type="password"
                name="password_confirmation"
                label="Confirme sua senha"
                placeholder="Confirme sua senha" />

            <x-form.form_button submitTxt="Registrar-se" resetTxt="Limpar" />      {{-- ultilizando apenas um componente para renderizar os dois botões --}}

        </form>
    </section>
</x-layout>