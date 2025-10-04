<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Painel Administrativo - Ceci Skincare</title>

  <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
      
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/ceci.jpg') }}" alt="Logo Ceci Skincare" class="logo-ceci">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#">Painel</a></li>
          <li><a href="#">Pedidos</a></li>
          <li><a href="{{ route('admin.products.index') }}">Produtos</a></li>
          <li><a href="#">Clientes</a></li>
          <li><a href="#">Funcionários</a></li>
          <li><a href="#">Relatórios</a></li>
          <li><a href="#" class="text-danger">Sair</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <section class="section">
      <div class="container mt-5">
        {{-- ESTE É O PONTO-CHAVE: O conteúdo das outras páginas será injetado aqui --}}
        @yield('content')
      </div>
    </section>
  </main>

  <footer id="footer" class="footer light-background mt-auto">
    <div class="container copyright text-center py-4">
      <p>© {{ date('Y') }} <span>Copyright</span> <strong class="px-1 sitename">Ceci Skincare</strong> <span>Todos os direitos reservados</span></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>