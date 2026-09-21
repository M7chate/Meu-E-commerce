@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <!-- Simulador de Estado do Carrinho (Mude para true para ver o carrinho com itens ou false para vazio) -->
    @php $cartHasItems = true; @endphp

    @if($cartHasItems)
    
    <!-- Título do Ecrã -->
    <div class="mb-4">
        <h1 class="h3 fw-extrabold text-dark m-0">O Seu Carrinho</h1>
        <p class="text-muted small m-0 mt-1">Reveja os artigos selecionados antes de proceder ao pagamento seguro.</p>
    </div>

    <!-- Layout em Duas Colunas -->
    <div class="row g-4">
        
        <!-- Coluna Esquerda: Listagem de Itens (Mock com 2 itens) -->
        <div class="col-12 col-lg-8">
            <div class="cart-wrapper border shadow-sm bg-white rounded-4 p-4">
                
                <!-- Item 1 -->
                <div class="cart-item-row">
                    <div class="cart-img-frame border">
                        <img src="{{ asset('storage/produtos/relogio.jpg') }}" alt="Classic Men's Watch Leather">
                    </div>
                    <div class="ms-3 flex-grow-1">
                        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                            <div>
                                <a href="#" class="cart-product-title">Classic Men's Watch Leather</a>
                                <div class="text-muted small mt-1" style="font-size: 0.75rem;">Categoria: Acessórios</div>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <input type="number" class="form-control form-control-sm qty-input-custom p-1.5" value="1" min="1">
                                <div class="fw-bold text-dark text-nowrap" style="font-size: 0.95rem;">
                                    3.800,00 <span class="price-currency text-success font-bold">MZN</span>
                                </div>
                                <a href="#" class="btn-remove-item">&times; Remover</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="cart-item-row">
                    <div class="cart-img-frame border">
                        <img src="{{ asset('storage/produtos/earbuds.jpg') }}" alt="Wireless Pro Earbuds v2">
                    </div>
                    <div class="ms-3 flex-grow-1">
                        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                            <div>
                                <a href="#" class="cart-product-title">Wireless Pro Earbuds v2</a>
                                <div class="text-muted small mt-1" style="font-size: 0.75rem;">Categoria: Eletrónicos</div>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <input type="number" class="form-control form-control-sm qty-input-custom p-1.5" value="1" min="1">
                                <div class="fw-bold text-dark text-nowrap" style="font-size: 0.95rem;">
                                    1.900,00 <span class="price-currency text-success font-bold">MZN</span>
                                </div>
                                <a href="#" class="btn-remove-item">&times; Remover</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Botão auxiliar de retorno -->
            <div class="mt-3">
                <a href="{{ route('catalog.index') }}" class="text-decoration-none small text-success fw-bold">&larr; Continuar a comprar</a>
            </div>
        </div>

        <!-- Coluna Direita: Resumo de Faturação com Campo de Cupom -->
        <div class="col-12 col-lg-4">
            <div class="card summary-card shadow-sm border p-4 bg-light rounded-4">
                <h2 class="summary-title" style="font-size: 1rem; font-weight: 800; color: var(--brand-green); text-transform: uppercase; margin-bottom: 1.5rem;">Resumo do Pedido</h2>
                
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="text-muted small">Subtotal</span>
                    <!-- O Blade apenas imprime a variável string enviada pelo Controlador -->
                    <span class="fw-bold text-dark">{{ $totals['subtotal'] }} MZN</span>
                </div>

                <!-- BLOCO DE APLICAÇÃO DE CUPOM (Apenas visível se o lojista tiver configurado uma campanha) -->
                @if(!empty($shopConfig['promo_code']) && $shopConfig['promo_discount'] > 0)
                    <div class="mb-3 pb-3 border-bottom">
                        <a class="coupon-toggle-link" data-bs-toggle="collapse" href="#collapseCoupon" role="button" aria-expanded="false">
                            <svg xmlns="http://w3.org" width="14" height="14" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 0 16 16">
                                <path d="M4 4.85v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9z"/>
                                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5v6A1.5 1.5 0 0 0 1.5 12h13a1.5 1.5 0 0 0 1.5-1.5v-6A1.5 1.5 0 0 0 14.5 3zM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a1.5 1.5 0 0 0 0 2.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a1.5 1.5 0 0 0 0-2.9zm8 .5v6h1V5z"/>
                            </svg>
                            Tem um código de desconto?
                        </a>
                        <div class="collapse mt-2" id="collapseCoupon">
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control form-coupon-custom flex-grow-1" placeholder="Ex: {{ $shopConfig['promo_code'] }}">
                                <button type="button" class="btn btn-coupon-apply">Aplicar</button>
                            </div>
                        </div>
                    </div>
                @endif

                
                <!-- Linha invisível simulando o desconto aplicado -->
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom d-none" id="discountRow">
                    <span class="text-success small fw-bold">Desconto (15%)</span>
                    <span class="text-success fw-bold">-855,00 MZN</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="text-muted small">Taxa de Entrega</span>
                    <!-- O Controlador envia o texto "Grátis" ou o valor já formatado -->
                    <span class="{{ $totals['delivery_fee'] === 'Grátis' ? 'text-success font-bold' : 'fw-bold text-dark' }}">
                        {{ $totals['delivery_fee'] }} {{ $totals['delivery_fee'] !== 'Grátis' ? 'MZN' : '' }}
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="fw-bold text-dark">Total Estimado</span>
                    <span class="fs-5 font-black text-dark fw-black" style="font-weight: 900; color: var(--brand-green) !important;">
                        {{ $totals['total'] }} <span class="text-success small fw-bold" style="font-size: 0.8rem;">MZN</span>
                    </span>
                </div>

                <!-- Botão de Ação Proceder -->
                <a href="{{ route('checkout.index') }}" class="btn btn-urban-dark w-100 py-3 shadow-sm text-center">
                    Proceder para o Checkout
                </a>

                
                <div class="text-center mt-3">
                    <span class="text-muted" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;">
                        Transação Local 100% Segura
                    </span>
                </div>
            </div>
        </div>

    </div>
    @else
        <!-- EMPTY STATE PREMIUM: SE O CARRINHO ESTIVER VAZIO -->
        <div class="text-center py-5 my-5">
            <div class="mb-4 display-1 text-muted opacity-50">🛒</div>
            <h1 class="h4 fw-bold text-dark mb-2">O seu carrinho está vazio</h1>
            <p class="text-muted small mb-4 mx-auto" style="max-width: 400px;">Parece que ainda não adicionou nenhum artigo à sua encomenda. Explore a nossa montra para encontrar as melhores ofertas de Moçambique.</p>
            <!-- Redireciona o cliente para a página certa de compras -->
            <a href="{{ route('catalog.explore') }}" class="btn btn-urban-dark px-4 py-2.5">
                Voltar ao Shop / Explorar Produtos
            </a>
        </div>
    @endif
</div>
@endsection
