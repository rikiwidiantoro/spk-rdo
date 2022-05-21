<?php

    // session
    session_start();

    if( !isset($_SESSION['login']) ) {
        header("Location: ../login.php");
        exit;
    }
    // session

    include_once('../koneksi.php');

    // mengambil data dari form
    if( isset($_POST['submit']) ) {
        $noKriteria = $_POST['noKriteria'];
        $namaKriteria = $_POST['namaKriteria'];
        $costBenefit = $_POST['costBenefit'];
        $bobot = $_POST['bobot'];


        // mengirim data ke database
        $tambahKriteria = mysqli_query($koneksi, "INSERT INTO `kriteria`(`id_kriteria`, `no_kriteria`, `nama_kriteria`, `cost_benefit`, `bobot_kriteria`) VALUES('', '$noKriteria', '$namaKriteria', '$costBenefit', '$bobot');");

        // alert dan re direct
        echo "<script>alert('Data Kriteria berhasil ditambahkan!'); document.location.href = '../index.php';</script>";
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Tambah Data Kriteria</title>
    </head>

    <body>

        <!-- navbar -->
        <div class="navbar-fixed">
            <nav class="grey darken-2">
                <div class="nav-wrapper container">
                    <a href="../index.php"><i class="material-icons left">keyboard_backspace</i>Kembali</a>
                    <a href="#" class="brand-logo center">SPK Reksa Dana Obligasi</a>
                </div>
            </nav>
        </div>
        <!-- navbar -->


        <!-- form -->
        <br>
        <div class="row center">
            <div class="col s4 offset-s4">
                <h4>Tambah Kriteria</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s3 center">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nomor Kriteria</td>
                            <td><input type="text" name="noKriteria" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Nama Kriteria</td>
                            <td><input type="text" name="namaKriteria" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Cost/Benefit</td>
                            <td><input type="text" name="costBenefit" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Bobot</td>
                            <td><input type="text" name="bobot" autocomplete="off"></td>
                        </tr>
                    </table>
                    <br>
                    <button class="btn grey darken-2 waves-effect waves-light" type="submit" name="submit">Tambah Data
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <!-- form -->


        <!--JavaScript at end of body for optimized loading-->
        <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>