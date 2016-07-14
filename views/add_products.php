<div id="messages">
  <span></span>
</div>
<form name="form-add" class="add-products"  method="POST" enctype="multipart/form-data"  >
  
  <fieldset class="form-group">
    <label for="product_name">Nome do produto</label>
    <input name="product_name" type="text"  class="form-control" placeholder="Insira um nome para o produto." maxlength="55" >
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_description">Descrição do produto</label>
    <textarea name="product_description" class="form-control" rows="4" col="4"></textarea>
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_images">Adicione a imagem do produto</label>
    <input type="file" name="product_images" value="" placeholder="Selecionar arquivo">
  </fieldset>
  
  <fieldset class="form-group">
    <label class="sr-only" for="product_price">Preço</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Insira o preço do produto">
      
    </div>  
    
  </fieldset>

  <fieldset class="form-group">
    <label>Produto ativo?</label>
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="1" checked>
        Sim
      </label>
    </div>  
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="0" >
        Não
      </label>
    </div>
  </fieldset>

  <button type="submit" class="btn btn-primary" value="add">Adicionar</button>
</form>