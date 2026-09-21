@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 60vh;">
    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white w-100" style="max-width: 450px;">
        
        <!-- Identidade do SaaS -->
        <div class="text-center mb-4">
            <span class="fs-3">🛒</span>
            <h1 class="h4 fw-bold text-dark mt-2 mb-1">Entrar no Painel</h1>
            <p class="text-muted small">Aceda à gestão de stock e encomendas da sua loja online.</p>
        </div>

        <!-- Formulário de Autenticação -->
        <form action="#" method="POST">
            @csrf

            <!-- E-mail do Lojista -->
            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">E-mail Corporativo</label>
                <input type="email" name="email" class="form-control p-2.5" placeholder="exemplo@loja.co.mz" required style="border-radius: 0.5rem;">
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label small fw-bold text-secondary m-0">Palavra-passe</label>
                    <a href="#" class="text-decoration-none small text-success" style="font-size: 0.75rem;">Esqueceu-se?</a>
                </div>
                <input type="password" name="password" class="form-control p-2.5" placeholder="••••••••" required style="border-radius: 0.5rem;">
            </div>

            <!-- Botão de Entrada -->
            <button type="submit" class="btn w-100 py-2.5 fw-bold text-white shadow-sm" style="background-color: #0d3826; border-radius: 0.5rem;">
                Entrar na Minha Loja
            </button>
        </form>

        <!-- Link de Registo de Novas Lojas -->
        <div class="text-center mt-4 pt-3 border-top" style="border-color: #f1f5f9 !important;">
            <p class="small text-muted m-0">Ainda não tem uma loja? <a href="#" class="text-success fw-bold text-decoration-none">Criar Conta SaaS</a></p>
        </div>

    </div>
</div>
@endsection
