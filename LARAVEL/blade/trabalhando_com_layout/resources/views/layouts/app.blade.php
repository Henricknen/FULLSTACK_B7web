<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
</head>
<body style="margin: 0; padding: 0;">
    @section('header')      {{-- seção header --}}

    <main style="padding: 20px; height: 54vh">
        @yield('content')      {{-- conteúdo padrão --}}
    </main>

    @section('footer')      {{-- seção footer --}}
    
</body>
</html>