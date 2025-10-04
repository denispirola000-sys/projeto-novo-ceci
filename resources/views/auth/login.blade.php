{{-- 1. Usamos o nosso novo layout público --}}
@extends('layouts.app')

@section('content')
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Login</h2>
        
        {{-- 2. Exibição de erros do Laravel --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                {{-- 3. O formulário aponta para a rota 'login' do Laravel --}}
                <form action="{{ route('login') }}" method="POST">
                    @csrf {{-- 4. Token de segurança obrigatório --}}

                    <div class="row gy-4">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" required value="{{ old('email') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Senha" required>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn-get-started" style="padding:12px 35px; border-radius:50px; background:#a0a191; color:#fff; border:none;">Entrar</button>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{ route('register') }}">Não tem uma conta? Cadastre-se</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection