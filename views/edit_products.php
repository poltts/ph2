
<div id="messages">
  <span></span>
</div>
<form name="form-add" class="add-products"  method="POST" enctype="multipart/form-data"  >
  
  <fieldset class="form-group">
    <label for="product_name">Nome do produto</label>
    <input name="product_name" type="text" value="<?=$data[0]['name'] ?>"  class="form-control" placeholder="Insira um nome para o produto." maxlength="55" >
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_description">Descrição do produto</label>
    <textarea name="product_description" class="form-control" rows="4" col="4">
      <?=$data[0]['description'] ?>
    </textarea>
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_images">Adicione outra imagem para o  produto</label>
    <img src="<?=$data[0]['images'] ?>" />
    <input type="file" name="product_images" placeholder="Selecionar arquivo">
  </fieldset>
  
  <fieldset class="form-group">
    <label class="sr-only" for="product_price">Preço</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Insira o preço do produto" value="<?=$data[0]['price'] ?>">
      
    </div>  
    
  </fieldset>

  <fieldset class="form-group">
    <label>Produto ativo?</label>
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="1" <?php if($data[0]['active'] == 1) echo 'checked' ?> >
        Sim
      </label>
    </div>  
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="0" <?php if($data[0]['active'] == 0) echo 'checked' ?>" >
        Não
      </label>
    </div>
  </fieldset>

  <button type="submit" class="btn btn-primary" value="add">Atualizar</button>
</form>