@extends('layout.site')
@section('titulo','Login')

@section('login','Login')

@section('cadastro-active','active')


@section('navbar')

@include('layout._includes.navbar')

@endsection


@section('conteudo')



          <div class="row" align="center">
            <form class="form-login" action="{{ route('site.cadastro.criar')}}" method="post">
              <h3 style="font-family:sans-serif;">Cadastro</h3>

              {{ csrf_field() }}


              <div class="input-field">
                <input type="text" name="name" id="name">
                <label for="name">Nome</label>
              </div>

              <div class="input-field">
                <input type="email" name="email" id="email" class="validate">
                <label data-error="E-mail inválido" for="email">E-mail</label>
              </div>


              <div class="input-field">
                <input type="text" name="telefone" id="telefone" class="validate">
                <label for="telefone">Telefone</label>
              </div>

              <div class="input-field">
                <input type="password" name="password" id="senha">
                <label for="senha">Senha</label>
              </div>


              <input type="hidden" name="nivel_acesso" value="cliente">

              <div class="padding-top-buttom">
                <button class="waves-effect waves-light btn indigo  grey darken-3 right">Criar</button>
                <a href="{{ route('site.login') }}" class="waves-effect waves-light btn indigo  grey darken-3 right" style="margin-right: 10px;">Tenho uma conta</a>
              </div>
            </form>
          </div>


@endsection
