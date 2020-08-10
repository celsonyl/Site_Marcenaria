@extends('layout.site')
@section('titulo','Home')



@if (Auth::check())

  @include('layout._includes.sidenav')

@else

  @section('login','Login')
  @section('cadastro','Cadastro')



    @include('layout._includes.navbar')


@endif

@section('conteudo')


<div class="carousel carousel-slider">
  <a class="carousel-item" href="#one!"><img src="{{asset('img/fotos-tema/indexFoto.jpg')}}" style="height: 800px;"></a>
</div><div id="texto"><h1>Móveis Planejados<h1></div><div id="texto2"><h6>QUALQUER CÔMODO PODE SER PROJETADO PARA SER O MELHOR DA CASA
  <h6></div><div style="width: 100%;">
  <center style="font-family:sans-serif;font-size:400;"><h4>NOSSOS PRODUTOS</h4></center>
  </div>
  <div class="row">
    @foreach ($produtos as $produto)


    <div class="card small" style="float:left;margin-left:20px; margin-top:30px;">
      <div class="card">
        <div class="card-image">
          <img src="{{$produto->foto}}" id="cards">
          <span class="card-title">Nome: {{$produto->nome}}</span>
        </div>
        <div class="card-content">
          <p>Descrição: {{$produto->descricao}}</p>
        </div>
        <div class="card-content">

          <p>Valor: {{$produto->valor}}</p>
        </div>
        <div class="card-action">
            

          <form action="{{ route('carrinho.adicionar') }}" method="post" id="{{$produto->id}}">
            {{ csrf_field() }}
            <input type="hidden" name="idProduto" value="{{$produto->id}}">
            <button class="waves-effect waves-light btn grey darken-3">Encomendar</button>
          </form>
        </div>
      </div>
    </div>



    
  <script>



$(function(){
    $('form[id="<?php echo $produto->id ?>"]').submit(function(event){
      event.preventDefault();

      <?php if(Auth::check()) {  ?>


        Swal.fire({
      title: '<?php echo $produto->nome ?>',
      text:'Quantidade',
      input: 'number',
      customClass: {
        input: 'my-number'
      },
      inputAttributes: {min:1,step:1},
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#00de07',
      cancelButtonColor: '#ff1900',
      confirmButtonText: 'Encomendar'
      
    }).then((result) => {
        if (result.value)
        {

          var quantidade = result.value;
              Swal.fire({
            title:'Você realmente deseja adicionar este produto ao carrinho?',
            text: false,
            showCancelButton: true,
            cancelButtonText: 'Não',
            confirmButtonColor: '#786f63',
            cancelButtonColor: '#ff1900',
            confirmButtonText: 'Sim',
          }).then((encomendar) => {

            if(encomendar.value)
            {
              var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "quantidade");
            input.setAttribute("id", "quantidade");
            input.setAttribute("value", quantidade);
            document.getElementById(<?php echo $produto->id ?>).appendChild(input);
            
            this.submit();
            }
          });
  
        }
        else if(result.value == "")
        {
              Swal.fire({
            title:'Você precisa dizer a quantidade!',
            text: false,
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonText: 'Entendi!',
            cancelButtonColor: '#ff1900',

          })
        }
        });

      <?php  } else  { ?>
        Swal.fire({
      title: 'Precisa logar para efetuar encomendas!',
      showCancelButton: true,
      showConfirmButton: false,
      cancelButtonText: 'Entendi!',
      cancelButtonColor: '#ff1900'

      })
    
      <?php } ?>

    })
  })

  </script>

    @endforeach
    </div>

<script>
  var instance = M.Carousel.init({
    fullWidth: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });

  </script>

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
    © 2020 Copyright Text
    <a class="grey-text text-lighten-4 right" href="#!"></a>
    </div>
  </div>
</footer>

@endsection
