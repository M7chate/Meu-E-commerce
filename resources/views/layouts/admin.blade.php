<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Gestão - Urban Cart</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <!-- Bootstrap CSS Local -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        :root {
            --panel-bg: #f8fafc;
            --sidebar-bg: #090d16;
            --card-border: #e2e8f0;
            --brand-green: #0d3826;
            --accent-green: #198754;
            --text-main: #0f172a;
        }

        body {
            background-color: var(--panel-bg);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: #334155;
            overflow-x: hidden;
        }

        /* Sidebar Premium Fluida */
        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            padding: 1.5rem 1rem;
            box-shadow: 4px 0 24px rgba(0,0,0,0.03);
            z-index: 100;
        }

        .sidebar-brand {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.02em;
            padding: 0.5rem 1rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar .nav-link {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.8rem 1.2rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 0.25rem;
        }

        /* Estados de Hover e Foco Consertados */
        .sidebar .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
            transform: translateX(3px);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.1);
        }

        /* Topbar de Ações do Lojista */
        .admin-topbar {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            margin-top: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .btn-logout-custom {
            background-color: #ffffff;
            color: #ef4444 !important;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.5rem 1.25rem;
            border: 1px solid #fee2e2;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        /* Correção do bug do Botão Branco Invisível no Hover */
        .btn-logout-custom:hover, .btn-logout-custom:focus {
            background-color: #ef4444 !important;
            color: #ffffff !important;
            border-color: #ef4444;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
        }

        .main-content-wrapper {
            padding: 2rem 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar { min-height: auto; padding: 1rem; }
            .admin-topbar { margin-top: 0.5rem; }
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            
            <!-- SIDEBAR DO LOJISTA -->
            <nav class="col-12 col-md-3 col-lg-2 sidebar d-flex flex-column">
                <div class="sidebar-brand">
                    <svg xmlns="http://w3.org" width="20" height="20" fill="currentColor" class="bi bi-sliders2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 1 .5-.5M10.5 8a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 1 .5-.5M6.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 1 .5-.5M6.5 8a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 1 .5-.5M1.5 5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H2a.5.5 0 0 1-.5-.5M1.5 11a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H2a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    <span>Urban Panel</span>
                </div>
                
                <ul class="nav flex-column gap-1 flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
                                <path d="M1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm12 1v3H9V5zm0 4v3H9V9zM8 5v7H2V5z"/>
                            </svg>
                            Visão Geral
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                            <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.962L10.404 2zm3.564 1.426L5.564 5.316 8 6.292l6.238-2.496zM15 4.667l-6.75 2.7v7.026l6.75-2.7zm-7.5 7.026V7.367L.75 4.667v7.026zM3.81 2.29l-1.427.571 5.385 2.154 1.427-.571z"/>
                            </svg>
                            Inventário
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                            <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.185 1.185l-.16.291a1.873 1.873 0 0 0 1.115 2.693l.319.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.185l-.291-.16a1.873 1.873 0 0 0-2.693 1.115l-.094.319c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.693-1.115l-.291.16c-.764.415-1.6-.42-1.185-1.185l.16-.291a1.873 1.873 0 0 0-1.115-2.693l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094a1.873 1.873 0 0 0 1.115-2.693l-.16-.291c-.415-.764.42-1.6 1.185-1.185l.291.16a1.873 1.873 0 0 0 2.693-1.115l.094-.319z"/>
                            </svg>
                            Definições
                        </a>
                    </li>
                </ul>

                <div class="mt-auto pt-4 border-top border-secondary/20">
                    <a class="nav-link text-success p-2 small" href="{{ route('catalog.index') }}" target="_blank">
                        👉 Ver Loja Pública
                    </a>
                </div>
            </nav>

            <!-- CONTEÚDO PRINCIPAL DO DASHBOARD -->
            <main class="col-12 col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-screen">
                <!-- Topbar Reestilizada -->
                <div class="d-flex justify-content-between align-items-center admin-topbar shadow-sm">
                    <span class="fw-bold text-dark fs-6 d-flex align-items-center gap-2">
                        <span class="d-inline-block bg-success rounded-circle" style="width: 8px; height: 8px;"></span>
                        Painel Corporativo
                    </span>
                    <a href="{{ route('catalog.index') }}" class="btn btn-logout-custom">Sair do Sistema</a>
                </div>

                <div class="main-content-wrapper">
                    @yield('admin_content')
                </div>
            </main>

        </div>
    </div>
    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
    <!-- Bootstrap Bundle JS Local -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
