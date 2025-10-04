<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ceci Skincare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page" style="background-color: var(--body-bg-soft);">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="/"><img src="{{ asset('assets/img/ceci.jpg') }}" alt="Logo Ceci Skincare" class="logo-ceci"></a>
            <nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('shop.index') }}">Produtos</a></li>
        <li><a href="#">Contato</a></li>

        <li>
            <a href="{{ route('cart.index') }}">
                Carrinho
                {{-- Mostra a contagem de itens apenas se o carrinho não estiver vazio --}}
                @if (\Cart::getContent()->count() > 0)
                    <span class="badge bg-success rounded-pill">{{ \Cart::getContent()->count() }}</span>
                @endif
            </a>
        </li>

        {{-- Lógica para mostrar Login/Logout --}}
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Cadastro</a></li>
        @else
            <li><a href="{{ route('dashboard') }}">Minha Conta</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Sair
                    </a>
                </form>
            </li>
        @endguest
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer id="footer" class="footer light-background">
        <div class="container copyright text-center mt-4">
            <p>© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Ceci Skincare</strong> <span>Todos os direitos reservados</span></p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
