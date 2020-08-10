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


      <h3><center style="font-family: sans-serif;">Cadastro de Produto</center></h3>
      <div class="container">
        <div class="row">


        <form action="{{ route('admin.produto.cadastrar')}}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="input-field">
            <input type="text" name="nome" id="nome">
            <label for="nome" style="font-family: sans-serif;">Nome</label>
          </div>


          <div class="input-field">
            <input type="text" name="descricao" id="descricao">
            <label for="descricao"  style="font-family: sans-serif;">Descrição</label>
          </div>


          <div class="input-field">
            <input type="number" step="0.01" min="0" name="valor" id="valor">
            <label for="valor" style="font-family: sans-serif;">Valor</label>
          </div>

          <div class="file-field  input-field">
            <div class="btn indigo brown lighten-1">
              <span  style="font-family: sans-serif;">Selecionar imagem</span>
              <input type="file" name="imagem">
            </div>

              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
          </div>


            <div class="switch">
                <p><span  style="font-family: sans-serif;">Disponível</span></p>
                <label style="font-family: sans-serif;">
                  Off
                  <input type="checkbox" name="disponivel"  style="font-family: sans-serif;">
                  <span class="lever" ></span>
                  On
                </label>
            </div>
          </div>

          <button class="btn brown lighten-1" style="margin-top: 10px;">Atualizar</button>
  </form>
</div>

</div>





@endsection
