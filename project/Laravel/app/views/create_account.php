
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>

	<section class="container">
		<section class="row">
			<section class="col-md-5 col-md-offset-4">
				
				<form  class="form_create_email form-inline" method="POST" action="">

					<section class="custom-input-file img-circle">
						
						<input type="file" size="1" id="files" name="files[]" class="input-file" />

						<br>
						<output id="list">
							<img src="https://cdn4.iconfinder.com/data/icons/e-commerce-icon-set/48/Username_2-128.png" id="hola" class="img-circle thumb">
						</output>

					</section>
					


					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon" >
							<span class="glyphicon glyphicon-user"></span>
						</span>
						<input type="text" id="name" class="form-control " placeholder="User Name" aria-describedby="basic-addon1">
					</section>
					<br>
					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon"  >
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="email" id="create_email" class="form-control " placeholder="Create Email" aria-describedby="basic-addon1">
					</section>

					<br>
					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon" >
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
						<input type="password" id="password" class="form-control " placeholder="Create Password" aria-describedby="basic-addon1">
					</section>

					<br>
					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon" >
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
						<input type="password"  id="verify_password" class="form-control " placeholder="Verify Password" aria-describedby="basic-addon1">
					</section>
					<br>
					<!-- Indicates caution should be taken with this action -->
					<button type="button" class=" col-md-4 col-md-offset-3" id="btn_create_Email">Create Email</button>

				</form>
			</section>
		</section>
	</section>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="create_account.js"></script>
</body>
</html>
=======
>>>>>>> parent of 47aca24... Diseño de creación de Email
