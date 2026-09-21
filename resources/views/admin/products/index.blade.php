@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid p-0">
    
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-4 mb-5">
        <div>
            <h1 class="h3 fw-black text-dark m-0" style="font-weight: 800; letter-spacing: -0.02em;">Gestão de Inventário</h1>
            <p class="text-muted small m-0 mt-1">Gerencie os artigos publicados, preços e o fluxo de exibição na montra da loja.</p>
        </div>
        <div>
            <!-- Substitui a linha do botão Cadastrar por esta: -->
        <a href="{{ route('admin.products.create') }}" class="btn btn-urban-primary shadow-sm">
            <svg xmlns="http://w3.org" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5a.5.5 0 0 1 .5-.5"/>
            </svg>
            Cadastrar Novo Produto
        </a>

        </div>
    </div>

    <div class="admin-inventory-card shadow-sm">
        <div class="table-responsive">
            <table class="table table-urban-premium m-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th style="width: 70px;">Visual</th>
                        <th>Nome do Produto</th>
                        <th>Categoria</th>
                        <th class="text-end">Preço Atual</th>
                        <th class="text-end" style="width: 220px;">Ações de Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $product['id'] }}</td>
                            <td>
                                <div class="product-thumb-frame border">
                                    <img src="{{ asset('storage/produtos/relogio.jpg') }}" alt="{{ $product['name'] }}">
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark" style="font-size: 0.9rem;">{{ $product['name'] }}</div>
                            </td>
                            <td>
                                <span class="badge-urban-cat">{{ $product['category'] }}</span>
                            </td>
                            <td class="text-end fw-black text-dark" style="font-weight: 800;">
                                {{ number_format($product['price'], 2, ',', '.') }} <span class="text-success small fw-bold" style="font-size: 0.75rem;">MZN</span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product['id']) }}" class="btn btn-action-edit">Editar</a>
                                    <button type="button" class="btn btn-action-delete">Eliminar</button>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted small bg-white">
                                <div class="mb-2 fs-4">📦</div>
                                Nenhum artigo disponível no inventário.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
