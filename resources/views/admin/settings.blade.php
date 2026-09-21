@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid p-0" style="max-width: 800px;">
    
    <!-- Cabeçalho -->
    <div class="mb-5">
        <h1 class="h3 fw-black text-dark m-0" style="font-weight: 800; letter-spacing: -0.02em;">Definições da Loja</h1>
        <p class="text-muted small m-0 mt-1">Faça a gestão da identidade pública, canais de suporte e dados da sua carteira móvel.</p>
    </div>

    <!-- Formulário Principal -->
    <form action="#" method="POST" class="d-flex flex-column gap-4">
        @csrf
        
                <!-- BLOCO 1: IDENTIDADE & VISUAL (ATUALIZADO COM AUTONOMIA TOTAL) -->
        <div class="settings-card shadow-sm">
            <div class="section-title-wrapper">
                <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <h2 class="section-title">1. Identidade & Visual da Loja</h2>
            </div>
            
            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Nome da Loja</label>
                    <input type="text" name="shop_name" class="form-control form-control-custom w-100" value="{{ $shop['name'] }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Slogan Principal (Navbar)</label>
                    <input type="text" name="shop_slogan" class="form-control form-control-custom w-100" value="Urban Cart Maputo" required>
                </div>
            </div>

            <!-- Novos campos para dar autonomia total ao Hero Banner da Landing Page -->
            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary mb-1">Título do Banner Principal (Hero Title)</label>
                <input type="text" name="hero_title" class="form-control form-control-custom w-100" value="Os Teus Produtos Favoritos, Entregues a Ti." required>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary mb-1">Parágrafo do Banner Principal (Hero Description)</label>
                <textarea name="hero_description" class="form-control form-control-custom w-100" rows="3" required>Descobre artigos de alta qualidade, ofertas exclusivas e tudo o que precisas para o teu dia a dia num único lugar seguro.</textarea>
            </div>

            <!-- Componente de Upload da Imagem do Banner Principal -->
            <div>
                <label class="form-label small fw-bold text-secondary mb-1">Imagem de Destaque do Banner (Fundo Limpo)</label>
                <div class="upload-zone-premium">
                    <input type="file" name="hero_image" class="form-control form-control-sm" accept="image/*">
                    <div class="form-text text-muted mt-2" style="font-size: 0.7rem;">Anexe o banner conceitual da loja. Deixe vazio para manter a imagem atual.</div>
                </div>
            </div>
        </div>


        <!-- BLOCO 2: CONTACTOS & RECEBIMENTOS -->
        <div class="settings-card shadow-sm">
            <div class="section-title-wrapper">
                <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                    <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zM1 2.5A1.5 1.5 0 0 1 2.5 1h11A1.5 1.5 0 0 1 15 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5zM2.5 2a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5z"/>
                </svg>
                <h2 class="section-title">2. Contactos & Recebimentos</h2>
            </div>
            <div class="row g-4 mb-3">
                <div class="col-12 col-md-6">
                    <label class="form-label small fw-bold text-secondary mb-1">WhatsApp de Suporte</label>
                    <input type="text" name="shop_whatsapp" class="form-control form-control-custom w-100" value="{{ $shop['whatsapp'] }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label small fw-bold text-secondary mb-1">E-mail de Atendimento</label>
                    <input type="email" name="shop_email" class="form-control form-control-custom w-100" value="suporte@urbancart.co.mz" required>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold text-secondary mb-1">Número M-Pesa para Carteira Móvel</label>
                <div class="input-group">
                    <span class="input-group-text input-group-text-custom">+258</span>
                    <input type="text" name="shop_mpesa" class="form-control form-control-custom border-start-0" value="{{ $shop['mpesa'] }}" placeholder="84XXXXXXX" required style="border-radius: 0 0.75rem 0.75rem 0;">
                </div>
            </div>
                        
            <div class="col-12 mt-3">
                <label class="form-label small fw-bold text-secondary mb-1">Taxa de Entrega Padrão (MZN)</label>
                <input type="number" name="delivery_fee" step="0.01" class="form-control form-control-custom w-100" value="0.00" placeholder="0,00">
                <div class="form-text text-muted mt-1" style="font-size: 0.7rem;">Insira o valor em Meticais para a entrega. Coloque 0 para ativar a Entrega Grátis automaticamente.</div>
            </div>
        </div> {{-- Fecho da div.settings-card --}}

        

        <!--  BLOCO 3: REINCORPORADO - CAMPANHA DE MARKETING ATIVA -->
        <div class="settings-card shadow-sm">
            <div class="section-title-wrapper">
                <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h13A1.5 1.5 0 0 1 16 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5zm1.5-.5a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5z"/>
                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <h2 class="section-title">3. Campanha de Marketing Ativa</h2>
            </div>
            <div class="row g-4">
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Código do Cupão</label>
                    <input type="text" name="promo_code" class="form-control form-control-custom w-100 fw-bold text-uppercase text-success" value="WELCOME15" style="letter-spacing: 0.05em;">
                </div>
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary mb-1">Desconto (%)</label>
                    <input type="number" name="promo_discount" class="form-control form-control-custom w-100 fw-bold" value="15" min="0" max="100">
                </div>
            </div>
        </div>

        <!-- BOTÕES DE AÇÃO -->
        <div class="d-flex justify-content-end align-items-center gap-3 mt-2 mb-5">
            <button type="button" class="btn btn-cancel-settings">Cancelar</button>
            <button type="submit" class="btn btn-urban-primary px-5 py-2.5 shadow-sm">
                Gravar Definições
            </button>
        </div>
    </form>

</div>
@endsection
