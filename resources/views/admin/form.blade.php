<div class="input-field">
  <input type="text" name="nome" value="{{isset($produto->nome) ? $produto->nome : ''}}">
  <label>Nome do Produto</label>
</div>

<div class="input-field">
  <input type="text" name="descricao" value="{{isset($produto->descricao) ? $produto->descricao : ''}}">
  <label>Descrição</label>
</div>

<div class="input-field">
  <input type="text" name="valor" value="{{isset($produto->valor) ? $produto->valor : ''}}">
  <label>Valor</label>
</div>

<div class="file-field  input-field">

  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="foto">
  </div>
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>
@if(isset($produto->foto))
<div class="input-field">
  <img width="150" src="{{asset($produto->foto)}}" />
</div>

<div class="switch">
    <p><span>Disponível</span></p>
    <label>
      Off
      <input type="checkbox" name="disponivel">
      <span class="lever"></span>
      On
    </label>
</div>


@endif
