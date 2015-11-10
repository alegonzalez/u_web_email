<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

	<section class="container">
		<section class="row">
			<section class="col-md-5 col-md-offset-3">
				<img src="https://cdn4.iconfinder.com/data/icons/e-commerce-icon-set/48/Username_2-128.png"  class="img-circle thumb">
				<p class="col-md-12 col-md-offset-4 ">Alejandro</p>
			</section>
			<section class="col-xs-11 email">
				

				<section>

					<!-- Nav tabs -->
					<ul class="nav nav-tabs col-md-10 col-md-offset-1" role="tablist">
						<li class="active col-md-3 col-md-offset-0"><a href="#salida" aria-controls="home" role="tab" data-toggle="tab" id="out">Salida</a></li>
						<li class="col-md-3"><a href="#enviados" aria-controls="enviados" role="tab" data-toggle="tab" id="send">Enviados</a></li>
						<li class="col-md-3"><a href="#redactar" aria-controls="redactar" role="tab" data-toggle="tab" id="write">Redactar</a></li>
						<li class="col-md-3" id="deleteImage"><a href="#delete" aria-controls="delete" role="tab" data-toggle="tab"><img src="https://cdn2.iconfinder.com/data/icons/iconza/iconza_32x32_ffffff/trash.png" alt=""></a></li>
						
					</ul>

					<!-- Tab panes -->
					<section class="tab-content  menu">
						<section  class="tab-pane active col-md-10 col-md-offset-1" id="salida">sdjfhskdljfhlskdf</section>
						<section  class="tab-pane fade col-md-10 col-md-offset-1" id="enviados">Hola mundo</section>
						<section  class="tab-pane fade col-md-10 col-md-offset-1" id="redactar">
							
							<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
								<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="text" class="form-control" id="destinario" placeholder="Destinario"  aria-describedby="basic-addon1">
							</section>

							<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
								<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-comment"></span></span>
								<input type="text" class="form-control" id="asunto" placeholder="Asunto"  aria-describedby="basic-addon1">
							</section>
							<section class=" col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
								<span class="input-group-addon" id="basic-addon3"><img src="https://cdn4.iconfinder.com/data/icons/48-bubbles/48/15.Pencil-24.png" alt=""></span>
								<textarea class="form-control" id="texto" rows="3"></textarea>
<!--<span class="glyphicon glyphicon-pencil"></span>-->
							</section>
							<section class="col-md-6 col-md-offset-5">
								<button type="submit" class="btn btn-primary" id="sending">Send</button>

							</section>
						</section>
						
					</section>

				</section>

			</section>
		</section>

	</section>
	<footer>
		
		<section class="container-fluid">
			<section class="row">
				<section class="col-md-12 footer">
					<section class="col-md-4 col-md-offset-5 titule_footer">
						<h3><span class="glyphicon glyphicon-envelope"></span>UwebEMAIL</h3>

					</section>
					<section class="col-md-4 col-md-offset-4 date_footer ">
						<ul>
							<li>Made by   <a href="">Alejandro Alvarado</a><a href="">                Angie González</a> </li>
							<li>Contact <a href="">88888888</a></li>
							
						</ul>

					</section>
				</section>
			</section>
		</section>
	</footer>
	

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/email.js"></script>
</body>
</html>