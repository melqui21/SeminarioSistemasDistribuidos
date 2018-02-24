<?php
	function conexionBD(){
		$servername = "127.0.0.1";
		$username = "root";
		$password = "root";
		$dbname = "twitterbd";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password,$dbname);

		// Check connection
		if (!$conn) {
   			 die("Connection failed: " . mysqli_connect_error());
		}
		
		return $conn;
	}

	function insertarInformacion($idUsuario,$usuario,$textoClave,$texto,$latitud,$longitud,$radio){
		$conn = conexionBD();
		
		$sql = "insert into twitterinfo (id_usuario,usuario,texto_clave,texto,latitud,longitud,radio) values ('$idUsuario','$usuario','$textoClave','$texto','$latitud','$longitud','$radio')";
		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}
?>