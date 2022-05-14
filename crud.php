		<!--bootstrap files here-->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"
		></script>
<?php
include ('dbConfig.php');

// Logic for Crud operations in class Crud
class Crud extends Db_Config
{
	public function __construct()
	{
		parent::__construct();
	}
	
	//getData() is used to fetch the data from database and store its values in a array
	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
		
	//execute() is called to execute the query
	public function execute($query) 
	{
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}
	public function escape_string($value)
	{
		// The real_escape_string() / mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
		return $this->connection->real_escape_string($value);
	}
}

//Creating object of crud class
$crud=new Crud();

// Storing index.html form data in variables
if(isset($_POST['Submit'])) {
	$sku = $crud->escape_string($_POST['sku']);	
	$name = $crud->escape_string($_POST['name']);
	$price = $crud->escape_string($_POST['price']);
	$size = $crud->escape_string($_POST['size']);
	$weight = $crud->escape_string($_POST['weight']);
	$height = $crud->escape_string($_POST['height']);
	$width = $crud->escape_string($_POST['width']);
	$length = $crud->escape_string($_POST['length']);
	$dimension = $height . " x " . $width . " x " . $length;

	// Inserting data into database	
	$result = $crud->execute("INSERT INTO products (sku,name,price,size,weight,dimension) VALUES('$sku','$name','$price','$size','$weight','$dimension')");
		
	echo "<div class='alert alert-success text-center' role='alert'>Product added successfully. <a href='index.php'>Go to Add product page</a></div>";
}
//Storing data(id) for deleting data from database
if(isset($_POST['massDelete'])) {
	// Storing id's as an array
	$all_id = $_POST['deleteid'];

    $extract_id = implode(',' , $all_id);

	//Mass delete query
	$result = $crud->execute("DELETE FROM products WHERE id IN($extract_id)");

	echo "<div class='alert alert-danger text-center' role='alert'>Deleted successfull <a href='productList.php'>Go to product list</a></div>";
}

?>