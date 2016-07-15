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
		$sql = "SELECT * FROM products WHERE id = $id";
		$sth = $this->conn->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();

		return $result;
	}	

	public function view()
	{
		$sql = "SELECT id, name, images, price, active FROM products";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$products = $this->conn->prepare($sql);
		$products->execute();
		$result = $products->fetchAll();				

    	if($result){

    		echo '<table class="table">
					  <thead class="thead-inverse">
					    <tr>
					      <th>#</th>
					      <th>Nome</th>
					      <th>Imagem</th>
					      <th>Preço</th>
					      <th>Ativo</th>
					    </tr>
					  </thead>';

			foreach ($result as $row) {
				$ativo = $row['active'] ? 'sim' : 'não';
				echo ' <tr>
						 <th scope="row"></th>
						    <td>'.$row['name'].'</td>
						    <td><img src="'.$row['images'].'" /></td>
						    <td>'.number_format($row['price']).'</td>
						    <td>'.$ativo.'</td>
						    <td><a href="index.php?page=editar&amp;action=edit&amp;pd='.urlencode($row['id']).'"><span class="glyphicon glyphicon-pencil"></span></a>
						    <a href="index.php?page=home&amp;action=delete&amp;pd='.urlencode($row['id']).'"><span class="glyphicon glyphicon-remove"></span></a></td>
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

	public function delete($id)
	{
		// $product_id = unserialize($
		$sql = "DELETE FROM products WHERE id = $id ";
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$delete = $this->conn->prepare($sql);
		try {
			
			$delete->exec();
			echo "Produto deletado com sucesso!";
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function add($name, $description, $price, $active, $image)
	{
		$sql = "INSERT INTO products(name,description,price,active,images) VALUES('$name', '$description', $price , $active , '$image') ";
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