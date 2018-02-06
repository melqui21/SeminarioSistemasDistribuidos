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
	
</head>
<body style="background-color: rgb(115, 115, 115);">
	<div class="container">
		<div class="menu-principal animated zoomIn">
			<div class="panel-heading" >
				<h1 class="panel-title text-center">Seminario de Sistemas Distribuidos</h1>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-md-4 animated bounceInLeft">
						<img alt="" src="imagenes/twitter1.png">
					</div>
					
					<div class="col-md-4 animated bounceInLeft">
						<div class="form-group">
							<label for="opciones">Buscar:</label>
							<select class="form-control" name="opciones" id="opciones">
								<option>Tweets</option>
								<option>Multimedia</option>
	            			</select>
						</div>
					</div>

					<div class="col-md-4 animated bounceInLeft">
						<div class="form-group">
							<label for="texto">Texto:</label>
							<input type="text" class="form-control" name="texto" id="texto">
						</div>
					</div>

				</div> <!-- Fin row -->

				<div class="row">
					<div class="col-md-4 animated bounceInLeft">
						<label >Resultado:</label>
					</div>
				</div>
			
			</div> <!-- Fin body -->
					
		</div> <!-- fin menu principal -->
		
	</div> <!-- fin container -->
	
</body>	
</html>