@extends('layouts.admin')

@section('admin_content')
<div class="container" style="max-width: 600px;">
    
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none small text-muted">&larr; Voltar para a listagem</a>
        <h1 class="h3 fw-bold text-dark mt-2">Editar Produto #{{ $product['id'] }}</h1>
        <p class="text-muted small">Atualize as informações do artigo abaixo.</p>
    </div>

    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">Nome do Produto</label>
                <input type="text" name="name" class="form-control p-2.5" value="{{ $product['name'] }}" required style="border-radius: 0.5rem;">
            </div>

            <div class="row g-3 mb-3">
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary">Categoria</label>
                    <select name="category" class="form-select p-2.5" required style="border-radius: 0.5rem;">
                        <option value="Acessórios" {{ $product['category'] == 'Acessórios' ? 'selected' : '' }}>Acessórios</option>
                        <option value="Moda" {{ $product['category'] == 'Moda' ? 'selected' : '' }}>Moda</option>
                        <option value="Eletrónicos" {{ $product['category'] == 'Eletrónicos' ? 'selected' : '' }}>Eletrónicos</option>
                    </select>
                </div>
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary">Preço (MZN)</label>
                    <input type="number" name="price" step="0.01" class="form-control p-2.5" value="{{ $product['price'] }}" required style="border-radius: 0.5rem;">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary">Substituir Imagem (Opcional)</label>
                <div class="border rounded-3 p-3 bg-light text-center" style="border-style: dashed !important; border-color: #cbd5e1 !important;">
                    <input type="file" name="image" class="form-control form-control-sm" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn w-100 py-2.5 fw-bold text-white shadow-sm" style="background-color: #0d3826; border-radius: 0.5rem;">
                Guardar Alterações
            </button>
        </form>
    </div>

</div>
@endsection
