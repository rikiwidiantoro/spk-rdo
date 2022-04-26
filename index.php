<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <!-- navbar -->
    <nav class="grey darken-2">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">SPK Reksa Dana Obligasi</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">dasboard</a></li>
                <li><a href="">hasil perangkingan</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar -->


    <!-- tabel kriteria -->
    <br><br>
    <div id="kriteria">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Tabel Kriteria</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <table id="table_kriteria" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Cost/Benefit</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C1</td>
                            <td>Manajer Investasi</td>
                            <td>Benefit</td>
                            <td>0.2</td>
                        </tr>
                        <tr>
                            <td>C2</td>
                            <td>Total AUM</td>
                            <td>Benefit</td>
                            <td>0.2</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- tabel kriteria -->




    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- data table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#table_kriteria').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     false
            } );
        } );
    </script>

</body>
</html>

