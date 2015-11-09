<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css') ?>">	

</head>
<body>


	

	<section class="container">
		<section class="row">
			<section class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-4">
				

				<form class="form-inline form_login" action="" method="post" enctype="multipart/form-data">
					<section class="col-sm-12 col-sm-offset-3  col-md-offset-3 space_login">
						<h3><span class="glyphicon glyphicon-envelope"></span>UwebEMAIL</h3>	
					</section>
					
					<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 space_login col-md-offset-1">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
						<input type="text" class="form-control" id="email" placeholder="Email"  aria-describedby="basic-addon1">
					</section>


					<br>
					<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 space_login col-md-offset-1">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="text" class="form-control" id="password"placeholder="Password" aria-describedby="basic-addon1">
					</section>
					<section class="col-xs-13 col-sm-12 col-sm-offset-3 col-md-12  col-md-offset-3 space_login">

						<button type="submit" class="btn btn-default" id="btn_login">GO</button>
					</section>
					<section class="col-xs-12 col-sm-12 col-sm-offset-4 col-md-offset-4 space_login">
						


						
						
						
	                        <a href="<?php echo base_url('User_controller/viewCreateAccount') ?>"  ><span class="glyphicon glyphicon-plus"></span>Create account</a>
						


						

						

					</section>

				</form>
				
			</section>





		</section>
	</section>

	
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/assets/js/create_account.js"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

</body>
</html>