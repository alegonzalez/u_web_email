<!DOCTYPE html>
<html>
<head>
	<title>Description Email</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	

	<link rel="stylesheet" type="text/css" href="http://uwebemail/codeIgniter/css/estilo.css">
</head>
<body>
	<section class="container">
		<section class="row">
			<section class="col-md-10 col-md-offset-1 description_email">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope">
						<h2>UwebEMAIL</h2>Email
					</span>
					
				</div>
				<div class="panel-body">
					<label >ADDRESS : </label>

						<?php 

						echo $correo_ver[0]->Address;

						?>

						<br>

						<label>TOPIC : </label>

						<?php 

						echo $correo_ver[0]->Topic;

						?>

						<br>
						<label>DESCRIPTION : </label>

						<?php echo $correo_ver[0]->Description;?>
				</div>
			</div>

		</div>

	</section>
</section>
</section>
</body>
</html>