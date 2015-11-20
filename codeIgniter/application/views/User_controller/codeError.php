<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Code Error</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<form action="<?php echo base_url('create_account');?>" method="POST">
		<div class="jumbotron col-md-8 col-md-offset-2">
			<div class="container">

				<img src="https://cdn2.iconfinder.com/data/icons/emoji-faces-2-2/32/sad_bad_faces_emotion_face-64.png" class="sad_face" >
				<h3 class="col-md-offset-1">I'm sorry for you, but the code the verification is incorrect,please try again</h3>
				<button type="submit" class="btn btn-primary btn-lg col-md-offset-5">Create account</button>
				
			</div>
		</div>
	</form>


	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>