@extends('layout.site')
@section('titulo','Home')



@if (Auth::check())

@section('sair','Sair')

@else

@section('login','Login')
@section('cadastro','Cadastro')

@endif




@section('navbar')

@include('layout._includes.navbar')

@endsection

@section('conteudo')


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
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://images.madeiramadeira.com.br/product/images/15550326-kit-6-cadeiras-minera-madeira-macica-de-demolicao-peroba-rosa-moveis-decorakit6cmd-1104-1-600x200.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Cadeira Gamer.</h5>
    <p class="card-text">Perfeita para mesas de escritório ou home office. Além de estilo, a Uni Me garante a postura correta que beneficia a circulação sanguínea do corpo.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Modelo:5G7X</li>
    <li class="list-group-item">Preço: 500R$</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Comprar</a>
    <a href="#" class="card-link">Mais Detalhes</a>
  </div>

</div>






@endsection
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
