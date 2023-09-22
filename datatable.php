<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">

    <title>DataTables</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<?php

error_reporting(E_ALL & ~E_WARNING);
include "const.php";
include "connexiondb.php";
include "fetchdb-1.php";

//var_dump($myJSON);
?>

<body id="page-body">

    <section id="section-1">

        <div class="">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="test" width="100%">
            
                    </table>
                    <table class="table table-striped" id="test2" width="100%">
            
                    </table>
                </div>
            </div>
        </div>

    </div>

    </section>

    <script>
        var table;
        $(document).ready(function() {
            table = $('#test').DataTable( {
                ajax: 'myJSON.php',
                "columns": [
                    { 
                        "data": "nom",
                        "title": "Nom",
                        "width": "20%"
                    },
                    { 
                        "data": "prenom",
                        "title": "Prénom",
                        "width": "20%"
                    },
                    { 
                        "data": "age",
                        "title": "Age",
                        "width": "20%"
                    },
                    { 
                        "data": "date1",
                        "title": "Date d'Arrivé",
                        "width": "20%",
                        render: DataTable.render.datetime("DD/MM/YYYY")
                    },
                    { 
                        "data": "salaire",
                        "title": "Salaire",
                        "width": "20%"
                    },
                    { 
                        "data": null,
                        "title": "Suppression",
                        "width": "20%",
                        render: function ( data, type, row ) {
                            return '<button class="deletebtn btn btn-primary">Suppr</button>'
                        }
                    },
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
                
            } );
            $('#test tbody').on( 'click', '.deletebtn', function () {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer cette ligne ?',
                    showDenyButton: true,
                    confirmButtonText: 'Supprimer',
                    denyButtonText: `Annuler`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('La ligne a été suprimée !', '', 'success')
                        var row = table.row( $(this).parents('tr') );
                        row.data();
                        console.log(row);   console.log(row.data());
                        $.post("supprdb.php", 
                        {'data' : row.data()},
                        function(data) {
                            console.log(data);
                        });
                        row.remove()
                        .draw();
                }   else if (result.isDenied) {
                        Swal.fire("La ligne n'a pas été supprimée", '', 'info')
                }
                })

                    
                

                
                        
            });

            
        } );

    </script>

<?php
//include("supprdb.php");
?>
</body>

</html>