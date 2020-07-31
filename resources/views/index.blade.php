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


<!--


<div class="jumbotron">
  <h1 class="display-4">O sonho Imaginarium</h1>
  <p class="lead">Você com certeza ouviu falar ou até ganhou presentes da Imaginarium. Também é provável que você não tenha ideia de como a empresa começou no início dos anos 1990: um casal formado por uma arquiteta e um médico.

A dupla decidiu passar mais tempo com as filhas pequenas e, para isso, começou a produzir presentes de Natal em casa. Depois, os produtos começaram a ser vendidos na vizinhança. A demanda obrigou a profissionalização da produção e, em pouco tempo, os produtos foram para grandes lojas.

A marca prezava por produtos que possibilitavam momentos compartilhados, e isso foi determinante para a consolidação. Atualmente, ela é conhecida nacional e internacionalmente por se antecipar a conceitos ou tendências em eletrônicos, moda e todo o tipo de presente imaginável.

Hoje, o faturamento anual da empresa – que não está mais sob o comando da família fundadora – ultrapassou a casa dos R$ 200 milhões. Hoje são 192 lojas exclusivas, além de canais de e-commerce e 600 multimarcas.</p>
  <hr class="my-4">
  <p>XERO BOM DE PIKA</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ route('site.login')}}" role="button">SE CADRASTA </a>
  </p>
</div>

<div class="card bg-dark text-white">
  <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRHr6_l7oliHHwW_KtglGbzdQcNW51vPfgNcQ&usqp=CAU" alt="Card image">
  <div class="card-img-overlay">
    <h2 class="card-title" style="color:black;">SUA NOVA FERRAMENTA DE DESENHAR E ORÇAR MÓVEIS ESTA AQUI</h2>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>



-->

<h3>Index</h3>
  <div class="row">
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
            <a class="waves-effect waves-light btn modal-trigger" href="#{{$produto->id}}">Modal</a>
        </div>
      </div>
    </div>






    <div class="modal modal-fixed-footer" id="{{$produto->id}}">
        <div class="modal-content">

        <h4>Produto: {{$produto->nome}}</h4>
        <p><h4>Valor: {{$produto->valor}}</h4></p>
        <form action="{{ route('carrinho.adicionar')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="idProduto" value="{{$produto->id}}">

            <div class="input-field">
              <input type="number" step="1" min="1" name="quantidade" id="quantidade">
              <label for="quantidade">Quantidade</label>
            </div>

            id:{{$produto->id}}

      </div>

      <div class="modal-footer">

        <?php if(Auth::check())
        { ?>
            <button class="waves-effect waves-light btn indigo lighten-2">Encomendar</button>
            <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
      <?php   }
        else { ?>
          <a>Logue para realizar uma encomenda! </a>
          <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
        <?php } ?>


            </div>


          </form>
      </div>
    </div>
    @endforeach
</div>

@endsection
