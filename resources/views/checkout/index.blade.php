@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 900px;">
    
    <div class="mb-4">
        <a href="{{ route('cart.index') }}" class="text-decoration-none small text-success fw-bold">&larr; Voltar ao Carrinho</a>
        <h1 class="h3 fw-extrabold text-dark m-0 mt-2">Finalizar Encomenda</h1>
        <p class="text-muted small m-0 mt-1">Insira os seus dados de entrega e selecione a sua carteira móvel para pagamento instantâneo.</p>
    </div>

    <!-- Duas Colunas: Formulário à esquerda e Resumo Financeiro à direita -->
    <div class="row g-4">
        
        <!-- Coluna Esquerda: Dados do Cliente -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm p-4 bg-white rounded-4 border">
                <form action="#" method="POST" class="d-flex flex-column gap-3">
                    @csrf

                    <h3 class="h6 fw-bold text-dark text-uppercase tracking-wider mb-2" style="color: var(--brand-green) !important;">1. Dados de Envio</h3>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-secondary mb-1">Nome Completo</label>
                            <input type="text" name="customer_name" class="form-control form-control-custom w-100" placeholder="Ex: Mateus Gomis" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-secondary mb-1">Endereço de Entrega (Bairro / Av.)</label>
                            <input type="text" name="customer_address" class="form-control form-control-custom w-100" placeholder="Ex: Av. 24 de Julho, Bairro Central" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label small fw-bold text-secondary mb-1">Cidade</label>
                            <select name="customer_city" class="form-select form-control-custom w-100" required>
                                <option value="Maputo">Cidade de Maputo</option>
                                <option value="Matola">Cidade da Matola</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-3" style="border-color: #f1f5f9;">

                                        <!-- 🌟 SELECÇÃO DE PAGAMENTO MULTICANAL (CORRIGIDO) -->
                    <h3 class="h6 fw-bold text-dark text-uppercase tracking-wider mb-2" style="color: var(--brand-green) !important;">2. Método de Pagamento</h3>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary mb-2">Selecione como deseja pagar</label>
                        <!-- Grelha responsiva de 3 colunas para telemóveis e desktop -->
                        <div class="row g-2">
                            <div class="col-12 col-md-4">
                                <div class="form-check p-3 border rounded-3 bg-light h-100">
                                    <input class="form-check-input ms-0 me-2" type="radio" name="payment_provider" id="pay_mpesa" value="mpesa" checked>
                                    <label class="form-check-label fw-bold text-dark" for="pay_mpesa">🔴 M-Pesa</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-check p-3 border rounded-3 bg-light h-100">
                                    <input class="form-check-input ms-0 me-2" type="radio" name="payment_provider" id="pay_emola" value="emola">
                                    <label class="form-check-label fw-bold text-dark" for="pay_emola">🔶 e-Mola</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-check p-3 border rounded-3 bg-light h-100">
                                    <input class="form-check-input ms-0 me-2" type="radio" name="payment_provider" id="pay_card" value="card">
                                    <label class="form-check-label fw-bold text-dark" for="pay_card">💳 Cartão (Visa/MC)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bloco de inputs dinâmicos que o JavaScript controlará depois -->
                                        <!-- Bloco do Número de Telefone ou Cartão -->
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary mb-1">Número de Telefone ou do Cartão</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">+258</span>
                            
                        </div>
                        <div class="form-text text-muted mt-2" style="font-size: 0.7rem;">O sistema detetará o canal selecionado e processará o Push SIM ou a autenticação segura do banco em segundo plano [finance].</div>
                    </div>

                    <!-- 🌟 REPOSTO E BLINDADO: BOTÃO PRINCIPAL DE DISPARO DE PAGAMENTO -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-urban-dark w-100 py-3 shadow-sm text-center font-bold">
                            🚀 Confirmar Pedido & Pagar Agora
                        </button>
                    </div>

                </form> {{-- Fecho correto do Form --}}
            </div> {{-- Fecho da div.card --}}
        </div> {{-- Fecho da col-lg-7 --}}

                <!-- Coluna Direita: Resumo da Compra Purificado-->
        <div class="col-12 col-lg-5">
            <div class="card summary-card shadow-sm border p-4 bg-light rounded-4">
                <h2 class="summary-title" style="font-size: 1rem; font-weight: 800; color: var(--brand-green); text-transform: uppercase; margin-bottom: 1.5rem;">Resumo da Compra</h2>
                
                <div class="d-flex flex-column gap-2 mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between text-dark small">
                        <span>1x Classic Men's Watch Leather</span>
                        <span class="fw-bold">3.800,00 MZN</span>
                    </div>
                    <div class="d-flex justify-content-between text-dark small">
                        <span>1x Wireless Pro Earbuds v2</span>
                        <span class="fw-bold">1.900,00 MZN</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="text-muted small">Subtotal</span>
                    <!-- Exibe o valor processado pelo controlador -->
                    <span class="fw-bold text-dark">{{ $totals['subtotal'] }} MZN</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="text-muted small">Taxa de Entrega</span>
                    <!-- Exibe "Grátis" em verde ou o valor formatado em MZN -->
                    <span class="{{ $totals['delivery_fee'] === 'Grátis' ? 'text-success small fw-bold' : 'fw-bold text-dark' }}">
                        {{ $totals['delivery_fee'] }} {{ $totals['delivery_fee'] !== 'Grátis' ? 'MZN' : '' }}
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-dark">Total a Pagar</span>
                    <!-- Exibe o total final trancado e calculado no servidor -->
                    <span class="fs-4 font-black text-dark fw-black" style="font-weight: 900; color: var(--brand-green) !important;">
                        {{ $totals['total'] }} <span style="font-size: 0.8rem; font-weight: 700;">MZN</span>
                    </span>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
