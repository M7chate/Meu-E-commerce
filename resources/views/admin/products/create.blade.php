@extends('layouts.admin')

@section('admin_content')
<div class="container" style="max-width: 600px;">
    
    <!-- Cabeçalho do Painel do Vendedor -->
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none small text-muted">&larr; Voltar para a listagem</a>
        <h1 class="h3 fw-bold text-dark mt-2">Cadastrar Novo Produto</h1>
        <p class="text-muted small">Preencha os dados abaixo para publicar o artigo na Landing Page da sua loja.</p>
    </div>

    <!-- Formulário Premium de Cadastro -->
    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nome do Produto -->
            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">Nome do Produto</label>
                <input type="text" name="name" class="form-control p-2.5" placeholder="Ex: Relógio Clássico de Couro" required style="border-radius: 0.5rem;">
            </div>

            <!-- Categoria e Preço na mesma linha -->
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary">Categoria</label>
                    <select name="category" class="form-select p-2.5" required style="border-radius: 0.5rem;">
                        <option value="Acessórios">Acessórios</option>
                        <option value="Moda">Moda</option>
                        <option value="Eletrónicos">Eletrónicos</option>
                        <option value="Casa & Conforto">Casa & Conforto</option>
                    </select>
                </div>
                <div class="col-6">
                    <label class="form-label small fw-bold text-secondary">Preço (MZN)</label>
                    <input type="number" name="price" step="0.01" class="form-control p-2.5" placeholder="0,00" required style="border-radius: 0.5rem;">
                </div>
            </div>

            <!-- Componente de Upload da Imagem Local -->
            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary">Imagem do Produto (Fundo Limpo)</label>
                <div class="border rounded-3 p-3 bg-light text-center" style="border-style: dashed !important; border-color: #cbd5e1 !important;">
                    <input type="file" name="image" class="form-control form-control-sm" accept="image/*" required>
                    <div class="form-text text-muted" style="font-size: 0.7rem; mt-1;">Apenas formatos JPG, PNG ou WEBP. O ficheiro será guardado localmente de forma segura.</div>
                </div>
            </div>

            <!-- Botão de Submissão -->
            <button type="submit" class="btn w-100 py-2.5 fw-bold text-white shadow-sm" style="background-color: #0d3826; border-radius: 0.5rem;">
                Publicar Produto no Catálogo
            </button>
        </form>
    </div>

</div>
@endsection
