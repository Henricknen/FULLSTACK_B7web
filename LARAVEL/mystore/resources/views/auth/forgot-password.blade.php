<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>MyStore - Esqueci minha senha</title>
  </head>

  <body>
    <a href="{{route('login')}}" class="back-button">← Voltar</a>
    <div class="login-page">
      <div class="login-area">
        <h3 class="login-title">MyStore</h3>
        <div class="text-login">
          Preencha os campos abaixo para recuperar sua senha.
        </div>
        <form>
          <div class="email-area">
            <div class="email-label">E-mail</div>
            <input type="email" placeholder="Digite o seu e-mail" />
          </div>
          <button class="login-button">recuperar Senha</button>
        </form>        
        <div class="register-area">
          Ainda não tem cadastro? <a href="{{route('register')}}">Cadastre-se</a>
        </div>
      </div>
      <div class="terms">
        Ao continuar, você concorda com os <a href="">Termos de Uso</a> e a
        <a href="">Política de Privacidade</a>, e também, em receber
        comunicações via e-mail e push de todos os nossos parceiros.
      </div>
    </div>
    <x-base.footer />
  </body>
</html>
