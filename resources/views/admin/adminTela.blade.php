@extends('layout.site')
@section('titulo','Home')
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('home-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection


@section('conteudo')


@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<br>
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif





<div class="container">


<div class="row">
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor</th>
          <th>Valor Total</th>
          <th></th>

        </tr>
      </thead>

@foreach($encomendas as $encomenda)
<?php

$cliente = App\User::select('*')
->where('id',$encomenda->idCliente)
->first();

$produto = App\Produto::select('nome')
->where('id',$encomenda->idProduto)
->first();


?>

   
      <tbody>        
          <tr>
            <td>{{ $cliente->name }}</td>
            <td>{{ $cliente->telefone }}</td>
            <td> {{$produto->nome}} </td>
            <td>{{$encomenda->quantidade }}</td>
            <td>{{$encomenda->valor}}</td>
            <td>{{$encomenda->valor*$encomenda->quantidade}}</td>
            <td>
            <form action="{{ route('encomenda.atualizar') }}" method="post" name="form_deletar">
            {{ csrf_field() }}
            <input type="hidden" name="idCliente" value="{{$encomenda->idCliente}}">
            <input type="hidden" name="idProduto" value="{{$encomenda->idProduto}}">

            <button id="btn-deletar" class="waves-effect waves-light btn green">Finalizar</button>
            </form>
            </td>
          </tr>

    @endforeach

    
    </tbody>
    </table>


    </div>









<br><br><br><br>




@endsection
