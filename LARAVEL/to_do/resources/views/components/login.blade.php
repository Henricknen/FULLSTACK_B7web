{{-- <x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Autenticação</h1>

        @if ($errors->any())        {{-- exibe erros de validação --}
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
             </ul>
        @endif

        <form method="POST" action="{{route('user.login_action')}}">
            @csrf       {{-- 'csrf' é um token é ultilizado para proxima página validar, iindicando que não é um robo enviando --}
            
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

            
            <x-form.form_button submitTxt="Login" resetTxt="Limpar" />      {{-- ultilizando apenas um componente para renderizar os dois botões --}
        </form>
    </section>
</x-layout> --}}