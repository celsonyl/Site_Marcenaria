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
          <!--  <a class="waves-effect waves-light btn modal-trigger" href="#{{$produto->id}}">Modal</a> -->
            

          <form action="{{ route('carrinho.adicionar') }}" method="post" id="{{$produto->id}}">
            {{ csrf_field() }}
            <input type="hidden" name="idProduto" value="{{$produto->id}}">
            <!-- <input type="hidden" name="quantidade" id="quantidade" value=""> -->


            <button class="waves-effect waves-light btn red">Encomendar</button>

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
      input: 'number',
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
            confirmButtonColor: '#00de07',
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


@endsection
