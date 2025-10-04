@extends('layouts.app')

@section('content')
<section id="hero" class="hero section dark-background">

    <img src="{{ asset('assets/img/conheca_a_loja.jpg') }}" alt="Banner Ceci Skincare" data-aos="fade-in">

    <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h2>Bem-vindo a Ceci Skincare</h2>
          <p>Sua loja de cuidados com a pele</p>
          <a href="{{ route('login') }}" class="btn-get-started">Login</a>
          <p style="margin-top: 15px;">
            <a href="{{ route('register') }}" style="color: #a0a191; font-weight: 500; text-decoration: underline;">
              Não tem conta? Cadastre-se aqui
            </a>
          </p>
        </div>
      </div>
    </div>

</section>
@endsection