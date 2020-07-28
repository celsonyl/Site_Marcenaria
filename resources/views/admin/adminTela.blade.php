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


<div class="modal modal-fixed-footer" id="modal-produtos">
    <div class="modal-content">
      <h3>Cadastro de Produto</h3>



        <form action="{{ route('admin.produto.cadastrar')}}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          <div class="input-field">
            <input type="text" name="nome" id="nome">
            <label for="nome">Nome</label>
          </div>


          <div class="input-field">
            <input type="text" name="descricao" id="descricao">
            <label for="descricao">Descrição</label>
          </div>


          <div class="input-field">
            <input type="number" step="0.01" min="0" name="valor" id="valor">
            <label for="valor">Valor</label>
          </div>

          <div class="file-field  input-field">
            <div class="btn indigo lighten-2">
              <span>Selecionar imagem</span>
              <input type="file" name="imagem">
            </div>

              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
          </div>


            <div class="switch">
                <p><span>Disponível</span></p>
                <label>
                  Off
                  <input type="checkbox" name="disponivel">
                  <span class="lever"></span>
                  On
                </label>
            </div>




    </div>


    <div class="modal-footer">

        <button class="waves-effect waves-light btn indigo lighten-2">Cadastrar</button>
        <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>

    </div>

  </form>


</div>







<a href="#modal-produtos" class="btn-solicitacao btn-floating btn-large modal-trigger tooltipped indigo lighten-2 pulse"
data-position="left" data-tooltip="Solicitações"><i class="material-icons">person_add</i></a>








@endsection
