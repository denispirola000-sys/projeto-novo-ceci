<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
 
    public function store(Request $request)
    {
        $cartItems = \Cart::getContent();
        $userId = Auth::id();
        $order = DB::transaction(function () use ($userId, $cartItems) {

            
            $order = Order::create([
                'user_id' => $userId, 
                'valor_total' => \Cart::getTotal(),
                'status_pedido' => 'Aguardando Pagamento',
            ]);

            
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantidade' => $item->quantity,
                    'preco_unitario' => $item->price,
                ]);
            }
            
            return $order;
        });

        
        \Cart::clear();

      
        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}