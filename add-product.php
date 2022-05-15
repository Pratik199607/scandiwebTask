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
		<div class="container">
			<div class="d-flex pt-3">
				<h4 class="text-uppercase m-2 px-5">Add Product</h4>
				<a href="index.php" class="btn btn-primary float-right">Go to Homepage</a>
			</div>
			<hr />

			<div id="msg"></div>
			<div class="row">
				<div class="col-md-12">
					<!--<form action="add.php" method="post" name="form1" onsubmit = "return(validate());">-->
					<form action="crud.php" method="POST" name="form1" id="product_form">
						<div class="form-group">
							<label for="sku">SKU</label>
							<input
								type="text"
								name="sku"
								class="form-control w-50"
								id="sku"
								aria-describedby="skuhelp"
								required
							/>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input
								type="text"
								name="name"
								class="form-control w-50"
								id="name"
								aria-describedby="namehelp"
								required
							/>
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input
								type="number"
								name="price"
								class="form-control w-50"
								id="price"
								aria-describedby="pricehelp"
								min="0"
								required
							/>
						</div>
						<div class="form-group">
							<label for="typeSwitcher">Type switcher</label>
							<select class="form-control w-50" id="productType" class="typeSwitcher" required>
								<option selected disabled value=""></option>
								<option  value="DVD">DVD</option>
								<option  value="Book">Book</option>
								<option  value="Furniture">Furniture</option>
							</select>
						</div>
						<div class="form-group selectable" name="DVD" id="DVD" style="display: none">
							<label for="size">Size</label>
							<input
								type="number"
								name="size"
								class="form-control w-50"
								id="size"
								aria-describedby="sizehelp"
								min="0"
							/>
							<small>Please provide size in MB format.</small>
						</div>
						<div class="form-group selectable" name="Book" id="Book" style="display: none">
							<label for="weight">Weight</label>
							<input
								type="number"
								name="weight"
								class="form-control w-50"
								id="weight"
								aria-describedby="weighthelp"
								min="0"
							/>
							<small>Please provide weight in Kg format.</small>
						</div>
						<div
							class="form-group selectable"
							name="Furniture"
							id="Furniture"
							style="display: none"
						>
							<label for="height">Height</label>
							<input
								type="number"
								name="height"
								class="form-control w-50"
								id="height"
								aria-describedby="heighthelp"
								min="0"
							/>
							<label for="width">Width</label>
							<input
								type="number"
								name="width"
								class="form-control w-50"
								id="width"
								aria-describedby="widthhelp"
								min="0"
							/>
							<label for="length">Length</label>
							<input
								type="number"
								name="length"
								class="form-control w-50"
								id="length"
								aria-describedby="lengthhelp"
								min="0"
							/>
							<small>Please provide dimensions in HxWxL format.</small>
						</div>
						<div class="form-group mt-4">
							<input class="btn btn-success" type="submit" name="Save" value="Save" />
							<input class="btn btn-danger" type="reset" name="Cancel" value="Cancel" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		/* Logic to dynamically show/hide elements */
		$("#productType").on("change", function () {
			$(".selectable").hide();
			$("#" + $(this).val()).show();
		});
	</script>
</html>
