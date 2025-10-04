@extends('layouts.app')

@section('content')
    <section id="carrinho" class="section">
        <div class="container section-title">
            <h2>Meu Carrinho de Compras</h2>
        </div>

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(\Cart::isEmpty())
                <div class="alert alert-warning text-center">
                    <h4>Seu carrinho está vazio!</h4>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3"
                        style="background: #a0a191; border: none;">Ver Produtos</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Produto</th>
                                <th class="text-center">Preço</th>
                                <th class="text-center" style="width: 150px;">Quantidade</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td>
                                        {{-- Formulário para ATUALIZAR quantidade --}}
                                        <form action="{{ route('cart.update') }}" method="POST"
                                            class="d-flex justify-content-center">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="number" name="quantity" class="form-control form-control-sm text-center"
                                                value="{{ $item->quantity }}" min="1">
                                            <button type="submit" class="btn btn-primary btn-sm ms-2">Atualizar</button>
                                        </form>
                                    </td>
                                    <td class="text-center">R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        {{-- Formulário para REMOVER item --}}
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4 justify-content-end">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Resumo do Pedido</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold fs-5">
                                        Total
                                        <span>R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                                    </li>
                                </ul>
                                <div class="d-grid gap-2 mt-3">
                                    <form action="{{ route('checkout.store') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Finalizar Compra</button>
                                    </form>
                                    <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">Continuar a
                                        Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection