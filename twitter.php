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

	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>

	<script type="text/javascript">
		$( document ).ready(function() {
    		//alert('h');
    		//lat: 20.9672259, lng: -89.6250672
    		$("#latitud").val('20.9672259');	
			$("#longitud").val('-89.6250672');
		});

		function doSearchTwitter(){
			var textoClave = $("#textoClave").val();
			var cantidad = $("#cantidad").val();
			//var tipoAccion = $("#opciones").val();
			var longitud = $("#longitud").val();
			var latitud = $("#latitud").val();
			var radio = $("#radio").val();

			$.ajax({
	   			type: "POST",
	  			 url: "twitterGetTweets.php",
	  			 data: "textoClave="+textoClave+"&cantidad="+cantidad+"&latitud="+latitud+"&longitud="+longitud+"&radio="+radio,
	   			success: function(msg){
	     			//alert(msg);
	     			$("#tableResultado").html(msg);
	     			//$("#resultado").show(5);
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
					
				<!--	<div class="col-md-3 animated bounceInLeft">
						<div class="form-group">
							<label for="opciones">Buscar:</label>
							<select class="form-control" name="opciones" id="opciones">
								<option value="tweets">Tweets</option>
								<option value="">Multimedia</option>
	            			</select>
						</div>
					</div>
				-->
					<div class="col-md-4 animated bounceInTop">
						<div class="form-group">
							<label for="texto">Texto:</label>
							<input type="text" class="form-control" name="textoClave" id="textoClave">
						</div>
					</div>

					<div class="col-md-2 animated bounceInRight">
						<div class="form-group">
							<label for="noTweets">Cantidad:</label>
							<input type="text" class="form-control" name="cantidad" id="cantidad">
						</div>
					</div>

					<div class="col-md-2 animated bounceInRight">
						<div class="form-group">
							<label for="latitud">Latitud:</label>
							<input type="text" class="form-control" name="latitud" id="latitud">
						</div>
					</div>

					<div class="col-md-2 animated bounceInRight">
						<div class="form-group">
							<label for="longitud">Longitud:</label>
							<input type="text" class="form-control" name="longitud" id="longitud">
						</div>
					</div>
					

					<div class="col-md-2 animated bounceInRight">
						<div class="form-group">
							<label for="radio">Radio:</label>
							<input type="text" class="form-control" name="radio" id="radio">
						</div>
					</div>

				</div> <!-- Fin row -->


				<div class="row">
					<div class="col-md-12 animated bounceInRight btns-menus text-center">
						<a class="btn btn-primary" id="buttonBuscar" onclick="doSearchTwitter()">Obtener</a>
					</div>
				</div> <!-- Fin row -->

				<div class="row">
					<div class="col-md-12">
						
						<div id="current">MAPA:</div>
					</div>
				</div> <!-- Fin row -->

				<div class="row">
					<div class="col-md-12">
						<div id="map"></div>
						    <script>
						      function initMap() {
						        var uluru = {lat: 20.9672259, lng: -89.6250672};
						        var map = new google.maps.Map(document.getElementById('map'), {
						          zoom: 13,
						          center: uluru
						        });
						        var marker = new google.maps.Marker({
						          position: uluru,
						          map: map,
						          draggable:true
						        });

						         google.maps.event.addListener(marker, 'dragend', function (event) {
   									document.getElementById("latitud").value = this.getPosition().lat();
    								document.getElementById("longitud").value = this.getPosition().lng();
								});

								
						      }
						     
						    </script>
						    <script async defer
						    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFIFtMRsFMdj8PJKFTrxnoCU9IzA_Fsjo&callback=initMap">
						    </script>
					</div>
				</div> <!-- Fin row -->


				<div class="row">
					<div class="col-md-12 animated bounceInLeft">		
						
						  <div id="tableResultado">
						  </div>
					</div>
				</div> <!-- Fin row -->

				
			</div> <!-- Fin body -->
					
		</div> <!-- fin menu principal -->
		
	</div> <!-- fin container -->
	
</body>	
</html>