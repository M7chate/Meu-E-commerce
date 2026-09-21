<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shopConfig['name'] ?? 'Urban Cart Moçambique' }}</title>
    
    <!-- Bootstrap CSS Local -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Ficheiro de Estilos Isolado do Cliente -->
    <link rel="stylesheet" href="{{ asset('css/shop-main.css') }}">
</head>
<body>

    <!--  FITA SUPERIOR DE SUPORTE DINÂMICA (Conectada ao Painel) -->
    <div class="top-support-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div> WhatsApp Suporte: <span class="text-white">{{ $shopConfig['whatsapp'] ?? '+258 84 123 4567' }}</span></div>
            <div>🇲🇿 Entregas Rápidas em Maputo e Matola &bull; Pagamento via M-Pesa</div>
        </div>
    </div>

    <!-- Navbar Pública Corrigida com Link de Início Direto -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top navbar-urban">
        <div class="container">
            <!-- Mantemos o logo funcional, mas adicionamos o link explícito ao lado -->
            <a class="navbar-brand-urban" href="{{ route('catalog.index') }}">
                🛒 {{ $shopConfig['name'] ?? 'URBAN CART' }}
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="navbar-nav ms-auto align-items-lg-center gap-4 mt-3 mt-lg-0">
                    <!-- NOVO: Link explícito para voltar SEMPRE para a Landing Page -->
                    <a class="nav-link nav-link-urban {{ Route::is('catalog.index') ? 'active' : '' }}" href="{{ route('catalog.index') }}">Início</a>
                    
                    <!-- Shop vai para a página de exploração com filtros -->
                    <a class="nav-link nav-link-urban {{ Route::is('catalog.explore') ? 'active' : '' }}" href="{{ route('catalog.explore') }}">Shop</a>
                    
                    <!-- Link do Carrinho -->
                    <a class="nav-link nav-link-urban {{ Route::is('cart.index') ? 'active' : '' }}" href="{{ route('cart.index') }}">Carrinho</a>
                </div>
            </div>
        </div>
    </nav>



    <main>
        @yield('content')
    </main>

    <!-- FOOTER ENRIQUECIDO COM OS DADOS DE CONTACTO DO LOJISTA -->
    <footer class="urban-footer">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-12 col-md-4">
                    <h3 class="navbar-brand-urban mb-2">🛒 {{ $shopConfig['name'] ?? 'URBAN CART' }}</h3>
                    <p class="small text-muted mb-0">A plataforma definitiva de e-commerce otimizada para o comércio local com segurança trancada e alta performance.</p>
                </div>
                <div class="col-6 col-md-3 offset-md-1">
                    <h4 class="footer-title">Suporte Técnico</h4>
                    <ul class="footer-links">
                        <li><a href="mailto:{{ $shopConfig['email'] ?? 'suporte@urbancart.co.mz' }}">{{ $shopConfig['email'] ?? 'suporte@urbancart.co.mz' }}</a></li>
                        <li><a href="https://wa.me{{ $shopConfig['mpesa'] ?? '841234567' }}" target="_blank">Conversar no WhatsApp</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-4">
                    <div class="footer-card-box">
                        <h4 class="footer-title" style="margin-bottom: 1rem;">Carteira de Recebimentos</h4>
                        <p class="small text-muted m-0">Liquidação direta via conta corporativa:</p>
                        <p class="fw-bold text-white mt-1 mb-0" style="font-size: 0.95rem;">
                            🇲🇿 Vodacom M-Pesa: <span class="text-success">+258 {{ $shopConfig['mpesa'] ?? '841234567' }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="border-top pt-4 text-center text-muted small" style="border-color: rgba(255,255,255,0.05) !important; font-size: 0.75rem;">
                &copy; {{ date('Y') }} {{ $shopConfig['name'] ?? 'URBAN CART' }} &bull; PROJETO DE PORTFÓLIO ENGENHARIA DE SOFTWARE &bull; MAPUTO, MZ
            </div>
        </div>
    </footer>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
