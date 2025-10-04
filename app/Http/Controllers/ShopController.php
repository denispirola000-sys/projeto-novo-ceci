<?php

namespace App\Http\Controllers;

use App\Models\Product; // Precisamos de importar o Model Product
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Mostra a página da loja com os produtos.
     */
    public function index()
    {
        // 1. Busca no banco de dados apenas os produtos que estão 'ativos'
        //    e que têm estoque maior que zero.
        // 2. Ordena pelos mais recentes e prepara a paginação.
        $products = Product::where('status', 'ativo')
                           ->where('estoque', '>', 0)
                           ->latest()
                           ->paginate(9); // Mostra 9 produtos por página

        // 3. Chama a view e envia os produtos encontrados.
        return view('shop.index', compact('products'));
    }
}