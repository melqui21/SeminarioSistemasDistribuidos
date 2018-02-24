<?php
require_once("../lib/links.php");
libnivel2();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>BUSQUEDAS EN PAGINAS DE FACEBOOK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php encabezado3("API DE FACEBOOK"); ?>
        <?php //estilo(); ?>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            <form  class="radio" action="busqueda.php" method="GET">
                <label for="idSelectPage">Selecciona una página de Facebook<em>(obligatorio)*</em></label>
                <select name="selectPage" id="selectPage" class="form-control">
                    <option value="NoAlBullying">No al Bullying</option>
                    <option value="noalacosostopbullying"> No al Acoso Escolar</option>
                 <!--   <option value="reforma">El Reforma</option>
                    <option value="ElUniversalOnline">El Universal</option>
                    <option value="DiariodeYucatan">Diario de Yucatan</option>
                    <option value="ProgresoHoy">Progreso Hoy</option>
                    <option value="YucatanVivelo">Yucatán Vivelo</option>           -->
                    <option value="DenunciaBullyng">Denuncia el acoso y al Bullyng</option>
                    <option value="Cbtis80">Bullying CBTIS 80</option>
                    <option value="gabyoscarsadai">El bullyng</option>
                    <option value="elbullyngenlasescuelas">Bullyng en las escuelas</option>
                    <option value="Bullyng-1137033526403700">DON´T BULLY BE A FRIEND</option>
                    <option value="BastadeViolenciacontralosNinos">Stop Violencia</option>                   
                </select>
         <!--       <label for="inputFiltro">Filtrar: <em>opcional</em></label>
                <input class="form-control" type="text" id="inputFiltro" name="inputFiltro" /> -->
         <button type="submit" class="form-control">Cargar Resultados</button>
            </form>
            </div>
        </div>
        <div class="row">
            <?php
            pie3();
            ?>
        </div>
    </body>
</html>


<!--  test

https://graph.facebook.com/CocaColaMx/?access_token=EAAH9zT7UZCT0BAIA9LPzVfBaZA7pl5jvg04OYVNP0dc3JzDZBwguuySnKxusFCeXxIDmm03DrfhJ9ookl0KVnNkus2LTHoTT4MJ5iXj96iRTscxcUZCZAFbFoufmnDLbLWHFohaHGyZBdvBYkkwR6R5gJOVwZADoTHKUxnHzVKkXDPdR0ZAX19EMDj5JadhQ7JkH7kDVrfG7SgZDZD&fields=id,name,about,likes{posts}

-->