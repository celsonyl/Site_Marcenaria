@extends('layout.site')
@section('titulo','Home')



@if (Auth::check())

@section('sair','Sair')

@else

@section('login','Login')
@section('cadastro','Cadastro')

@endif




@section('navbar')

@include('layout._includes.navbar')

@endsection

@section('conteudo')


<h3>Index</h3>
<section>

  <div class="row">


    <!-- Fazer foreach aqui!-->
    <!-- - - INICIO - - -->


    @foreach ($produtos as $produto)


    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image">
          <img src="{{$produto->foto}}">
          <span class="card-title">Nome: {{$produto->nome}}</span>
        </div>
        <div class="card-content">
          <p>Descrição: {{$produto->descricao}}</p>
        </div>
        <div class="card-content">

          <p>Valor: {{$produto->valor}}</p>
        </div>
        <div class="card-action">
          <a href="#">Comprar</a>
        </div>
      </div>
    </div>

    @endforeach



  </div>

</section>




@endsection
