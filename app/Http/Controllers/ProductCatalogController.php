<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index()
    {
        // Simulando a tabela shop_settings que o lojista edita no painel
        $shopConfig = [
            'name' => 'URBAN CART MAPUTO',
            'whatsapp' => '+258 84 123 4567',
            'email' => 'suporte@urbancart.co.mz',
            'mpesa' => '841234567',
            'promo_code' => 'WELCOME15',
            'promo_discount' => 15,
            // Novos dados simulados do Hero Banner
            'hero_title' => 'Os Teus Produtos Favoritos, Entregues a Ti.',
            'hero_description' => 'Descobre artigos de alta qualidade, ofertas exclusivas e tudo o que precisas para o teu dia a dia num único lugar seguro.',
            'hero_image' => asset('images/hero-banner.jpg'),
            'delivery_fee' => 250.00
        ];

        $bestSellers = [
            ['id' => 1, 'name' => 'Classic Men\'s Watch Leather', 'category' => 'Acessórios', 'price' => 3800.00, 'image' => asset('storage/produtos/relogio.jpg')],
            ['id' => 2, 'name' => 'Elegant Minimalist Handbag', 'category' => 'Moda', 'price' => 2900.00, 'image' => asset('storage/produtos/mala.jpg')],
            ['id' => 3, 'name' => 'Wireless Pro Earbuds v2', 'category' => 'Eletrónicos', 'price' => 1900.00, 'image' => asset('storage/produtos/earbuds.jpg')],
            ['id' => 4, 'name' => 'Scented Soy Candle Premium', 'category' => 'Casa & Conforto', 'price' => 1250.00, 'image' => asset('storage/produtos/vela.jpg')],
        ];

        $categories = ['Acessórios', 'Moda', 'Eletrónicos', 'Casa & Conforto'];

        return view('catalog.index', compact('bestSellers', 'categories', 'shopConfig'));
    }

    public function show($id)
    {
        $shopConfig = [
            'name' => 'URBAN CART MAPUTO',
            'whatsapp' => '+258 84 123 4567',
            'email' => 'suporte@urbancart.co.mz',
            'mpesa' => '841234567'
        ];

        $productsCollection = collect([
            ['id' => 1, 'name' => 'Classic Men\'s Watch Leather', 'category' => 'Acessórios', 'price' => 3800.00, 'description' => 'Relógio clássico com bracelete de couro legítimo. Design minimalista perfeito para ocasiões formais.', 'image' => asset('storage/produtos/relogio.jpg')],
            ['id' => 2, 'name' => 'Elegant Minimalist Handbag', 'category' => 'Moda', 'price' => 2900.00, 'description' => 'Mala de mão elegante com acabamento premium e espaço interno otimizado.', 'image' => asset('storage/produtos/mala.jpg')],
            ['id' => 3, 'name' => 'Wireless Pro Earbuds v2', 'category' => 'Eletrónicos', 'price' => 1900.00, 'description' => 'Auriculares sem fios com cancelamento de ruído ativo e Bluetooth 5.3.', 'image' => asset('storage/produtos/earbuds.jpg')],
            ['id' => 4, 'name' => 'Scented Soy Candle Premium', 'category' => 'Casa & Conforto', 'price' => 1250.00, 'description' => 'Vela aromática artesanal feita com cera de soja 100% natural.', 'image' => asset('storage/produtos/vela.jpg')],
        ]);

        $product = $productsCollection->where('id', $id)->first() ?? $productsCollection->first();

        return view('catalog.show', compact('product', 'shopConfig'));
    }
        // 2. A PÁGINA DE EXPLORAÇÃO COMPLETA (SHOP COM FILTROS)
    public function explore(Request $request)
    {
        $shopConfig = [
            'name' => 'URBAN CART MAPUTO',
            'whatsapp' => '+258 84 123 4567',
            'email' => 'suporte@urbancart.co.mz',
            'mpesa' => '841234567'
        ];

        // Coleção completa de produtos para simular a paginação do banco
        $allProducts = collect([
            ['id' => 1, 'name' => 'Classic Men\'s Watch Leather', 'category' => 'Acessórios', 'price' => 3800.00, 'image' => asset('storage/produtos/relogio.jpg')],
            ['id' => 2, 'name' => 'Elegant Minimalist Handbag', 'category' => 'Moda', 'price' => 2900.00, 'image' => asset('storage/produtos/mala.jpg')],
            ['id' => 3, 'name' => 'Wireless Pro Earbuds v2', 'category' => 'Eletrónicos', 'price' => 1900.00, 'image' => asset('storage/produtos/earbuds.jpg')],
            ['id' => 4, 'name' => 'Scented Soy Candle Premium', 'category' => 'Casa & Conforto', 'price' => 1250.00, 'image' => asset('storage/produtos/vela.jpg')],
            ['id' => 5, 'name' => 'Trendy Sneakers Active Green', 'category' => 'Moda', 'price' => 4200.00, 'image' => asset('storage/produtos/relogio.jpg')],
            ['id' => 6, 'name' => 'Travel Waterproof Backpack', 'category' => 'Acessórios', 'price' => 3200.00, 'image' => asset('storage/produtos/mala.jpg')],
        ]);

        // Filtro por Categoria simulado se vier na URL
        if ($request->has('category') && $request->category != '') {
            $allProducts = $allProducts->where('category', $request->category);
        }

        // Paginação manual para o Blade reconhecer os botões nativos do Bootstrap
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $perPage = 4;
        $currentItems = $allProducts->slice(($currentPage - 1) * $perPage, $perPage)->all();
        
        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentItems, 
            $allProducts->count(), 
            $perPage, 
            $currentPage, 
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $categories = ['Acessórios', 'Moda', 'Eletrónicos', 'Casa & Conforto'];

        return view('catalog.explore', compact('products', 'categories', 'shopConfig'));
    }

        // Exemplo de como a lógica roda blindada no backend antes de mandar os dados à tela
    public function showCart()
    {
        $shopConfig = ['delivery_fee' => 250.00]; // Simulação do MySQL Settings
        $subtotalAmount = 5700.00;                 // Simulação do MySQL Products

        // A LÓGICA DE NEGÓCIO DA TAXA RODA AQUI (BACKEND)
        $deliveryFeeValue = $shopConfig['delivery_fee'];
        $totalAmount = $subtotalAmount + $deliveryFeeValue;

        // Formatação final dos dados para a view apenas exibir
        $totals = [
            'subtotal' => number_format($subtotalAmount, 2, ',', '.'),
            'delivery_fee' => $deliveryFeeValue > 0 ? number_format($deliveryFeeValue, 2, ',', '.') : 'Grátis',
            'total' => number_format($totalAmount, 2, ',', '.')
        ];

        return view('cart.index', compact('totals'));
    }

        // Método adicionado para processar a lógica de totais do carrinho no backend
    public function cart()
    {
        // 1. Dados simulados (Mock) que virão do banco de dados no futuro
        $shopConfig = [
            'delivery_fee' => 250.00 // Podes mudar para 0.00 para testar o modo "Grátis"
        ];
        
        $subtotalAmount = 5700.00; // Soma fictícia dos itens do carrinho

        // 2. A Lógica de Negócio roda trancada aqui no servidor
        $deliveryFeeValue = $shopConfig['delivery_fee'] ?? 0;
        $totalAmount = $subtotalAmount + $deliveryFeeValue;

        // 3. Montamos o array exatamente como o teu novo Blade espera ler
        $totals = [
            'subtotal' => number_format($subtotalAmount, 2, ',', '.'),
            'delivery_fee' => $deliveryFeeValue > 0 ? number_format($deliveryFeeValue, 2, ',', '.') : 'Grátis',
            'total' => number_format($totalAmount, 2, ',', '.')
        ];

        // 4. Enviamos também o shopConfig para o formulário de cupão não quebrar
        $shopConfigData = [
            'name' => 'URBAN CART MAPUTO',
            'promo_code' => 'WELCOME15',
            'promo_discount' => 15
        ];

        return view('cart.index', [
            'totals' => $totals,
            'shopConfig' => $shopConfigData
        ]);
    }

        // Método adicionado para processar a lógica de faturamento do checkout no backend
    public function checkout()
    {
        // 1. Simulação dos dados que viriam do MySQL na fase de persistência
        $shopConfig = [
            'name' => 'URBAN CART MAPUTO',
            'whatsapp' => '+258 84 123 4567',
            'email' => 'suporte@urbancart.co.mz',
            'mpesa' => '841234567',
            'delivery_fee' => 250.00 // Podes alterar para 0.00 para simular frete Grátis
        ];
        
        $subtotalAmount = 5700.00; // Valor fixo dos produtos do carrinho

        // 2. A Lógica de Negócio corre segura aqui dentro do servidor
        $deliveryFeeValue = $shopConfig['delivery_fee'] ?? 0;
        $totalAmount = $subtotalAmount + $deliveryFeeValue;

        // 3. Empacotamos os totais formatados para a view exibir sem fazer contas
        $totals = [
            'subtotal' => number_format($subtotalAmount, 2, ',', '.'),
            'delivery_fee' => $deliveryFeeValue > 0 ? number_format($deliveryFeeValue, 2, ',', '.') : 'Grátis',
            'total' => number_format($totalAmount, 2, ',', '.')
        ];

        return view('checkout.index', [
            'shopConfig' => $shopConfig,
            'totals' => $totals
        ]);
    }


        public function receipt($id)
    {
        $shopConfig = ['name' => 'URBAN CART MAPUTO'];
        
        // Simulação dos dados reais armazenados na tabela de pedidos e logs de auditoria
        $order = [
            'id' => $id,
            'ref' => '2026-A1042',
            'date' => date('d/m/Y H:i:s'),
            'customer_name' => 'Mateus Gomis',
            'customer_phone' => '+258 84 987 6543',
            'customer_address' => 'Av. 24 de Julho, Bairro Central, Maputo',
            'payment_method' => '🔴 Vodacom M-Pesa',
            'transaction_id' => 'XG84K72M9',
            'items' => [
                ['name' => "Classic Men's Watch Leather", 'price' => 3800.00],
                ['name' => "Wireless Pro Earbuds v2", 'price' => 1900.00]
            ],
            'subtotal' => 5700.00,
            'delivery_fee' => 250.00,
            'total' => 5950.00
        ];

        return view('catalog.receipt', compact('order', 'shopConfig'));
    }


}
