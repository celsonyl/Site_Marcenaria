@extends('layout.site')
@section('titulo','Carrinho')

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


<div class="container">



@if(count($itens_carrinho) != 0)
  
  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Quantidade</th>
          <th>Valor Total</th>
        </tr>
      </thead>
    @foreach ($itens_carrinho as $produto)
    <?php
    $produtoskkk = App\Carrinho::join('produtos','carrinhos.idProduto','=','produtos.id')
                  ->select('produtos.*')
                  ->where('carrinhos.idCliente',Auth::user()->id)
                  ->where('carrinhos.idProduto',$produto->idProduto)
                  ->first();
    ?>
      <tbody>        
          <tr>
            <td> {{$produtoskkk->nome}} </td>
            <td> {{$produtoskkk->descricao}} </td>
            <td> {{$produtoskkk->valor}} </td>
            <td> {{$produto->quantidade}} </td>
            <td> {{($produtoskkk->valor)*($produto->quantidade)}} </td>
            <td>
            <form action="{{ route('carrinho.remover') }}" method="post" name="form_deletar">
            {{ csrf_field() }}
            <input type="hidden" name="idProduto" value="{{$produtoskkk->id}}">

            <button id="btn-deletar" class="waves-effect waves-light btn red">Deletar</button>
            </form>
            </td>
          </tr>

    @endforeach

    
    </tbody>
    </table>



    <form action="{{ route('encomenda.adicionar') }}" method="post" name="form_encomendar" id="form_encomendar">
      {{ csrf_field() }}

    <input type="hidden" name="idCliente" value="{{Auth::user()->id}}">

    <button id="btn-deletar" class="waves-effect waves-light btn green">Encomendar</button>


    </form>






@else

  <br>
  <div align="center"><h2>Você não possui produtos no carrinho!</h2></div>

@endif

  </div>
</div>










<script>

$(function(){
    $('form[name="form_deletar"]').submit(function(event){
      event.preventDefault();


      Swal.fire({
        title: 'Você realmente deseja deletar esse produto do carrinho?',
        text: false,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Não',
        confirmButtonColor: '#00de07',
        cancelButtonColor: '#ff1900',
        confirmButtonText: 'Sim'
      }).then((result) => {
        
            if (result.value) 
              this.submit();

      });
   });
});





$(function(){
    $('form[name="form_encomendar"]').submit(function(event){
      event.preventDefault();


      Swal.fire({
        title: 'Como será feita a entrega?',
        text: false,
        input: 'radio',
        inputOptions: {
          1: "<b>Vou receber a encomenda</b>",
          2: "<b>Vou buscar a encomenda</b>"
        },
        showCancelButton: true,
        cancelButtonText: 'Não',
        confirmButtonColor: '#00de07',
        cancelButtonColor: '#ff1900',
        confirmButtonText: 'Sim'
      }).then((result) => {
        
            if (result.value == 1) 
            {
              Swal.fire({
              title: 'Em qual endereço?',
              input: 'text',
              inputPlaceholder: 'Ex: Rua Anita Garibaldi nº55 Leme',
              showCancelButton: true,
              cancelButtonText: 'Cancelar',
              confirmButtonColor: '#00de07',
              cancelButtonColor: '#ff1900',
              confirmButtonText: 'Confirmar'
            }).then((endereco) =>{
                    if (endereco.value)
                    {
                      var local = endereco.value;
                      Swal.fire({
                        title: 'Você tem certeza que deseja receber a encomenda neste endereço?',
                        text: endereco.value,
                        showCancelButton: true,
                        cancelButtonText: 'Não :(',
                        confirmButtonColor: '#00de07',
                        cancelButtonColor: '#ff1900',
                        confirmButtonText: 'Sim :)'
                      }).then((result) => {

                          if(result.value)
                          {
                            var input = document.createElement("input");
                            input.setAttribute("type", "hidden");
                            input.setAttribute("name", "endereco");
                            input.setAttribute("id", "endereco");
                            input.setAttribute("value", local);
                            document.getElementById("form_encomendar").appendChild(input);
                            this.submit();
                          }


                        })

                      

                    }
                })

            }



      });
   });
});

</script>



@endsection
