@extends('layout.site')
@section('titulo','Home')



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


<h3>Index</h3>


  <div class="row">


    <!-- Fazer foreach aqui!-->
    <!-- - - INICIO - - -->


    @foreach ($produtos as $produto)


    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image">
          <img src="{{$produto->foto}}">
          <span class="card-title">Nome: {{$produto->nome}}</span>
        </div>
        <div class="card-content">
          <p>Descrição: {{$produto->descricao}}</p>
        </div>
        <div class="card-content">

          <p>Valor: {{$produto->valor}}</p>
        </div>
        <div class="card-action">
      <!--    <a class="waves-effect waves-light btn modal-trigger" href="#{{$produto->id}}">Modal</a>   -->
          <button class="waves-effect waves-light btn modal-trigger" onclick="modalkkk" >  Modal  </button>
        </div>
      </div>
    </div>






    <div class="modal modal-fixed-footer" id="{{$produto->id}}">
        <div class="modal-content">

        <h4>{{$produto->nome}}</h4>
        <p><h4>{{$produto->descricao}}</h4> </p>
        <p><h4>{{$produto->valor}}</h4></p>

      </div>

      <div class="modal-footer">
        <form action="{{ route('carrinho.adicionar')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id_produto" value="{{$produto->id}}">


            <button class="waves-effect waves-light btn indigo lighten-2">Cadastrar</button>
            <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>


          </form>




      </div>
    </div>








    @endforeach



  </div>

      <script>

function modalkkk()
{

  Toast.fire({
icon: 'success',
title: 'Signed in successfully'
})

}

      </script>



@endsection
