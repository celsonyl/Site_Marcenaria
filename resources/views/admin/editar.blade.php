@extends('layout.site')
@section('titulo','Editar Produto')
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('home-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection


@section('conteudo')

<h3>Olá {{Auth::user()->name}}!</h3>

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
    <h3 class="center">Editando Produto</h3>
    <div class="row">
      <form class="" action="{{route('admin.atualizar',$produto->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.form')
        <button class="btn deep-orange" style="margin-top: 10px;">Atualizar</button>
      </form>
    </div>
  </div>


@endsection
