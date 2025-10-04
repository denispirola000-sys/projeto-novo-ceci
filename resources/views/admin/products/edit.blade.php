@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Produto: {{ $product->nome }}</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve alguns problemas com os dados inseridos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Método especial para indicar que é uma atualização --}}

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="nome" class="form-label">Nome do Produto*</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $product->nome) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status*</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="ativo" {{ old('status', $product->status) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ old('status', $product->status) == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ old('descricao', $product->descricao) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="preco_venda" class="form-label">Preço de Venda*</label>
                <input type="number" name="preco_venda" id="preco_venda" class="form-control" step="0.01" value="{{ old('preco_venda', $product->preco_venda) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="estoque" class="form-label">Estoque Disponível*</label>
                <input type="number" name="estoque" id="estoque" class="form-control" value="{{ old('estoque', $product->estoque) }}" required>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="imagem_url" class="form-label">URL da Imagem*</label>
                <input type="text" name="imagem_url" id="imagem_url" class="form-control" value="{{ old('imagem_url', $product->imagem_url) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="data_validade" class="form-label">Data de Validade</label>
                <input type="date" name="data_validade" id="data_validade" class="form-control" value="{{ old('data_validade', $product->data_validade) }}">
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection