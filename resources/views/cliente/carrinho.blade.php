@extends('layout.site')
@section('titulo','Carrinho')



@if (Auth::check())

  @include('layout._includes.sidenav')

@else

  @section('login','Login')
  @section('cadastro','Cadastro')


  @section('navbar')

    @include('layout._includes.navbar')

  @endsection

@endif

@section('conteudo')




@foreach ($itens_carrinho as $produto)

<div class="col s12 m6 l4">
  <div class="card">
      <span class="card-title">idProduto: {{$produto->idProduto}}</span>
    </div>
    <div class="card-content">

    </div>
  </div>
</div>

@endforeach













@endsection
