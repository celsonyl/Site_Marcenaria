@extends('layout.site')
@section('titulo','Home')
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










<a href="#modal-solicitacoes" class="btn-solicitacao btn-floating btn-large modal-trigger tooltipped indigo lighten-2 pulse"
data-position="left" data-tooltip="Solicitações"><i class="material-icons">person_add</i></a>


@endsection
