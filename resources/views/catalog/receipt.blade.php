@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    
    <div class="receipt-frame">
        <!-- Cabeçalho do Talão -->
        <div class="text-center mb-4">
            <div class="receipt-header-logo">🛒 {{ $shopConfig['name'] }}</div>
            <div class="text-muted small mt-1">Comprovativo de Transação Eletrónica</div>
            <div class="badge bg-success text-white mt-2 px-3 py-1.5 fw-bold" style="font-size: 0.7rem; border-radius: 50px;">✓ PEDIDO LIQUIDADO COM SUCESSO</div>
        </div>

        <div class="receipt-divider-dashed"></div>

        <!-- Metadados de Auditoria Fiscal -->
        <div class="row g-2 small mb-3">
            <div class="col-6 text-muted">Referência SaaS:</div>
            <div class="col-6 text-end fw-bold text-dark">{{ $order['ref'] }}</div>
            
            <div class="col-6 text-muted">ID Externo Gateway:</div>
            <div class="col-6 text-end text-monospace-receipt text-danger">{{ $order['transaction_id'] }}</div>
            
            <div class="col-6 text-muted">Data de Liquidação:</div>
            <div class="col-6 text-end text-dark fw-semibold">{{ $order['date'] }}</div>

            <div class="col-6 text-muted">Método Utilizado:</div>
            <div class="col-6 text-end text-dark fw-bold">{{ $order['payment_method'] }}</div>
        </div>

        <div class="receipt-divider-dashed"></div>

        <!-- Dados do Cliente -->
        <div class="small mb-2">
            <div class="fw-bold text-dark text-uppercase tracking-wider mb-2" style="font-size: 0.7rem;">Dados do Destinatário</div>
            <div class="text-dark fw-semibold">{{ $order['customer_name'] }}</div>
            <div class="text-muted mt-0.5">{{ $order['customer_phone'] }}</div>
            <div class="text-muted mt-0.5" style="line-height: 1.3;">{{ $order['customer_address'] }}</div>
        </div>

        <div class="receipt-divider-dashed"></div>

        <!-- Descriminação dos Artigos -->
        <div class="mb-3">
            <div class="fw-bold text-dark text-uppercase tracking-wider mb-2" style="font-size: 0.7rem;">Artigos Adquiridos</div>
            <div class="d-flex flex-column gap-2">
                @foreach($order['items'] as $item)
                    <div class="d-flex justify-content-between small text-dark">
                        <span>1x {{ $item['name'] }}</span>
                        <span class="fw-bold">{{ number_format($item['price'], 2, ',', '.') }} MZN</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="receipt-divider-dashed"></div>

        <!-- Fechamento Contábil -->
        <div class="row g-2 small mb-4">
            <div class="col-6 text-muted">Subtotal:</div>
            <div class="col-6 text-end text-dark fw-semibold">{{ number_format($order['subtotal'], 2, ',', '.') }} MZN</div>
            
            <div class="col-6 text-muted">Taxa de Logística:</div>
            <div class="col-6 text-end text-dark fw-semibold">{{ number_format($order['delivery_fee'], 2, ',', '.') }} MZN</div>
            
            <div class="col-12 my-2 border-top border-light"></div>
            
            <div class="col-6 fw-bold text-dark fs-6">Total Pago:</div>
            <div class="col-6 text-end fw-black text-dark fs-5" style="font-weight: 900; color: var(--brand-green) !important;">
                {{ number_format($order['total'], 2, ',', '.') }} <span style="font-size: 0.75rem; font-weight: 700;">MZN</span>
            </div>
        </div>

        <!-- Ações Nativas do Comprovativo -->
        <div class="d-flex justify-content-center gap-3 pt-2">
            <button type="button" onclick="window.print()" class="btn btn-print-receipt d-inline-flex align-items-center gap-2">
                🖨️ Imprimir Talão
            </button>
        </div>
    </div>

</div>
@endsection
