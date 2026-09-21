@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- 1. Hero Banner Moderno -->
        <!-- 1. Hero Banner Moderno Dinâmico -->
    <section class="hero-section p-4 p-md-5 mb-5 mt-3">
        <div class="row align-items-center g-4">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 0.7rem; letter-spacing: 0.1em;">Fresh Picks. Better Living.</span>
                <!-- Título Dinâmico -->
                <h1 class="hero-title mt-2 mb-3">{{ $shopConfig['hero_title'] ?? 'Os Teus Produtos Favoritos, Entregues a Ti.' }}</h1>
                <!-- Parágrafo Dinâmico -->
                <p class="text-muted small mb-4 col-lg-10">{{ $shopConfig['hero_description'] ?? 'Descobre artigos de alta qualidade, ofertas exclusivas e tudo o que precisas para o teu dia a dia num único lugar seguro.' }}</p>
                <a href="{{ route('catalog.explore') }}" class="btn btn-urban-dark">Shop Now &rarr;</a>

            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <!-- Imagem Dinâmica carregada do Storage local -->
                <img src="{{ $shopConfig['hero_image'] ?? asset('images/hero-banner.jpg') }}" alt="Urban Cart Banner" class="img-fluid rounded-4 shadow-sm" style="max-height: 250px; width: 100%; object-fit: cover;">
            </div>
        </div>
    </section>


    <!-- 2. Fita de Benefícios Limpa -->
    <section class="row text-center g-3 mb-5 py-3 border-bottom border-top" style="border-color: #f0f0f0 !important;">
        <div class="col-6 col-md-3 border-end" style="border-color: #f0f0f0 !important;">
            <div class="benefit-block">
                <div class="benefit-title">Entrega Rápida</div>
                <div class="text-muted" style="font-size: 0.65rem;">Cidades de Maputo e Matola</div>
            </div>
        </div>
        <div class="col-6 col-md-3 border-end" style="border-color: #f0f0f0 !important;">
            <div class="benefit-block">
                <div class="benefit-title">Pagamento Seguro</div>
                <div class="text-muted" style="font-size: 0.65rem;">M-Pesa, E-Mola e MKesh</div>
            </div>
        </div>
        <div class="col-6 col-md-3 border-end" style="border-color: #f0f0f0 !important;">
            <div class="benefit-block">
                <div class="benefit-title">Retornos Simples</div>
                <div class="text-muted" style="font-size: 0.65rem;">Garantia de satisfação</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="benefit-block">
                <div class="benefit-title">Suporte Local</div>
                <div class="text-muted" style="font-size: 0.65rem;">Pronto para te ajudar</div>
            </div>
        </div>
    </section>

        <!-- 3. Fita de Cupão Dinâmica (Esconde-se automaticamente se não houver campanha ativa) -->
    @if(!empty($shopConfig['promo_code']) && $shopConfig['promo_discount'] > 0)
        <section class="promo-banner d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 mb-5">
            <div>
                <div class="text-uppercase text-white-50 fw-bold" style="font-size: 0.65rem; letter-spacing: 0.1em;">Oferta Exclusiva Ativa</div>
                <h2 class="h5 fw-bold m-0 mt-1">Ganha {{ $shopConfig['promo_discount'] }}% DE DESCONTO na tua próxima encomenda</h2>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="small text-white-50">Usa o código:</span>
                <span class="promo-badge-code">{{ $shopConfig['promo_code'] }}</span>
            </div>
        </section>
    @endif


    <!-- 4. Título da Secção -->
    <div class="mb-4">
        <span class="text-uppercase text-muted fw-bold tracking-wider" style="font-size: 0.65rem; letter-spacing: 0.05em;">Top Picks For You</span>
        <h2 class="h4 fw-bold text-dark m-0 mt-1">Os Nossos Mais Vendidos</h2>
    </div>

    <!-- 5. Grelha de Produtos Premium Estúdio -->
    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
        @forelse($bestSellers as $product)
            <div class="col">
                <div class="urban-product-card">
                    <a href="{{ route('catalog.show', $product['id']) }}" class="urban-img-frame d-block">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="urban-img">
                    </a>
                    <span class="urban-product-cat">{{ $product['category'] }}</span>
                    <a href="{{ route('catalog.show', $product['id']) }}" class="urban-product-title text-decoration-none">{{ $product['name'] }}</a>
                    <div class="urban-price mt-1">
                        {{ number_format($product['price'], 2, ',', '.') }} <span style="font-size: 0.7rem; font-weight: 700;">MZN</span>
                    </div>
                    <a href="{{ route('catalog.show', $product['id']) }}" class="btn-shop-action">Shop Now</a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted small bg-light rounded">
                Nenhum produto em destaque de momento.
            </div>
        @endforelse
    </section>

</div>
@endsection
