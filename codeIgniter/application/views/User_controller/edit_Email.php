<!DOCTYPE html>
<html>
<head>
	<title>Edit Email</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	

	<link rel="stylesheet" type="text/css" href="http://uwebemail/codeIgniter/css/estilo.css">
</head>
<body>
	<section class="container">
	<form method="post" action="<?php echo base_url('edit'); ?>" >

		<input type='hidden' id='id_nombre' name='id' value="<?php echo $send[0]->Id_send?>" />

		<input type='hidden' id='id_nombre' name='user' value="<?php echo $send[0]->user?>" />

		<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
			<input type="text" class="form-control" name="address" id="destinario" value="<?php echo $send[0]->Address?>" placeholder="Destinario"  aria-describedby="basic-addon1">
		</section>

		<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
			<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-comment"></span></span>
			<input type="text" class="form-control" name="topic" id="asunto" placeholder="Asunto" value="<?php echo $send[0]->Topic?>" aria-describedby="basic-addon1">
		</section>
		<section class=" col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
			<span class="input-group-addon" id="basic-addon3"><img src="https://cdn4.iconfinder.com/data/icons/48-bubbles/48/15.Pencil-24.png" alt=""></span>
			<textarea class="form-control" id="texto" name="description" rows="3">
				<?php 
				echo $send[0]->Description
				?>
			</textarea>
			<!--<span class="glyphicon glyphicon-pencil"></span>-->
		</section>
		<section class="col-md-6 col-md-offset-5">
			<button type="submit" class="btn btn-primary" id="sending">Send</button>

		</section>
		</section>
	</body>
	</html>