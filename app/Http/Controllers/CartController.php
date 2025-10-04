<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->nome,
            'price' => $product->preco_venda,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->imagem_url,
            )
        ]);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Carrinho atualizado com sucesso!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
        ]);

        \Cart::remove($request->id);

        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho com sucesso!');
    }
}