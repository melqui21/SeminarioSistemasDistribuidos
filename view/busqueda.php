<?php
require_once("../lib/links.php");
libnivel2();
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../lib/js/jquery-1.12.3.js" type="text/javascript"></script>
        <script src="../lib/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="../lib/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <script language="javascript">

            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                        results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }


            function tablaDinamica() {
                $('#listaMovimiento').DataTable({
                    //   "destroy":true,
                    "searching": true,
                    "paging": true,
                    "order": [[0, "desc"]],
                    "displayLength": 50
                });
            }
            $(document).ready(function () {
                //    $("#buttonBuscar").on('click', function () {
                //var filtrar = $("#descripcion").val();
                var pagina = getParameterByName("selectPage");
                // alert(pagina);
                // pagina = "ElUniversalOnline";
                var token = "EAACEdEose0cBAMHEZAdTxo8MWFOTDUKwSZAF1ikDhZAxmussZBZCMg1NEWwd0AwSkZCXAc6ceTd4ya5SRYIZCPazcrhZB6W5PBtm9zuVmAYXlW0so81CTpg2XcISDTwufZCm1ZBJTD1VYa0dshYVHzmEZCa9VGCBXzyhNHaOq3quZBx6x5APbu4oKbptKEEpkoZAn1WgmAzB9waFtPAZDZD";
                var fields = "fields=id,about,name,posts.limit(100)";   //"fields=id,name,posts"; //{posts},posts.limit(500){message}"
                var urlString = "https://graph.facebook.com/" + pagina + "/?access_token=" + token + "&" + fields;

                //ajax
                $.ajax({
                    async: true,
                    type: "GET",
                    dataType: "json",
                    url: urlString,
                    success: function (data) {
                        //encabezado//
                        $("#divEncabezado").html("<h2>" + data.name + "</h2><h4>" + data.about + "</h4>");
                        $("#tableBody").empty();
                        //post
                        //  $.each(data.likes.data, function (index, item) {
                        $.each(data.posts.data, function (index2, item2) {
                            //   if (item2.message.search("a")>0) {
                            $("#tableBody").append("<tr><td>" + item2.created_time.substring(0, 10) + "</td><td>" + item2.message + "</td></tr>");
                            //   }
                        });
                        //   });
                        $('#listaMovimiento').DataTable({
                            "destroy": true,
                            "searching": true,
                            "paging": true,
                            //                         "order": [[0, "desc"]],
                            "displayLength": 50,
                            ////////// ////////// ////////// ////////// ////////// 
                            "columnDefs": [{"visible": true, "targets": 0}],
                            "order": [[0, 'asc']],
                            "drawCallback": function (settings) {
                                var api = this.api();
                                var rows = api.rows({page: 'current'}).nodes();
                                var last = null;

                                api.column(0, {page: 'current'}).data().each(function (group, i) {
                                    if (last !== group) {
                                        $(rows).eq(i).before(
                                                '<tr class="group"><td colspan="2">' + group + '</td></tr>'
                                                );

                                        last = group;
                                    }
                                });
                            }
                        });

                        // Order by the grouping
                        $('#tbody').on('click', 'tr.group', function () {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([0, 'desc']).draw();
                            } else {
                                table.order([0, 'asc']).draw();
                            }
                        });

                        //    $("#divNext").html("<a href='"+ data.posts.paging.previous +"'> next </a>");


                        /*
                         $("#tableBody").append("<tr><td>" + data.name + "</td>" +
                         "<td>" + data.username + "</td><td>" + data.about + "</td><td>" + data.likes + "</td><td>" + data.message + "</td></tr>")
                         */
                        console.log(data);

                    },
                    error: function () {
                        console.log("Error");
                    }
                });


            });
            //  });


        </script>
        <style type="text/css">
<?php //include("../lib/header.php");                         ?>
        </style>
    </head>
    <body>
        <?php encabezado3("API DE FACEBOOK"); ?>
        <?php //estilo(); ?>

    <center>
        <div id="divNext"></div>
        <div class="row">
            <div id="divEncabezado"></div>      
            <div id="listas" class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
                    <table id="listaMovimiento" class="display" cellspacing="0" width="90%">
                        <thead>
                            <tr>
                                <th>Fecha-Hora</th>
                                <th>message</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Fecha-Hora</th>
                                <th>message:</th>
                            </tr>
                        </tfoot>
                        <tbody id="tableBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <p>&nbsp;</p>

            <?php
            pie3();
            ?>
        </div>
    </center>	
</body>
</html>