@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid p-0">
    
    <div class="mb-5">
        <h1 class="h3 fw-black text-dark m-0" style="font-weight: 800; letter-spacing: -0.02em;">Visão Geral do Negócio</h1>
        <p class="text-muted small m-0 mt-1">Selecione qualquer indicador abaixo para abrir o detalhamento analítico e histórico.</p>
    </div>

    <!-- 1. CARDS DE MÉTRICAS INTERATIVOS -->
    <div class="row g-4" id="metricsContainer">
        
        <!-- Card 1: Faturação Bruta -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="metric-card-clickable active-card" onclick="switchAnalyticsTab('faturamento', this)">
                <div class="metric-label">Faturação Bruta</div>
                <div class="metric-value mt-2 mb-2">
                    124.500,00 <span class="metric-currency">MZN</span>
                </div>
                <div class="small text-muted" style="font-size: 0.75rem;">
                    <span class="text-success fw-bold">&uarr; 12%</span> em relação ao mês passado
                </div>
            </div>
        </div>

        <!-- Card 2: Encomendas Totais -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="metric-card-clickable" onclick="switchAnalyticsTab('encomendas', this)">
                <div class="metric-label">Encomendas Totais</div>
                <div class="metric-value mt-2 mb-2">
                    42 <span class="text-muted" style="font-size: 0.9rem; font-weight: 700;">pedidos</span>
                </div>
                <div class="small text-muted" style="font-size: 0.75rem;">
                    Aguardando envio via portador: <span class="text-warning fw-bold">3</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Artigos Ativos -->
        <div class="col-12 col-md-6 col-xl-4">
            <div class="metric-card-clickable" onclick="switchAnalyticsTab('artigos', this)">
                <div class="metric-label">Artigos em Loja</div>
                <div class="metric-value mt-2 mb-2">
                    8 <span class="text-muted" style="font-size: 0.9rem; font-weight: 700;">produtos</span>
                </div>
                <div class="small text-muted" style="font-size: 0.75rem;">
                    Categorias publicadas na montra: <span class="text-success fw-bold">4</span>
                </div>
            </div>
        </div>

    </div>

        <!-- =================================================------------
         2. PAINÉIS DE DETALHES ANALÍTICOS DINÂMICOS (IDs ALINHADAS)
         ============================================================= -->
    
    <!-- SUB-PAINEL A: CENTRAL DE AUDITORIA E RECONCILIAÇÃO FINANCEIRA -->
    <div id="panel_faturamento" class="analytics-detail-panel shadow-sm d-block">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="h6 m-0 fw-bold text-dark text-uppercase tracking-wider">Central de Auditoria & Extratos</h3>
                <p class="text-muted m-0" style="font-size: 0.75rem;">Consulte e reconcilie as faturas recebidas por carteira móvel.</p>
            </div>
            <span class="badge bg-light text-success border border-success/30 fw-bold">Gateway Conectado</span>
        </div>

        <!-- Barra de Filtros -->
        <div class="audit-search-bar">
            <form action="#" method="GET" class="row g-3 align-items-end">
                <div class="col-12 col-md-4">
                    <label class="form-label small fw-bold text-secondary mb-1">Pesquisar Transação / Cliente</label>
                    <input type="text" class="form-control audit-input w-100" placeholder="Ex: XG84K72M9 ou 84XXXXXXX">
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label small fw-bold text-secondary mb-1">Selecionar Ano</label>
                    <select class="form-select audit-input w-100">
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label small fw-bold text-secondary mb-1">Mês / Período</label>
                    <select class="form-select audit-input w-100">
                        <option value="">Todos os meses</option>
                        <option value="09" selected>Setembro</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <button type="button" class="btn btn-audit-search w-100">🔍 Filtrar</button>
                </div>
            </form>
        </div>

        <!-- Tabela Extratos -->
        <div class="table-responsive">
            <table class="table mini-table m-0">
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Canal</th>
                        <th>Referência / ID Externo</th>
                        <th>Estado Reconciliação</th>
                        <th class="text-end">Valor Líquido</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Localiza a linha do M-Pesa na tabela de extratos e altera a célula da referência: -->
                <tr>
                    <td>18/09/2026 - 11:24</td>
                    <td><span class="fw-bold text-danger">🔴 M-Pesa</span></td>
                    <!-- Envolve a ID num link HTML limpo e dinâmico abrindo noutra aba (_blank) -->
                    <td>
                        <a href="{{ route('catalog.receipt', 1042) }}" target="_blank" class="text-monospace fw-bold text-decoration-none text-success">
                            XG84K72M9 🔗
                        </a>
                    </td>
                    <td><span class="text-success fw-bold">✓ Reconciliado</span></td>
                    <td class="text-end fw-bold text-dark">3.800,00 MZN</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- SUB-PAINEL B: DETALHE DE ENCOMENDAS (Gatilho: 'encomendas') -->
    <div id="panel_encomendas" class="analytics-detail-panel shadow-sm d-none">
        <h3 class="h6 mb-4 fw-bold text-dark text-uppercase tracking-wider">Estado da Logística de Entregas</h3>
        
        <div class="row text-center g-3 mb-4">
            <div class="col-4 border-end">
                <div class="text-warning fw-bold fs-5">3</div>
                <div class="text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">Aguardando Portador</div>
            </div>
            <div class="col-4 border-end">
                <div class="text-primary fw-bold fs-5">5</div>
                <div class="text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">Em Trânsito</div>
            </div>
            <div class="col-4">
                <div class="text-success fw-bold fs-5">34</div>
                <div class="text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">Entregues com Sucesso</div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table mini-table m-0">
                <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Destino</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                        <th class="text-end" style="width: 200px;">Ação Operacional</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="row_order_1042">
                        <td class="fw-bold text-secondary">#1042</td>
                        <td>Bairro Central, Maputo</td>
                        <td>849876543</td>
                        <td><span class="badge bg-warning text-dark font-bold" id="status_1042">Pendente</span></td>
                        <td class="text-end">
                            <button type="button" class="btn btn-logistics-dispatch" id="btn_1042" onclick="advanceOrderStatus(1042)">
                                📦 Despachar Artigo
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SUB-PAINEL C: DETALHE DE ARTIGOS (Gatilho: 'artigos') -->
    <div id="panel_artigos" class="analytics-detail-panel shadow-sm d-none">
        <div class="mb-3">
            <h3 class="h6 fw-bold text-dark text-uppercase tracking-wider m-0">Resumo de Categorias & Stock</h3>
            <p class="text-muted small mt-1 mb-0">Consulte o inventário rápido e a distribuição de artigos publicados na montra.</p>
        </div>
        
        <div class="p-4 text-center border rounded-3 bg-light text-muted small">
            ℹ️ Aceda ao menu <strong class="text-dark">Inventário</strong> na barra lateral esquerda para realizar ações completas de edição, alteração de preços ou exclusão de produtos do banco de dados.
        </div>
    </div>

</div> {{-- Fecho do container-fluid --}}
@endsection
