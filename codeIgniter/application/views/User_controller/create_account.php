<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<!-- Latest compiled and minified CSS  -->
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">	

	<script type="text/javascript">
	$(document).ready(function(){

		$('#btn_create_Email').click(function(){
			createAccount();
			
		});
	});

	function createAccount() {


		$('#codeConfirm').show();
		$('#confirm').show();
		$('#myModalLabel').text('Please, see in your mail your verification code');
		$('#codeConfirm').show();
		$('#back').attr({
			'class': 'btn btn-default message'

		});
		var photo = [];
		var fileExtension = "";
        //obtenemos un array con los datos del archivo
        var file = $("#files")[0].files[0];
        if(file != null){
         //obtenemos el nombre del archivo
         var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        
        photo = [fileName,fileSize,fileType,fileExtension];
        
    }else{
    	photo = "";
    }


    var request = $.ajax({
    	url: "<?php echo base_url('create'); ?>",
    	method: "POST",
    	data: { "image" : photo, "username" : $('#name').val(),"Email" : $('#create_email').val(),"password" : $('#password').val(),"repitPassword": $('#verify_password').val()}
    });

    request.done(function(msg) {


    	if(msg.status === 'error'){
    		$('#codeConfirm').hide();
    		$('#myModalLabel').text(msg.message);
    		$('#back').attr({
    			'style': 'margin-left: 39%',
    			'class': 'btn btn-primary'

    		});
    		$('#confirm').hide();
    		$('.window').attr({
    			'id': 'create'
    		});
<<<<<<< HEAD
    		$('window').show();
=======
>>>>>>> origin/master
    		


    	}else{
<<<<<<< HEAD
    		alert("hola");
    		debugger;
=======
>>>>>>> origin/master
    		$('#myModalLabel').text('Please, see in your mail your verification code');
    		$('#codeConfirm').show();
    		$('#back').attr({
    			'class': 'btn btn-default message'

    		});
    		$('.window').attr({
    			'id': 'create'
    		});
    		$('#confirm').show();

    	}

    });

    request.fail(function( jqXHR, textStatus ) {
    	alert( "Request failed: " + textStatus );



    });	

}

</script>
</head>
<body>


	<section class="container">
		<section class="row">
			<section class="col-md-5 col-md-offset-4">
				

				<section class="form_createaccount">
					<form enctype="multipart/form-data" class="formulario">
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
					<br>
					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon"  >
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="email" id="create_email" name="Email" class="form-control " placeholder="Create Email" aria-describedby="basic-addon1">
					</section>

					<br>

					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon" >
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
						<input type="password" id="password" name="Password" class="form-control " placeholder="Create Password" aria-describedby="basic-addon1">
					</section>

					<br>
					<section class="input_create_email input-group col-md-8 col-md-offset-2">
						<span class="input-group-addon" >
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
						<input type="password" name="repitPassword"  id="verify_password" class="form-control " placeholder="Verify Password" aria-describedby="basic-addon1">
					</section>
					<br>
					<!-- Indicates caution should be taken with this action -->
					<button type="button" class=" col-md-4 col-md-offset-3" id="btn_create_Email" data-toggle="modal" data-target="#create">Create Email</button>

				</form>
				

				<div class="modal fade window"   aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">
									


								</h4>
							</div>
							<div class="modal-body">
								<form action="<?php echo base_url('verification')?>" method="POST">
									<input type="text" placeholder="Verification code" id="codeConfirm" name="code" class="form-control">
									<button type="button" class="btn btn-default message" id="back" data-dismiss="modal">Back</button>

									<button type="submit" class="btn btn-primary message" id="confirm">Confirm</button>
								</form>
							</div>
							
						</div>
					</div>
				</div>

			</section>

		</section>
	</section>
</section>




<script type="text/javascript" src="js/create_account.js"></script>
</body>
</html>

