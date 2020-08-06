@extends('layout.site')
@section('titulo','Esqueci senha')
@section('login','Login')

@section('navbar')

@include('layout._includes.navbar')

@endsection


@section('conteudo')

  <div class="row-center">

    <h3 class="center">Esqueci senha</h3>
    <h6 class="center">Coloque o e-mail cadastrado abaixo, enviaremos uma mensagem para alteração da senha</h6>

    <div class="col s12">

      <form class="form-esqueci-senha"  action="{{ url('/forgotPassword') }}" method="post">
       {{ csrf_field() }}

       @if(session('error'))
         <div>{{ session('error') }}</div>
       @endif

       @if(session('sucess'))
       <div>{{ session('sucess') }}</div>
       @endif


       <div class="input-field">
         <input type="email" name="email" id="email" class="validate">
         <label data-error="E-mail inválido" for="email">E-mail</label>
         <span class="helper-text" data-error="E-mail inválido"></span>
       </div>

       <button type="submit" class="waves-effect waves-light btn indigo grey  grey darken-3 right" style="margin-right:200px;">Enviar</button>
      </form>

    </div>

  </div>
  <div style="margin-top: 419px;">
  <footer class="page-footer" id="foter">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Quem somos</h5>
          <p class="grey-text text-lighten-4">"O bom design reside de alguma maneira na capacidade de instigar um sentido de familaridade instantânea"</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Endereço</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Rua Anita Garibaldi nº55</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Leme - São Paulo - Brasil</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">CEP: 13616-369</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!"></a>
      </div>
    </div>
  </footer>
  </div>

  

@endsection

    
