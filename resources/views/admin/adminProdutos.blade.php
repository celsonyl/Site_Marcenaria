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
    <h1><center style="font-family: sans-serif;">EDITAR PRODUTO</center></h1>

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
              <a class="btn" href="{{ route('admin.produto.editar',$produto->id) }}" style="margin-top: 5px;background-color:#786f63">Editar</a>
              <a class="btn red" href="{{ route('admin.produto.apagar',$produto->id) }}" style="margin-top: 5px;">Deletar</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

<div id="produtos" class="col s12">

  <div class="container" id="table-produtos">
    <a href="#modal-solicitacoes" class="btn-solicitacao btn-floating btn-large modal-trigger tooltipped brown darken-2 pulse"
    data-position="left" data-tooltip="Adicionar Produto"><i class="material-icons">note_add

    </i></a>

    <div class="modal modal-fixed-footer" id="modal-solicitacoes">
      <div class="modal-content">
  
    <h3><center style="font-family: sans-serif;margin-top:10px;">Cadastro de Produto</center></h3>
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
      </div>
        <button class="btn brown lighten-1" style="margin-left: 130px;">Atualizar</button>
</form>
</div>

     <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-red btn-flat" style="margin-right: 10px;">Fechar</a>
    </div>

   
      </div>
    </div>

</div>





@endsection
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
