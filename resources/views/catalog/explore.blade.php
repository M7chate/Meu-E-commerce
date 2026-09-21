@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    <!-- Título da Página -->
    <div class="mb-5">
        <h1 class="h3 fw-black text-dark m-0" style="font-weight: 800; letter-spacing: -0.02em;">Explorar Catálogo</h1>
        <p class="text-muted small m-0 mt-1">Navegue por todo o nosso inventário disponível para entregas.</p>
    </div>

    <div class="row g-4">
        <!-- 1. Barra Lateral de Filtros Avançados -->
        <div class="col-12 col-lg-3">
            <aside class="sidebar-filter-premium shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-uppercase fw-bold text-muted tracking-wider" style="font-size: 0.7rem; letter-spacing: 0.05em;">Filtrar Artigos</span>
                    @if(request('category'))
                        <a href="{{ route('catalog.explore') }}" class="text-decoration-none small text-danger fw-bold" style="font-size: 0.75rem;">Limpar</a>
                    @endif
                </div>
                
                <form action="{{ route('catalog.explore') }}" method="GET">
                    <div class="mb-2">
                        <label class="form-label small fw-bold text-secondary mb-1">Por Categoria</label>
                        <select name="category" onchange="this.form.submit()" class="form-select form-select-custom w-100">
                            <option value="">Todas as Categorias</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </aside>
        </div>

        <!-- 2. Grelha de Produtos Responsiva -->
        <div class="col-12 col-lg-9">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($products as $product)
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
                    <div class="col-12 text-center py-5 text-muted small bg-light rounded w-100">
                        Nenhum produto disponível nesta categoria de momento.
                    </div>
                @endforelse
            </div>

            <!-- Paginação Limpa Controlada pelo Bootstrap 5 local -->
            <div class="d-flex justify-content-center my-5">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
@endsection
