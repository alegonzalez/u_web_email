<html>
<head>
	<title></title>
</head>
<body>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>


	<script type="text/javascript">

	function user() {

		var request = $.ajax({
			url: "<?php echo base_url('user')?>",
			method: "POST",
			dataType:'json',
			
		});

		request.done(function( msg) {

			var user="User : <br>";


			for (var i = 0; i < (msg.email).length; i++) {

				user+=((msg.email)[i]['Email']) + " <br>";

			};

			document.getElementById("user").innerHTML = user;

		});

	}




	</script>


	<button onclick="user();">Refrescar</button>

	<h1 id="user"></h1>

</body>
</html>