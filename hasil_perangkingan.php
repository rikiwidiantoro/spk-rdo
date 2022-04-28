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
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($alternatifs as $alternatif) {
                        // kriteria1 = manajer investasi
                        if( $alternatif['kriteria1'] == "Sucor Asset Management" || $alternatif['kriteria1'] == "Trimegah Asset Management" ) {
                            $kriteria1 = 5;
                        } else if( $alternatif['kriteria1'] == "Asset Management Sinarmas" || $alternatif['kriteria1'] == "Eastpring Investments" ) {
                            $kriteria1 = 4;
                        } else {
                            $kriteria1 = 3;
                        }

                        // kriteria2 = total AUM
                        if( $alternatif['kriteria2'] > 1 ) {
                            $kriteria2 = 5;
                        } else if( $alternatif['kriteria2'] <= 1 ) {
                            $kriteria2 = 4;
                        } else {
                            $kriteria2 = 3;
                        }

                        // kriteria3 = CAGR 1 tahun
                        if( $alternatif['kriteria3'] > 8 ) {
                            $kriteria3 = 5;
                        } else if( $alternatif['kriteria3'] >= 6.01 && $alternatif['kriteria3'] <= 8 ) {
                            $kriteria3 = 4;
                        } else if( $alternatif['kriteria3'] >= 5.01 && $alternatif['kriteria3'] <= 6 ) {
                            $kriteria3 = 3;
                        } else if( $alternatif['kriteria3'] >= 3 && $alternatif['kriteria3'] <= 5 ) {
                            $kriteria3 = 2;
                        } else if( $alternatif['kriteria3'] < 3 ) {
                            $kriteria3 = 1;
                        }

                        // kriteria4 = dropdown 1 tahun
                        if( $alternatif['kriteria4'] > 5 ) {
                            $kriteria4 = 1;
                        } else if( $alternatif['kriteria4'] >= 3.01 && $alternatif['kriteria4'] <= 5 ) {
                            $kriteria4 = 2;
                        } else if( $alternatif['kriteria4'] >= 2.01 && $alternatif['kriteria4'] <= 3 ) {
                            $kriteria4 = 3;
                        } else if( $alternatif['kriteria4'] >= 1 && $alternatif['kriteria4'] <= 2 ) {
                            $kriteria4 = 4;
                        } else if( $alternatif['kriteria4'] < 1 ) {
                            $kriteria4 = 5;
                        }

                        // kriteria5 = expense ratio
                        if( $alternatif['kriteria5'] > 2 ) {
                            $kriteria5 = 1;
                        } else if( $alternatif['kriteria5'] >= 1.51 && $alternatif['kriteria5'] <= 2 ) {
                            $kriteria5 = 2;
                        } else if( $alternatif['kriteria5'] >= 1.01 && $alternatif['kriteria5'] <= 1.5 ) {
                            $kriteria5 = 3;
                        } else if( $alternatif['kriteria5'] >= 0.5 && $alternatif['kriteria5'] <= 1 ) {
                            $kriteria5 = 4;
                        } else if( $alternatif['kriteria5'] < 0.5 ) {
                            $kriteria5 = 5;
                        }

                        // kriteria6 = minimal pembelian
                        if( $alternatif['kriteria6'] > 5000000 ) {
                            $kriteria6 = 2;
                        } else if( $alternatif['kriteria6'] >= 901000 && $alternatif['kriteria6'] <= 5000000 ) {
                            $kriteria6 = 3;
                        } else if( $alternatif['kriteria6'] >= 100000 && $alternatif['kriteria6'] <= 900000 ) {
                            $kriteria6 = 4;
                        } else if( $alternatif['kriteria6'] < 100000 ) {
                            $kriteria6 = 5;
                        }


                        echo "
                            <tr>
                                <td>". $alternatif['no_alternatif'] ."</td>
                                <td>". $alternatif['kriteria1'] ."</td>
                                <td>". $kriteria1 ."</td>
                                <td>". $kriteria2 ."</td>
                                <td>". $kriteria3 ."</td>
                                <td>". $kriteria4 ."</td>
                                <td>". $kriteria5 ."</td>
                                <td>". $kriteria6 ."</td>
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

