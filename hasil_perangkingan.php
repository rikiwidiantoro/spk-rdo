<!-- koneksi -->
<?php
    include_once('koneksi.php');

    $kriterias = mysqli_query($koneksi, "SELECT * FROM kriteria");
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
        footer {
            height: 70px;
            line-height: 70px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="navbar-fixed">
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
    </div>
    <!-- navbar -->

    <!-- tombol lihat hasil -->
    <br><br>
    <div class="lihat-saw">
        <div class="container">
            <div class="row">
                <div class="col m12 center">
                    <a class="waves-effect waves-light btn-small grey darken-1 tambah-kriteria"><i class="material-icons left">keyboard_arrow_down</i>Lihat SAW</a>
                </div>
            </div>
        </div>
    </div>
    <!-- tombol lihat hasil -->

    <!-- matriks X -->
    <div class="matriksX">
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <h5>Tabel Matriks X</h5>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Manajer Investasi</th>
                                <!-- pengulangan nama kriteria dari tabel kriteria -->
                                <?php
                                    foreach($kriterias as $kriteria) {
                                        echo "
                                            <th>". $kriteria['no_kriteria'] ."</th>
                                        ";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alternatifs as $alternatif) {
                                    // kriteria1 = manajer investasi = x1
                                    if( $alternatif['kriteria1'] == "Sucor Asset Management" || $alternatif['kriteria1'] == "Trimegah Asset Management" ) {
                                        $x1 = 5;
                                    } else if( $alternatif['kriteria1'] == "Asset Management Sinarmas" || $alternatif['kriteria1'] == "Eastpring Investments" ) {
                                        $x1 = 4;
                                    } else {
                                        $x1 = 3;
                                    }
            
                                    // kriteria2 = total AUM = x2
                                    if( $alternatif['kriteria2'] > 1 ) {
                                        $x2 = 5;
                                    } else if( $alternatif['kriteria2'] <= 1 ) {
                                        $x2 = 4;
                                    } else {
                                        $x2 = 3;
                                    }
            
                                    // kriteria3 = CAGR 1 tahun = x3
                                    if( $alternatif['kriteria3'] > 8 ) {
                                        $x3 = 5;
                                    } else if( $alternatif['kriteria3'] >= 6.01 && $alternatif['kriteria3'] <= 8 ) {
                                        $x3 = 4;
                                    } else if( $alternatif['kriteria3'] >= 5.01 && $alternatif['kriteria3'] <= 6 ) {
                                        $x3 = 3;
                                    } else if( $alternatif['kriteria3'] >= 3 && $alternatif['kriteria3'] <= 5 ) {
                                        $x3 = 2;
                                    } else if( $alternatif['kriteria3'] < 3 ) {
                                        $x3 = 1;
                                    }
            
                                    // kriteria4 = dropdown 1 tahun = x4
                                    if( $alternatif['kriteria4'] > 5 ) {
                                        $x4 = 1;
                                    } else if( $alternatif['kriteria4'] >= 3.01 && $alternatif['kriteria4'] <= 5 ) {
                                        $x4 = 2;
                                    } else if( $alternatif['kriteria4'] >= 2.01 && $alternatif['kriteria4'] <= 3 ) {
                                        $x4 = 3;
                                    } else if( $alternatif['kriteria4'] >= 1 && $alternatif['kriteria4'] <= 2 ) {
                                        $x4 = 4;
                                    } else if( $alternatif['kriteria4'] < 1 ) {
                                        $x4 = 5;
                                    }
            
                                    // kriteria5 = expense ratio = x5
                                    if( $alternatif['kriteria5'] > 2 ) {
                                        $x5 = 1;
                                    } else if( $alternatif['kriteria5'] >= 1.51 && $alternatif['kriteria5'] <= 2 ) {
                                        $x5 = 2;
                                    } else if( $alternatif['kriteria5'] >= 1.01 && $alternatif['kriteria5'] <= 1.5 ) {
                                        $x5 = 3;
                                    } else if( $alternatif['kriteria5'] >= 0.5 && $alternatif['kriteria5'] <= 1 ) {
                                        $x5 = 4;
                                    } else if( $alternatif['kriteria5'] < 0.5 ) {
                                        $x5 = 5;
                                    }
            
                                    // kriteria6 = minimal pembelian = x6
                                    if( $alternatif['kriteria6'] > 5000000 ) {
                                        $x6 = 2;
                                    } else if( $alternatif['kriteria6'] >= 901000 && $alternatif['kriteria6'] <= 5000000 ) {
                                        $x6 = 3;
                                    } else if( $alternatif['kriteria6'] >= 100000 && $alternatif['kriteria6'] <= 900000 ) {
                                        $x6 = 4;
                                    } else if( $alternatif['kriteria6'] < 100000 ) {
                                        $x6 = 5;
                                    }
            
                                    // kriteria7 = lama peluncuran = x7
                                    if( $alternatif['kriteria7'] > 120 ) {
                                        $x7 = 5;
                                    } else if( $alternatif['kriteria7'] >= 91 && $alternatif['kriteria7'] <= 120 ) {
                                        $x7 = 4;
                                    } else if( $alternatif['kriteria7'] >= 61 && $alternatif['kriteria7'] <= 96 ) {
                                        $x7 = 3;
                                    } else if( $alternatif['kriteria7'] >= 24 && $alternatif['kriteria7'] <= 60 ) {
                                        $x7 = 2;
                                    } else if( $alternatif['kriteria7'] < 24 ) {
                                        $x7 = 1;
                                    }
            
            
                                    echo "
                                        <tr>
                                            <td>". $alternatif['no_alternatif'] ."</td>
                                            <td>". $alternatif['kriteria1'] ."</td>
                                            <td>". $x1 ."</td>
                                            <td>". $x2 ."</td>
                                            <td>". $x3 ."</td>
                                            <td>". $x4 ."</td>
                                            <td>". $x5 ."</td>
                                            <td>". $x6 ."</td>
                                            <td>". $x7 ."</td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- matriks X -->

    <!-- rij -->
    <br>
    <div class="rij">
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <h5>Tabel R</h5>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <!-- pengulangan nama kriteria dari tabel kriteria -->
                                <?php
                                    foreach($kriterias as $kriteria) {
                                        echo "
                                            <th>". $kriteria['no_kriteria'] ."</th>
                                        ";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alternatifs as $alternatif) {
                                    echo "
                                        <tr>
                                            <td><b>". $alternatif['no_alternatif'] ."</b></td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- rij -->

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


    <!-- footer -->
    <br><br>
    <footer class="grey darken-2 white-text center">
        <p>&copy; Riki Widiantoro</p>
    </footer>
    <!-- footer -->

    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>

