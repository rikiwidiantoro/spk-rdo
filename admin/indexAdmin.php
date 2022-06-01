<?php

    // session
    session_start();

    if( !isset($_SESSION['login']) ) {
        header("Location: ../index.php");
        exit;
    }
    // session

    // koneksi
    include_once('../koneksi.php');

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
    <title>Dasboard</title>

    <!-- css sendiri -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <style>
        .kriteria .tambah-kriteria {
            margin-top: 20px;
        }
        .alternatif .tambah-alternatif {
            margin-top: 20px;
        }
        .kriteria table thead th, .alternatif table th {
            text-align: center;
        }
        .kriteria table tbody a, .alternatif table tbody a, .kriteria .tambah-kriteria, .alternatif .tambah-alternatif {
            font-size: 11px;
        }
        .con {
            padding: 2% 4%;
        }
        .pesan-update {
            font-style: italic;
            font-size: 13px;
        }
        footer {
            margin-top: 20px;
            padding: 20px 80px;
        }
        .footer-copyright {
            padding: 10px 85px;
            text-align: center;
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
                    <li><a href="indexAdmin.php">dasboard</a></li>
                    <li><a href="hasilRangkingAdmin.php">hasil perangkingan</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- navbar -->


    <!-- welcome -->
    <br>
    <div class="row container">
        <div class="col">
            <h4>Selamat Datang, Admin!</h3>
            <hr>
        </div>
    </div>
    <!-- welcome -->


    <!-- tabel kriteria -->
    <br>
    <div id="kriteria" class="kriteria">
        <div class="container">
            <div class="row">
                <div class="col m9">
                    <h5>Tabel Kriteria</h5>
                </div>
                <div class="col m3">
                    <a href="crud/tambahKriteria.php" class="waves-effect right waves-light btn-small grey darken-1 tambah-kriteria"><i class="material-icons left">add</i>Tambah Kriteria</a>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
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
                            <?php
                                foreach($kriterias as $kriteria) {
                                    echo "
                                    <tr>
                                        <td class='center'>". $kriteria['no_kriteria'] ."</td>
                                        <td>". $kriteria['nama_kriteria'] ."</td>
                                        <td class='center'>". $kriteria['cost_benefit'] ."</td>
                                        <td class='center'>". $kriteria['bobot_kriteria']."</td>
                                        <td class='center'>
                                            <a href='crud/editKriteria.php?id=".$kriteria['id_kriteria']."' class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>create</i>Edit</a>
                                            <a href='crud/hapusKriteria.php?id=".$kriteria['id_kriteria']."' class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>delete</i>Hapus</a>
                                        </td>
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
    <br>
    <!-- tabel kriteria -->

    <hr>
    <!-- tabel alternatif -->
    <div id="alternatif" class="alternatif">
        <div class="con">
            <div class="row">
                <div class="col m9">
                    <h5>Tabel Alternatif</h5>
                </div>
                <div class="col m3">
                    <a href="crud/tambahAlternatif.php" class="waves-effect right waves-light btn-small grey darken-1 tambah-alternatif"><i class="material-icons left">add</i>Tambah Alternatif</a>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Nama Produk</th>
                                <!-- pengulangan nama kriteria dari tabel kriteria -->
                                <?php
                                    foreach($kriterias as $kriteria) {
                                        echo "
                                            <th>". $kriteria['nama_kriteria'] ."</th>
                                        ";
                                    }
                                ?>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alternatifs as $alternatif) {
                                    echo "
                                    <tr>
                                        <td class='center'>". $alternatif['no_alternatif'] ."</td>
                                        <td style='width:300px;'>". $alternatif['nama_produk'] ."</td>
                                        <td style='width:250px;'>". $alternatif['kriteria1'] ."</td>
                                        <td class='center'>". $alternatif['kriteria2']." T</td>
                                        <td class='center'>+". $alternatif['kriteria3']."%</td>
                                        <td class='center'>-". $alternatif['kriteria4']."%</td>
                                        <td class='center'>". $alternatif['kriteria5']."%</td>
                                        <td class='right'>Rp ". $alternatif['kriteria6']."</td>
                                        <td class='center'>". round($alternatif['kriteria7'] / 12, 2) ." Tahun</td>
                                        <td class='center'>
                                            <a href='crud/editAlternatif.php?id=".$alternatif['id_alternatif']."' class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>create</i>Edit</a>
                                            <a href='crud/hapusAlternatif.php?id=".$alternatif['id_alternatif']."' class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>delete</i>Hapus</a>
                                        </td>
                                    </tr>
                                    
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <span class="pesan-update">*Data diperbaharui terakhir tanggal 20 Mei 2022</span>
        </div>
    </div>
    <!-- tabel alternatif -->


    <!-- footer -->
    <footer class="grey darken-2 white-text">
        <div class="row">
            <div class="col s8">
                <h6>Riki Widiantoro | Teknik Informatika</h6>
                <p>Website Sistem Pendukung Keputusan Rekomendasi Produk Reksa Dana Obligasi Terbaik dengan Metode Simple Additive Weighting (SAW)</p>
                <!-- <h6>&copy; 2022 | SKRIPSI</h6> -->
            </div>
            <div class="col s2 offset-s1">
                <h6>Kontak Developer :</h6>
                <div class="sosmed">
                    <p>
                        <a href="mailto:rikitoro12@gmail.com?subject=subject text" target="_blank" class="white-text"><i class="fa fa-envelope"></i> rikitoro12@gmail.com</a>
                    </p>
                    <p>
                        <a href="https://github.com/rikiwidiantoro" target="_blank" class="white-text"><i class="fab fa-github"></i> rikiwidiantoro </a>
                    </p>
                    <p>
                        <a href="https://rikiwidiantoro.github.io/" target="_blank" class="white-text"><i class="fas fa-blog"></i> rikiwidiantoro.github.io</a>
                    </p>
                </div>
                
            </div>
        </div>
    </footer>
    <div class="footer-copyright grey darken-1 white-text">
        &copy; 2022 | SKRIPSI
    </div>
    <!-- footer -->


    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>

