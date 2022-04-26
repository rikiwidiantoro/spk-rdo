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


    <!-- tabel kriteria -->
    <br>
    <div id="kriteria" class="kriteria">
        <div class="container">
            <div class="row">
                <div class="col m9">
                    <h5>Tabel Kriteria</h5>
                </div>
                <div class="col m3">
                    <a class="waves-effect right waves-light btn-small grey darken-1 tambah-kriteria"><i class="material-icons left">add</i>Tambah Kriteria</a>
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
                                            <a class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>create</i>Edit</a>
                                            <a class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>delete</i>Hapus</a>
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
    <br>
    <!-- tabel alternatif -->
    <div id="alternatif" class="alternatif">
        <div class="container">
            <div class="row">
                <div class="col m9">
                    <h5>Tabel Alternatif</h5>
                </div>
                <div class="col m3">
                    <a class="waves-effect right waves-light btn-small grey darken-1 tambah-alternatif"><i class="material-icons left">add</i>Tambah Alternatif</a>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <table>
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Nama Produk</th>
                                <th>Manajer Investasi</th>
                                <th>Total AUM</th>
                                <th>CAGR 1 Tahun</th>
                                <th>Dropdown 1 Tahun</th>
                                <th>Expense Ratio</th>
                                <th>Minimal Pembelian</th>
                                <th>Lama Peluncuran</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($alternatifs as $alternatif) {
                                    echo "
                                    <tr>
                                        <td class='center'>". $alternatif['no_alternatif'] ."</td>
                                        <td>". $alternatif['nama_produk'] ."</td>
                                        <td>". $alternatif['kriteria1'] ."</td>
                                        <td class='center'>". $alternatif['kriteria2']."</td>
                                        <td class='center'>". $alternatif['kriteria3']."</td>
                                        <td class='center'>". $alternatif['kriteria4']."</td>
                                        <td class='center'>". $alternatif['kriteria5']."</td>
                                        <td class='center'>". $alternatif['kriteria6']."</td>
                                        <td class='center'>". $alternatif['kriteria7']."</td>
                                        <td class='center'>
                                            <a class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>create</i>Edit</a>
                                            <a class='waves-effect waves-light btn-small grey darken-1'><i class='material-icons left'>delete</i>Hapus</a>
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
    <!-- tabel alternatif -->



    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>

