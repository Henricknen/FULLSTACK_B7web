<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, inital-scale">
    <meta rel = "stylesheet" href = "assets/style.css" />
    <meta rel = "stylesheet" href = "assets/LoginSignUpStyle.css" />

    <title>MyStore - Esqueci minha senha</title>
</head>

<body>
    {{-- <a href = "{{route('login')}}" class = "back-button">Voltar</a> --}}
        <div class = "login-page">
            <div class="login-area">
                <h3 class="login-title">MyStore</h3>
                <div class="text-login">
                    Preencha os campos abaixo e para recuperar sua senha.
                </div>
            </div>
        </div>
{{-- 
        <div>
            <button type="submit">Enviar Link de Redefinição de Senha</button>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            
            <div> --}}
        <form>
            <div class = "email-label">E-mail</div>
                <input type="email" placeholder="Digite se E-mail">
            </div>
            <button class="login-button">Recuperar senha</button>
        </form>
        <div class="terms">
            Ao continuar voçê comcorda com os
            <a href="">Termos de uso</a> e a
            <a href="">Politica de privaçidade</a>
        </div>
    <x-base.footer />
</body>
</html>
