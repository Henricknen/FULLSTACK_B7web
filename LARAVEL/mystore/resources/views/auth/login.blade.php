<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/LoginSignUpStyle.css">
    <title>MyStore - Login</title>
</head>

<body>
    <div class="login-page">
        <div class="login-area">
            <h3 class="login-title">MyStore</h3>
            <div class="text-login">
                Bem-vindo de volta! Faça login na sua conta.
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- Adicione o token CSRF para proteção -->
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu E-mail" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua Senha" required>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <div class="forgot-password">
            <a href="{{ route('forgot-password') }}">Esqueceu sua senha?</a>
        </div>
    </div>

    <div class="register-area">
        Ainda não tem cadastro? <a href="{{ route('register') }}">Registre-se</a>
    </div>

    <div class="terms">
        Ao continuar, você concorda com os
        <a href="#">Termos de uso</a> e a
        <a href="#">Política de privacidade</a>
    </div>
</body>

</html>
