@extends('layouts.app')

@section('content')
<style>
    /* Estilos Premium para a Página de Detalhe */
    .detail-img-container {
        background-color: #f6f6f6;
        border-radius: 1rem;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        height: 100%;
        min-height: 400px;
    }
    .detail-img {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .detail-img-container:hover .detail-img {
        transform: scale(1.03);
    }
    .product-meta-cat {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: var(--brand-accent);
        font-weight: 700;
        letter-spacing: 0.05em;
    }
    .product-detail-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1.2;
    }
    .product-detail-price {
        font-size: 1.75rem;
        font-weight: 900;
        color: var(--brand-green);
    }
    .btn-add-to-cart {
        background-color: var(--brand-green);
        color: white !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        padding: 1rem 2rem;
        border-radius: 0.35rem;
        border: none;
        transition: background-color 0.2s;
    }
    .btn-add-to-cart:hover {
        background-color: var(--brand-accent);
    }
    .badge-stock {
        background-color: #d1fae5;
        color: #065f46;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
    }
    .btn-back-urban {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #4a5568;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 0.6rem 1.2rem;
        border-radius: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    .btn-back-urban:hover {
        color: var(--brand-green);
        border-color: var(--brand-green);
        background-color: var(--brand-green-light);
        transform: translateX(-2px);
    }
</style>

<div class="container">
    
    <!-- Link de Retorno Navegável -->
    <div class="mb-5">
        <a href="{{ route('catalog.explore') }}" class="btn-back-urban">
            <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Voltar para o Catálogo
        </a>
    </div>


    <div class="row g-5 align-items-center">
        <!-- Coluna Esquerda: Moldura de Imagem Estúdio Local -->
        <div class="col-12 col-md-6">
            <div class="detail-img-container border">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="detail-img">
            </div>
        </div>

        <!-- Coluna Direita: Informações, Descrição e Conversão -->
        <div class="col-12 col-md-6">
            <div class="ps-md-4">
                <span class="product-meta-cat">{{ $product['category'] }}</span>
                <h1 class="product-detail-title mt-1 mb-3">{{ $product['name'] }}</h1>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="product-detail-price">
                        {{ number_format($product['price'], 2, ',', '.') }} <span style="font-size: 1rem; font-weight: 700;">MZN</span>
                    </div>
                    <span class="badge-stock">Disponível em Stock</span>
                </div>

                <hr class="my-4" style="border-color: #eeeeee;">

                <div class="mb-4">
                    <h4 class="h6 fw-bold text-dark text-uppercase tracking-wider" style="font-size: 0.75rem;">Descrição do Produto</h4>
                    <p class="text-muted small mt-2" style="line-height: 1.6;">{{ $product['description'] }}</p>
                </div>

                <hr class="my-4" style="border-color: #eeeeee;">

                <!-- Formulário Frontend Pronto para o Envio ao Carrinho -->
                <form action="{{ route('cart.index') }}" method="GET">
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <div style="max-width: 120px;">
                            <label class="form-label small fw-bold text-muted uppercase" style="font-size: 0.65rem;">Qtd</label>
                            <input type="number" name="quantity" value="1" min="1" class="form-control p-2.5 text-center fw-bold" style="border-radius: 0.25rem;">
                        </div>
                        <div class="flex-grow-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-add-to-cart w-100 py-3 shadow-sm">
                                Adicionar ao Carrinho
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
