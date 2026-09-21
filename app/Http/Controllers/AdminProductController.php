<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // 1. Listagem de Produtos do Inventário
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Classic Men\'s Watch Leather', 'category' => 'Acessórios', 'price' => 3800.00],
            ['id' => 2, 'name' => 'Elegant Minimalist Handbag', 'category' => 'Moda', 'price' => 2900.00],
            ['id' => 3, 'name' => 'Wireless Pro Earbuds v2', 'category' => 'Eletrónicos', 'price' => 1900.00],
        ];
        return view('admin.products.index', compact('products'));
    }

    // 2. Formulário de Criação
    public function create()
    {
        return view('admin.products.create');
    }

    // 3. Formulário de Edição (Traz o produto simulado pré-preenchido)
    public function edit($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Classic Men\'s Watch Leather',
            'category' => 'Acessórios',
            'price' => 3800.00
        ];
        return view('admin.products.edit', compact('product'));
    }

    // 4. Configurações da Loja
    public function settings()
    {
        $shop = [
            'name' => 'Urban Cart Maputo',
            'whatsapp' => '+258 84 123 4567',
            'mpesa' => '841234567',
        ];
        return view('admin.settings', compact('shop'));
    }

    public function store(Request $request)
    {
        // Lógica de salvamento real no banco (Ciclo Backend)
    }
    public function dashboard() {
        return view('admin.dashboard');
    }

}
