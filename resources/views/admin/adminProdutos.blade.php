@extends('layout.site')
@section('titulo','Produtos')
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
    <h1><center>EDITAR PRODUTO</center></h1>

    <div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Disponivel</th>
          <th>Foto</th>
        </tr>
      </thead>
      <tbody>        
        @foreach($produtos as $produto)
          <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->valor }}</td>
            <td>{{ $produto->disponivel }}</td>
          <td><img height="60" src="{{asset($produto->foto)}}"/></td>
            <td>
              <a class="btn deep-orange" href="{{ route('admin.produto.editar',$produto->id) }}">Editar</a>
              <a class="btn red" href="{{ route('admin.produto.apagar',$produto->id) }}">Deletar</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>






@endsection
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
