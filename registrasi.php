<?php

    include_once('koneksi.php');

    // if( isset($_POST['submit']) ) {
    //     // mengambil data dari form
    //     $nama = $_POST['nama'];
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $konfirmasiPassword = $_POST['konfirmasiPassword'];
    //     echo $nama. '<br>';
    //     echo $username. '<br>';
    //     echo $password. '<br>';
    //     echo $konfirmasiPassword. '<br>';

    // }

    
    function registrasi($data) {
        global $koneksi;
        // Fungsi stripslashes pada php adalah untuk menghapus atau menghilangkan karakter backslashes tanda garis miring terbalik ("\") menggunakan stripslashes() sehingga tidak mengganggu query mysql yang dikirim.
        $nama = strtolower(stripslashes($data['nama']));
        $username = strtolower(stripslashes($data['username']));
        // fungsi mysqli_real_escape_string untuk memberi backslash di beberapa kode untuk ditampilkan pada halaman, namun saat menyimpan menuju sql, kode akan tetap normal tanpa ada backslash.
        // atau memungkinkan user memasukkan password ada tanda kutip nya
        $password = mysqli_real_escape_string($koneksi, $data['password']);
        $konfirmasiPassword = mysqli_real_escape_string($koneksi, $data['konfirmasiPassword']);

        // cek username sudah ada atau belum
        $dataLogin = mysqli_query($koneksi, "SELECT username FROM login WHERE username = '$username'");
        if(mysqli_fetch_assoc($dataLogin)) {
            echo "
                <script>
                    alert('username sudah terdaftar sebelumnya!');
                </script>
            ";
            return false;
        }

        // cek konfirmasi password
        if($password !== $konfirmasiPassword) {
            echo "
                <script>
                    alert('konfirmasi password tidak sesuai!');
                </script>
            ";
            return false;
        }

        // enkripsi password
        $password = password_hash($konfirmasiPassword, PASSWORD_DEFAULT);

        // menambahkan user baru ke database
        mysqli_query($koneksi, "INSERT INTO login VALUES('', '$nama', '$username', '$password')");

        return mysqli_affected_rows($koneksi);

    }

    if( isset($_POST['registrasi']) ) {
        if( registrasi($_POST) > 0 ) {
            echo "
                <script>
                    alert('Akun Anda berhasil didaftarkan!');
                </script>
            ";
        } else {
            mysqli_error($koneksi);
        }
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
        <title>Registrasi Pengunjung</title>

        <style>
            td input {
                margin-right: 100px !important;
            }
        </style>
    </head>

    <body>

        <!-- navbar -->
        <div class="navbar-fixed">
            <nav class="grey darken-2">
                <div class="nav-wrapper container">
                    <a href="index.php"><i class="material-icons left">keyboard_backspace</i>Kembali</a>
                    <a href="#" class="brand-logo center">SPK Reksa Dana Obligasi</a>
                </div>
            </nav>
        </div>
        <!-- navbar -->


        <!-- form -->
        <br>
        <div class="row center">
            <div class="col s4 offset-s4">
                <h5>Masukan data diri Anda dibawah!</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s3 center">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><input type="text" name="nama" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Konfirmasi Password</td>
                            <td><input type="password" name="konfirmasiPassword" autocomplete="off"></td>
                        </tr>
                    </table>
                    <br>
                    <button class="btn grey darken-2 waves-effect waves-light" type="submit" name="registrasi">Daftar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <!-- form -->
        <br><br>


        <!--JavaScript at end of body for optimized loading-->
        <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>