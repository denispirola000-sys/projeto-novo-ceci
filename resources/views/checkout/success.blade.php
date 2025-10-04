@extends('layouts.app')

@section('content')
<section id="sucesso" class="section">
    <div class="container text-center" data-aos="fade-up">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
        <h2 class="mt-3">Pedido Realizado com Sucesso!</h2>
        <p class="lead">Obrigado pela sua compra, {{ Auth::user()->name }}!</p>

        {{-- Mostramos o número do pedido que veio do controller --}}
        <p>O número do seu pedido é: <strong>#{{ $order->id }}</strong>.</p>

        <p>Recebemos o seu pedido e em breve os detalhes de pagamento e entrega serão processados.</p>
        <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3" style="background: #a0a191; border: none;">Voltar à Loja</a>
    </div>
</section>
@endsection