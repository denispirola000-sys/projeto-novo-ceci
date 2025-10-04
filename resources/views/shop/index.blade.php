@extends('layouts.app')

@section('content')
<section id="produtos" class="section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Nossos Produtos</h2>
        <p>Descubra o melhor para sua pele com nossa seleção exclusiva.</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            
            @forelse ($products as $product)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card product-card w-100">
                        <img src="{{ $product->imagem_url }}" class="card-img-top" alt="{{ $product->nome }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->nome }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($product->descricao, 100) }}</p>
                            <p class="card-price mb-3" style="font-size: 1.5rem; font-weight: bold; color: #a0a191;">R$ {{ number_format($product->preco_venda, 2, ',', '.') }}</p>
                            
                           <form action="{{ route('cart.add') }}" method="post" class="mt-auto">
                            @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary w-100" style="background: #a0a191; border: none;">
                                        <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nenhum produto disponível no momento.</p>
                </div>
            @endforelse

        </div>

        {{-- Links da paginação --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection