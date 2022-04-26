<!-- koneksi -->
<?php
    include_once('koneksi.php');
    $alternatifs = mysqli_query($koneksi, "SELECT * FROM alternatif");

?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- css sendiri -->
    <style>
        .kriteria .tambah-kriteria {
            margin-top: 20px;
        }
        .kriteria table thead th {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="grey darken-2">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">SPK Reksa Dana Obligasi</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">dasboard</a></li>
                <li><a href="hasil_perangkingan.php">hasil perangkingan</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar -->

    <!-- tombol lihat hasil -->
    <br><br>
    <div class="lihat-hasil">
        <div class="container">
            <div class="row">
                <div class="col m12 center">
                    <a class="waves-effect waves-light btn-small grey darken-1 tambah-kriteria"><i class="material-icons left">keyboard_arrow_down</i>Lihat Hasil</a>
                </div>
            </div>
        </div>
    </div>
    <!-- tombol lihat hasil -->

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>Manajer Investasi</th>
                    <th>Manajer Investasi</th>
                    <th>Total AUM</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($alternatifs as $alternatif) {
                        // kriteria1
                        if( $alternatif['kriteria1'] == "Sucor Asset Management" || $alternatif['kriteria1'] == "Trimegah Asset Management" ) {
                            $kriteria1 = 5;
                        } else if( $alternatif['kriteria1'] == "Asset Management Sinarmas" || $alternatif['kriteria1'] == "Eastpring Investments" ) {
                            $kriteria1 = 4;
                        } else {
                            $kriteria1 = 3;
                        }

                        // kriteria2
                        if( $alternatif['kriteria2'] > 1 ) {
                            $kriteria2 = 5;
                        } else if( $alternatif['kriteria2'] <= 1 ) {
                            $kriteria2 = 4;
                        } else {
                            $kriteria2 = 3;
                        }
                        echo "
                            <tr>
                                <td>". $alternatif['no_alternatif'] ."</td>
                                <td>". $alternatif['kriteria1'] ."</td>
                                <td>". $kriteriaA1 = $kriteria1 ."</td>
                                <td>". $kriteria2 ."</td>
                            </tr>
                        ";
                        echo "<br>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            foreach($alternatifs as $alternatif) {
                // echo $alternatif['no_alternatif'];
                // echo " = ";
                // echo $alternatif['kriteria1'];
                // echo " = ";


                // kriteria1
                if( $alternatif['kriteria1'] == "Sucor Asset Management" || $alternatif['kriteria1'] == "Trimegah Asset Management" ) {
                    $kriteria1 = 5;
                } else if( $alternatif['kriteria1'] == "Asset Management Sinarmas" || $alternatif['kriteria1'] == "Eastpring Investments" ) {
                    $kriteria1 = 4;
                } else {
                    $kriteria1 = 3;
                }

                // kriteria2
                // if( $alternatif['kriteria1'] == "Sucor Asset Management" || $alternatif['kriteria1'] == "Trimegah Asset Management" ) {
                //     $kriteria1 = 5;
                // } else if( $alternatif['kriteria1'] == "Asset Management Sinarmas" || $alternatif['kriteria1'] == "Eastpring Investments" ) {
                //     $kriteria1 = 4;
                // } else {
                //     $kriteria1 = 3;
                // }
                

                // echo "[" . $kriteriaA1 = $kriteria1 . "]";
                // echo " = ";
                // echo $alternatif['kriteria2'];

                // echo "<br>";
                
                // tabel
                // echo "
                //     <table>
                //         <thead>
                //             <tr>
                //                 <th>Alternatif</th>
                //                 <th>Manajer Investasi</th>
                //                 <th>Manajer Investasi</th>
                //                 <th>Total AUM</th>
                //             </tr>
                //         </thead>
                //         <tbody>
                //             <tr>
                //                 <td>". $alternatif['no_alternatif'] ."</td>
                //                 <td>". $alternatif['kriteria1'] ."</td>
                //                 <td>". $kriteriaA1 = $kriteria1 ."</td>
                //                 <td>". $alternatif['kriteria2'] ."</td>
                //             </tr>
                //         </tbody>
                //     </table>
                // ";
            }

            
            
        ?>
    </div>



    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>

