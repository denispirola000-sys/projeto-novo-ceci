@extends('layouts.app')

@section('content')
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Cadastro de Cliente</h2>
    </div>

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        {{-- Exibição de erros do Laravel --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="row gy-4">
                        {{-- Nome Completo --}}
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="Nome completo" required value="{{ old('name') }}">
                        </div>

                        {{-- Email --}}
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required value="{{ old('email') }}">
                        </div>

                        {{-- Senha --}}
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Senha" required>
                        </div>

                        {{-- Confirmação de Senha --}}
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha" required>
                        </div>

                        {{-- NOTA: Os campos de endereço (telefone, cep, etc.) não fazem parte do registro padrão do Breeze.
                             Teremos que adicioná-los ao banco de dados e ao processo de registro num passo futuro.
                             Por enquanto, vamos focar no essencial para o login funcionar. --}}

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn-get-started" style="padding:12px 35px; border-radius:50px; background:#a0a191; color:#fff; border:none;">Cadastrar</button>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{ route('login') }}">Já tem uma conta? Faça login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection