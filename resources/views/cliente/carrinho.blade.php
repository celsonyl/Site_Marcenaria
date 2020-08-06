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
      </tbody>
    </table>

    @endforeach

    <form action="{{ route('encomenda.adicionar') }}" method="post" name="form_encomendar">
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
          1: "Vou receber a encomenda em casa",
          2: "Vou buscar a encomenda"
        },
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

</script>



@endsection
