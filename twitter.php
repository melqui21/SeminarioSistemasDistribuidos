<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bienvenido</title>
	<link rel="stylesheet" href="css/estilo.css" type="text/css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<link rel="stylesheet" href="css/select2.min.css" type="text/css"/>
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="shortcut icon" href="imagenes/us.png">

	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/select2.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		$( document ).ready(function() {
    		//alert('h');
    		$("#resultado").hide();	
		});

		function doSearchTwitter(){
			var keyWord = $("#texto").val();
			var noTweets = $("#noTweets").val();
			var tipoAccion = $("#opciones").val();

			$.ajax({
	   			type: "POST",
	  			 url: "twitterGetTweets.php",
	  			 data: "tipoAccion="+tipoAccion+"&keyWord="+keyWord+"&noTweets="+noTweets,
	   			success: function(msg){
	     			alert(msg);
	     			$("#resultado").html(msg);
	     			$("#resultado").show(5);
	   			 }
	});
		}

	</script>
	
</head>
<body style="background-color: rgb(115, 115, 115);">
	<div class="container">
		<div class="menu-principal animated zoomIn">
			<div class="panel-heading" >
				<h1 class="panel-title text-center">Seminario de Sistemas Distribuidos</h1>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 animated bounceInRight text-center">
						<img alt="" src="imagenes/twitter1.png">
					</div>
				</div>  <!-- Fin row -->

				<div class="row">
					
					<div class="col-md-4 animated bounceInLeft">
						<div class="form-group">
							<label for="opciones">Buscar:</label>
							<select class="form-control" name="opciones" id="opciones">
								<option value="tweets">Tweets</option>
								<option value="">Multimedia</option>
	            			</select>
						</div>
					</div>

					<div class="col-md-4 animated bounceInTop">
						<div class="form-group">
							<label for="texto">Texto:</label>
							<input type="text" class="form-control" name="texto" id="texto">
						</div>
					</div>

					<div class="col-md-4 animated bounceInRight">
						<div class="form-group">
							<label for="noTweets">Cantidad:</label>
							<input type="text" class="form-control" name="noTweets" id="texto">
						</div>
					</div>
					

				</div> <!-- Fin row -->

				<div class="row">
					<div class="col-md-12 animated bounceInRight btns-menus text-center">
						<a class="btn btn-primary" id="buttonBuscar" onclick="doSearchTwitter()">Buscar</a>
					</div>
				</div> <!-- Fin row -->

				<div class="row">
					<div class="col-md-12 animated bounceInLeft">		
						<div class="form-group">
						  <label for="resultado">Resultado:</label>
						  <textarea class="form-control" rows="10" id="resultado"></textarea>
						</div>
					</div>
				</div>
			
			</div> <!-- Fin body -->
					
		</div> <!-- fin menu principal -->
		
	</div> <!-- fin container -->
	
</body>	
</html>