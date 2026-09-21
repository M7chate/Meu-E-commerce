// public/js/admin-dashboard.js

// 1. Função que controla a alternância dos sub-painéis analíticos
function switchAnalyticsTab(panelId, cardElement) {
    const cards = document.querySelectorAll('.metric-card-clickable');
    cards.forEach(card => card.classList.remove('active-card'));
    
    cardElement.classList.add('active-card');
    
    const panels = document.querySelectorAll('.analytics-detail-panel');
    panels.forEach(panel => {
        panel.classList.add('d-none');
        panel.classList.remove('d-block');
    });
    
    const targetPanel = document.getElementById('panel_' + panelId);
    if (targetPanel) {
        targetPanel.classList.remove('d-none');
        targetPanel.classList.add('d-block');
    }
}

// 2. Função que controla o avanço dos estados de entrega
function advanceOrderStatus(orderId) {
    const statusBadge = document.getElementById('status_' + orderId);
    const actionButton = document.getElementById('btn_' + orderId);
    
    if (!statusBadge || !actionButton) return;

    if (statusBadge.innerText === 'Pendente') {
        statusBadge.innerText = 'Em Trânsito';
        statusBadge.className = 'badge bg-info text-dark font-bold';
        
        actionButton.innerText = '✅ Confirmar Entrega';
        actionButton.className = 'btn btn-logistics-complete';
    } 
    else if (statusBadge.innerText === 'Em Trânsito') {
        statusBadge.innerText = 'Concluído';
        statusBadge.className = 'badge bg-success text-white font-bold';
        
        actionButton.parentNode.innerHTML = '<span class="text-muted small fw-bold">✓ Ciclo Concluído</span>';
    }
}

