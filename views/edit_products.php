<?php
$name     = unserialize($data[0]['name']);
$desc     = trim(unserialize($data[0]['description']));
$imgs     = $data[0]['images'];
$price    = $data[0]['price'];
$active   = $data[0]['active'];


// var_dump($data);
?>
<form name="form-add" class="add-products"  method="POST" enctype="multipart/form-data"  >
  
  <fieldset class="form-group">
    <label for="product_name">Nome do produto</label>
    <input name="product_name" type="text" value="<?=$name ?>"  class="form-control" placeholder="Insira um nome para o produto." maxlength="55" >
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_description">Descrição do produto</label>
    <textarea name="product_description" class="form-control" rows="4" col="4">
      <?=$desc ?>
    </textarea>
  </fieldset>
  
  <fieldset class="form-group">
    <label for="product_images">Adicione outra imagem para o  produto</label>
    <?php if($imgs){
      ?>
    <img src="<?php echo URL . 'public/uploads/' .$imgs ?>" />
      <?php
      } ?>
    <input type="file" name="product_images" placeholder="Selecionar arquivo">
  </fieldset>
  
  <fieldset class="form-group">
    <label class="sr-only" for="product_price">Preço</label>
    <div class="input-group">
      <div class="input-group-addon">R$</div>
      <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Insira o preço do produto" value="<?=$price ?>">
      
    </div>  
    
  </fieldset>

  <fieldset class="form-group">
    <label>Produto ativo?</label>
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="1" <?php if($active == 1) echo 'checked="true"'; ?> >
        Sim
      </label>
    </div>  
    <div class="radio">
      <label>
        <input type="radio" name="ativo" value="0" <?php if($active == 0) echo 'checked="true"'; ?>" >
        Não
      </label>
    </div>
  </fieldset>

  <button type="submit" class="btn btn-primary" value="add">Atualizar</button>
</form>