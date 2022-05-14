<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
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
	</head>
	<body>
		
	<?php
	include("crud.php");

	$crud = new Crud();

	//fetching data in descending order (lastest entry first)
	$query = "SELECT * FROM products ORDER BY id DESC";
	$result = $crud->getData($query);

	?>
		<div class="container">
			<div class="d-flex pt-3">
				<h3 class="text-uppercase m-2 px-5">product list</h3>
				<a href="index.php" class="btn btn-primary float-right m-2 text-center">Add Item</a>
			</div>
			<hr />
			<form action="crud.php" method="POST">
			<div class="row">
				<?php 
					// Fetching data and looping through it in cards
					foreach ($result as $key => $res) {	?>
						<div class='col-md-4 mt-3 mb-3'>
							<div class='card text-center bg-light'>
								<div class='card-body'>

									<input type="checkbox" class=".delete-checkbox" name="deleteid[]" value ="<?= $res['id']; ?>"/>
								
								<p><?= $res['sku'] ?></p>
								<p><?= $res['name'] ?></p>
								<p><?= $res['price'] ?></p>
								<?php 
									if ($res['size'] !== "") {
					 					echo "<p> Size: ".$res['size']." MB </p>";
					 				} else if ($res['weight'] !== "") {
					 					echo "<p> Weight: ".$res['weight']." KG </p>";
					 				} else {
					 					echo "<p> Dimension: ".$res['dimension']."</p>";
					 			}?>
								</div>
							</div>
						</div>	
			<?php
				}
				?>
				
			</div>
			<button type="submit" name="massDelete" id="delete-product-btn" class="btn btn-danger w-30 m-2 text-center">Delete Items</button>
			</form>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>