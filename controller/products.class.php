<?php
require dirname(__DIR__) . '/controller/database.class.php';

class Products extends Db{

	protected $conn;

	public function __construct()
	{
		$db = Db::getInstance();
        $this->conn = $db->connect();
	}

	public function list_products($id = '')
	{
		if($id){
			$sql = "SELECT * FROM products WHERE id = $id";
			$sth = $this->conn->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll();

			return $result;

		} 
	}	

	public function view()
	{
		$sql = "SELECT id, name, images, price, active FROM products";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$products = $this->conn->prepare($sql);
		$products->execute();
		$result = $products->fetchAll();				

    	if($result){

    		echo '<table class="table table-striped table-bordered table-hover table-condensed">
					  <thead class="thead-inverse">
					    <tr>
					      <th>Nome</th>
					      <th>Imagem</th>
					      <th>Preço</th>
					      <th>Ativo</th>
					      <th>Actions</th>
					    </tr>
					  </thead><tbody>';

			foreach ($result as $row) {
				$ativo = $row['active'] ? 'sim' : 'não';
				$imgSrc = URL . "public/uploads/".$row['images'];
				echo ' <tr> 
						    <td>'.unserialize($row['name']).'</td>
						    <td><img src="'.$imgSrc.'" /></td>
						    <td>R$ '.$row['price'].'</td>
						    <td>'.$ativo.'</td>
						    <td><a href="index.php?page=edit&amp;action=edit&amp;pd='.urlencode($row['id']).'"><span class="glyphicon glyphicon-pencil"></span></a>
						    <a href="index.php?page=delete&amp;action=delete&amp;pd='.urlencode($row['id']).'"><span class="glyphicon glyphicon-remove"></span></a></td>
						</tr>';
			}	

    		echo '  </tbody></table>';

    	}else{
    		$message = "Sem registro de produtos no banco de dados, adicione ao menos um produto para visulaizar.";
    		echo '<div class="row"><div class="col-xs-12"><p class="message">'.$message.'</p></div></div>';
    	}

	}

	public function edit($id = null, $name, $description, $price, $active, $image)
	{
		$sql = "UPDATE  products SET name = '$name', description = '$description', price = '$price', active = '$active', images = '$image' WHERE id = $id ";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$edit = $this->conn->prepare($sql);

		try {
			
			$edit->execute();
			echo "Produto editado com sucesso!";
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function remove($id = null)
	{
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$get_img = $this->conn->prepare("SELECT images FROM products WHERE id=$id");
		$get_img->execute();
		$img = $get_img->fetchAll();	
		if($img[0]['images'] !== ""){
			unlink(dirname(__DIR__) . '/public/uploads/'.$img[0]['images']);	
		}
		$sql = "DELETE FROM products WHERE id=". $id . " ";
		
		try {
			$delete = $this->conn->exec($sql); 
			header('Location: '. URL);
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function add($name, $description, $price, $active, $image)
	{
		$sql = "INSERT INTO products(name, description, images, price, active) VALUES('$name', '$description', '$image', '$price' , '$active') ";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try {
			
			$this->conn->exec($sql);
			echo "Produto registrado com sucesso!";
			
		} catch (Exception $e) {
			unset($image);
			echo $e->getMessage();
		}
	}


}

?>