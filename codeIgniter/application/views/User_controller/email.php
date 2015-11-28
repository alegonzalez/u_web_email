<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="css/estilo.css">

</head>
<script type="text/javascript">
var email = [];
function getEmail(){
	var dest = $('#destinario').val();
	var numero = dest.length;
	var palabra="";
	var destinario="";
	var pasada =0;

	
	
	dest.substr(0,dest.length-1);
	for (var i =dest.length-1; i>0; i--) {
		if(dest.charAt(i)==" "&&pasada==0){
			
			pasada=1;
			palabra = dest.substring(i,numero);
		}
	}
	if(palabra==""){
		destinario = $('#destinario').val();
	}else{

		destinario = palabra.trim();
	}


	var request = $.ajax({
		url: "<?php echo base_url('destination'); ?>",
		method: "POST",
		data: { "destinario" : destinario}


	});

	request.done(function(msg) {

		if(msg.status == 'error'){
			$("#dest").attr({
				'class': 'input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar has-error'
			});


			

		}else{
			
			$("#dest").removeClass("has-error");
			var tamaño = email.length;
			tamaño++;
			email[tamaño] = destinario;
		}


	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );



	});	


}

$(document).ready(function(){


	$('.btn-edit').click(function(){
		editAccount();

	});
	
	var contador = 0;

	$("#destinario").keypress(function(e) {
		var dest = $('#destinario').val();
		if(!dest=="")
		{

			if(e.which==32)
			{

				getEmail();

			}else
			{
				//var valor = $('#a').val();   
				//$("span").text(valor);

			}
		}
		tecla = (document.all) ? e.keyCode :e.which; 
		return (tecla!=13); 
	});


});   


function  sendEmail(){
	var request = $.ajax({
		url: "<?php echo base_url('redact'); ?>",
		method: "POST",
		data: {'destinario':email, 'asunto':$("#asunto").val(),'description':$("#texto").val()}
	});

	request.done(function(msg) {
		
		if(msg.status == 'error'){

			$(".alert-danger").show();
			$('#messageErrorEdit').text(msg.message);

		}else if(msg.status == 'correct'){

			$(".alert-danger").show();
			$('#messageErrorEdit').text(msg.message);
		
			//$(".alert-danger").hide();

		}

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );



	});
}

function editAccount() {

	var request = $.ajax({
		url: "<?php echo base_url('editUser'); ?>",
		method: "POST",
		data: { "image" : $('#files').val(), "username" : $('#name').val(),"last_password" : $('#password').val(),"newpassword": $('#newpassword').val()}
	});

	request.done(function(msg) {
		
		if(msg.status == 'error'){

			$(".alert-danger").show();
			$('#messageErrorEdit').text(msg.message);

		}else if(msg.status == 'correct'){

			$(".alert-danger").show();
			$('#messageErrorEdit').text(msg.message);
			//$(".alert-danger").hide();

		}

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );



	});	

}
function loadDate(){
	$('#messageErrorEdit').text('Debes de colocar el password actual,para poder efectuar su edit');
	$('.alert-danger').show();
	$('.alert-danger').delay(8000).hide(600);

	var request = $.ajax({
		url: "<?php echo base_url('editLoadUser'); ?>",
		method: "POST",

	});
	request.done(function(msg) {



		if(msg.status == 'error'){

			$(".alert-danger").show();
			$('#messageErrorEdit').text("Los datos no se cargaron,por favor intente nuevamente");

		}else{
			$("#name").val(msg.username);
		}

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );



	});	
}

</script>
<body>

	<section class="container">
		<section class="row">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" id="setting" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					<img src="https://cdn0.iconfinder.com/data/icons/users-icon/100/Profile_Settings-32.png">
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" >
					<li><a href="#edit" onclick="loadDate();" data-toggle="modal"><span class="glyphicon glyphicon-pencil icono"></span> Edit user</a></li>
					<li><a href="<?php echo base_url("closeSession")?>"><span class="glyphicon glyphicon-remove-circle icono"></span>Exit</a></li>
				</ul>
			</div>
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

					</ul>

					<!-- Tab panes -->
					<section class="tab-content  menu">
						<section  class="tab-pane active col-md-10 col-md-offset-1" id="salida">

							<form method="post" action="<?php echo base_url('accion');?>">
								<table class="table table-hover">
									<thead>
										<tr>
											<td></td>
											<td></td>
											<td></td>
										</tr>

									</thead>
									<tbody>
										<?php

										foreach ($date_Salida as $row)
										{
											if($row['Id_send'])
											{
												echo "<tr>";

												echo "<td>


												<input type='checkbox' name='checkbox[]' value='$row[Id_send]'/>

												</a>

												</td>";


												echo "<td> 				
												<button type='submit' class='btn  btn-danger' name='delete' value='$row[Id_send]'>
												<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
												</button>   
												</td>";

												echo "<td> 				
												<button type='submit' class='btn  btn-danger' name='update' value='$row[Id_send]'>
												<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
												</button>   
												</td>";


												echo "<td> 
												<a href='http://uwebemail/codeIgniter/User_controller/descriptionEmail/$row[Id_send]'>
												From:  ";
												echo  $row['Address'].' <br> Topic:  '.$row['Topic'].
												" 
												</a>
												</td> ";



												echo "</tr>";



											}else
											{
												echo "<label class='hola'>Don't there are emails sent
												<label>";
											}
										}


										?>

										<tbody>

											<button class="btn_delete btn btn-danger col-md-4 col-md-offset-4" type="submit" name="delete_all">

												<span class=" glyphicon glyphicon-trash " aria-hidden="true">

												</span>

											</button>
										</table>

									</from>




								</section>










								<section  class="scroll tab-pane fade col-md-10 col-md-offset-1" id="enviados">


									<form method="post" action="<?php echo base_url('accion');?>">
										<table class="table table-hover">
											<thead>
												<tr>
													<td></td>
													<td></td>
													<td></td>
												</tr>

											</thead>
											<tbody>
												<?php

												foreach ($date_send as $row)
												{
													if($row['Id_send'])
													{
														echo "<tr>";

														echo "<td>


														<input type='checkbox' name='checkbox[]' value='$row[Id_send]'/>

														</a>

														</td>";


														echo "<td> 				
														<button type='submit' class='btn  btn-danger' name='delete' value='$row[Id_send]'>
														<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
														</button>   
														</td>";



														echo "<td> 
														<a href='http://uwebemail/codeIgniter/User_controller/descriptionEmail/$row[Id_send]'>
														Enviado a:  ";
														echo  $row['Address'].' <br> Topic:  '.$row['Topic'].
														" 
														</a>
														</td> ";



														echo "</tr>";



													}else
													{
														echo "<label class='hola'>Don't there are emails sent
														<label>";
													}
												}


												?>

												<tbody>

													<button class="btn_delete btn btn-danger col-md-4 col-md-offset-4" type="submit" name="delete_all">

														<span class=" glyphicon glyphicon-trash " aria-hidden="true">

														</span>

													</button>
												</table>

											</from>

















										</section>





										<section  class="tab-pane fade col-md-10 col-md-offset-1" id="redactar">

											<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar" id="dest">
												<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
												<input type="text" class="form-control" 
												onkeypress="event" name="destinario" id="destinario" placeholder="Destinario" onblur="getEmail();" aria-describedby="basic-addon1">

											</section>

											<section class="input-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
												<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-comment"></span></span>
												<input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto"  aria-describedby="basic-addon1">
											</section>
											<section class=" col-xs-12 col-sm-10 col-sm-offset-1 col-md-10  col-md-offset-1 email_redactar">
												<span class="input-group-addon" id="basic-addon3"><img src="https://cdn4.iconfinder.com/data/icons/48-bubbles/48/15.Pencil-24.png" alt=""></span>
												<textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
												<!--<span class="glyphicon glyphicon-pencil"></span>-->
											</section>
											<section class="col-md-6 col-md-offset-5">
												

												<button type="button" class="btn btn-primary" onclick="sendEmail();" id="sending">Send</button>

											</section>


										</section>

									</section>

								</section>

							</section>
						</section>


					</section>

					<div class="modal fade" id="edit">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title  titule_edit"><span class="glyphicon glyphicon-pencil"></span>Edit Account</h2>
								</div>
								<div class="alert alert-danger"  role="alert">
									<p id="messageErrorEdit"></p>
								</div>
								<div class="modal-body">
									<section class="custom-input-file img-circle">

										<input type="file" size="1" id="files"  name="files[]" class="input-file" />

										<br>
										<output id="list" name="Photo">
											<img src="https://cdn4.iconfinder.com/data/icons/e-commerce-icon-set/48/Username_2-128.png" name="img" id="Photo" class="img-circle thumb">
										</output>

									</section>

									<section class="input_create_email input-group col-md-8 col-md-offset-2">

										<span class="input-group-addon" >
											<span class="glyphicon glyphicon-user"></span>
										</span>


										<input type="text" id="name"  name="UserName" class="form-control " placeholder="User Name" aria-describedby="basic-addon1">
									</a>

								</section>
								<section class="input_create_email input-group col-md-8 col-md-offset-2">
									<span class="input-group-addon" >
										<span class="glyphicon glyphicon-asterisk"></span>
									</span>
									<input type="password" id="password" name="Password" class="form-control " placeholder="Last password" aria-describedby="basic-addon1">
								</section>

								<section class="input_create_email input-group col-md-8 col-md-offset-2">
									<span class="input-group-addon" >
										<span class="glyphicon glyphicon-asterisk"></span>
									</span>
									<input type="password" id="newpassword" name="newPassword" class="form-control " placeholder="New password" aria-describedby="basic-addon1">
								</section>

							</div>
							<div class="modal-footer">
								<button type="button" onclick="editAccount();" class="btn btn-success btn-lg btn-edit">Edit</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
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
								-
							</section>
						</section>
					</section>
				</footer>

				<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
				<script type="text/javascript" src="js/bootstrap.min.js" ></script>
				<script type="text/javascript" src="js/email.js"></script>
			</body>
			</html>