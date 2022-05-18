<!-- koneksi -->
<?php

    // session
    session_start();

    if( !isset($_SESSION['login']) ) {
        header("Location: login.php");
        exit;
    }
    // session

    include_once('koneksi.php');

    $kriterias = mysqli_query($koneksi, "SELECT * FROM kriteria");
    $alternatifs = mysqli_query($koneksi, "SELECT * FROM alternatif");
    $converts = mysqli_query($koneksi, "SELECT * FROM convert_alternatif");
    $convertss = mysqli_query($koneksi, "SELECT * FROM convert_alternatif");
    $convertsss = mysqli_query($koneksi, "SELECT * FROM convert_alternatif");

    // $bobot = mysqli_query($koneksi, "SELECT bobot_kriteria FROM kriteria");
    // $bb = mysqli_fetch_array($bobot);
    $bobot = [20,20,15,10,10,10,15];

    $nMax = mysqli_query($koneksi, "SELECT max(kriteria1) as maxK1, max(kriteria2) as maxK2, max(kriteria3) as maxK3, max(kriteria7) as maxK7 FROM convert_alternatif");
    $nMin = mysqli_query($koneksi, "SELECT min(kriteria4) as minK4, min(kriteria5) as minK5, min(kriteria6) as minK6 FROM convert_alternatif");
    $max = mysqli_fetch_array($nMax);
    $min = mysqli_fetch_array($nMin);

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
                    <li><a href="hasil_perangkingan_while.php">hasil while</a></li>
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
                    <h5>Tabel Matriks X pakai while</h5>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <!-- <th>Alternatif</th>
                                <th>Manajer Investasi</th> -->
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
                                while ($data = mysqli_fetch_array($converts)) {

                                    echo "
                                        <tr>
                                            <td>".$data['kriteria1']."</td>
                                            <td>".$data['kriteria2']."</td>
                                            <td>".$data['kriteria3']."</td>
                                            <td>".$data['kriteria4']."</td>
                                            <td>".$data['kriteria5']."</td>
                                            <td>".$data['kriteria6']."</td>
                                            <td>".$data['kriteria7']."</td>
                                            
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
                    <h5>Tabel R pakai while</h5>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <!-- <th></th> -->
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
                                while ($data2 = mysqli_fetch_array($convertss)) {

                                    echo "
                                        <tr>
                                            <td>".round($data2['kriteria1'] / $max['maxK1'],2)."</td>
                                            <td>".round($data2['kriteria2'] / $max['maxK2'],2)."</td>
                                            <td>".round($data2['kriteria3'] / $max['maxK3'],2)."</td>
                                            <td>".round($min['minK4'] / $data2['kriteria4'],2)."</td>
                                            <td>".round($min['minK5'] / $data2['kriteria5'],2)."</td>
                                            <td>".round($min['minK6'] / $data2['kriteria6'],2)."</td>
                                            <td>".round($data2['kriteria7'] / $max['maxK7'],2)."</td>
                                            
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
    <!-- rij -->
    <br>
    <div class="rij">
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <h5>Tabel V pakai while</h5>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <!-- pengulangan nama kriteria dari tabel kriteria -->
                                <th>Nilai Preferensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($data3 = mysqli_fetch_array($convertsss)) {

                                    $point = round(
                                        (($data3['kriteria1'] / $max['maxK1']) * $bobot[0]) +
                                        (($data3['kriteria2'] / $max['maxK2']) * $bobot[1]) +
                                        (($data3['kriteria3'] / $max['maxK3']) * $bobot[2]) +
                                        (($min['minK4'] / $data3['kriteria4']) * $bobot[3]) +
                                        (($min['minK5'] / $data3['kriteria5']) * $bobot[4]) +
                                        (($min['minK6'] / $data3['kriteria6']) * $bobot[5]) +
                                        (($data3['kriteria7'] / $max['maxK7']) * $bobot[6])
                                    ,2);

                                    echo "
                                        <tr>
                                            <td>".$point."</td>
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

