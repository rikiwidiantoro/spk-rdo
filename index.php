<?php
    // session
    session_start();

    if( isset($_SESSION['login']) ) {
        $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);

            if( $row['username'] === 'admin' ) {
                $_SESSION['login'] = true;
                header('Location: admin/indexAdmin.php');
                exit;
            } else {
                $_SESSION['login'] = true;
                header('Location: user/index.php');
                exit;
            }
        }
    }
    // session

    include_once('koneksi.php');

    if( isset($_POST['login']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);

            if( password_verify($password, $row['password']) ) {
                if( $row['username'] == 'admin' ) {
                    $_SESSION['login'] = true;
                    header('Location: admin/indexAdmin.php');
                    exit;
                } 
                else {
                    $_SESSION['login'] = true;
                    header('Location: user/index.php');
                    exit;
                }
                

            } else {
                echo "<script>alert('username atau password yang Anda masukkan salah!')</script>";
            }

            // $namas = $row['username'];
            // function nama($nama) {
            //     return $nama;
            // }

            // $namaUser = nama($namas);
            


            // if( password_verify($password, $row['password']) ) {

            //     // cek session
            //     $_SESSION['login'] = true;

            //     header("Location: index.php");
            //     exit;
            // } else {
            //     echo "<script>alert('username atau password yang Anda masukkan salah!')</script>";
            // }
        }
    }
    // echo $namaUser;


    $pass = password_hash('admin1234', PASSWORD_DEFAULT);
    $passss = password_hash('rikiwidiantoro', PASSWORD_DEFAULT);

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
        <title>Masuk Admin</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <style>
            /* .container {
                margin-top: 80px;
                padding-bottom: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 5px black;
            } */
            h5 {
                font-size: 30px;
                margin-top: 40px;
                margin-bottom: 0px;
                font-weight: 600;
            }
            .registrasi {
                margin: -20px 0px 16px;
            }
            .registrasi a {
                font-weight: 500;
            }
            footer {
                margin-top: -8px;
                padding: 10px 100px;
            }
            .footer-copyright {
                margin-top: -10px;
                padding: 10px 85px;
                text-align: center;
            }
            footer a:hover, .isi a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body class="grey lighten-5">

        <!-- navbar -->
        <div class="navbar-fixed">
            <nav class="grey lighten-4">
                <div class="nav-wrapper container">
                    <a href="#" class="brand-logo black-text">SPK Reksa Dana Obligasi</a>
                    <!-- <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="indexAdmin.php">dasboard</a></li>
                        <li><a href="hasilRangkingAdmin.php">hasil perangkingan</a></li>
                        <li><a href="dataHistoryAdmin.php">data history</a></li>
                        <li><a href="dataPengunjung.php">data pengunjung</a></li>
                        <li><a href="../logout.php">Logout</a></li>
                    </ul> -->
                </div>
            </nav>
        </div>
        <!-- navbar -->
        <!-- <div class="container grey lighten-2"> -->
            <!-- <div class="row">
                <div class="col m8 offset-m2">
                    <h3 class="center">SPK Reksa Dana Obligasi</h3>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col s2 offset-s1">
                                <h5 for="username">Username : </h5>
                            </div>
                            <div class="col s8">
                                <input id="text" type="text" name="username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s2 offset-s1">
                                <h5 for="password">Password : </h5>
                            </div>
                            <div class="col s8">
                                <input id="password" type="password" name="password">
                            </div>
                        </div>
                        <div class="row center">
                            <div class="col s12">
                                <button class="btn grey darken-2 waves-effect waves-light" type="submit" name="login">login
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col m12 s12 center">
                    <p>Belum punya Akun? Klik <a href="registrasi.php">Daftar</a></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col m3 offset-m2">
                    <p>username : admin</p>
                    <p>username : rikiwidiantoro</p>
                </div>
                <div class="col m3 offset-m2">
                    <p>password : admin1234</p>
                    <p>password : rikiwidiantoro</p>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col m10 offset-m1">
                    <a href="index.php" class="btn grey darken-2 waves-effect waves-light btn-small"><i class="material-icons left">keyboard_backspace</i>Kembali</a>
                </div>
            </div> -->
        <!-- </div> -->

        <div class="container isi">
            <div class="row">
                <div class="col s8 offset-s2">
                    <h5>Login</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s8 offset-s2">
                    <form action="" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="username" type="text" name="username">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="col s12">
                                <button class="btn grey darken-2 waves-effect waves-light" type="submit" name="login">login
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row registrasi">
                <div class="col m12 s12 center">
                    <p>Belum punya Akun? Klik <a href="registrasi.php" class="teal-text text-lighten-1">Daftar</a></p>
                </div>
            </div>
        </div>

        <!-- footer -->
        <hr>
        <footer class="grey lighten-4 black-text">
            <div class="row">
                <div class="col s7 offset-s1">
                    <h6>Riki Widiantoro | Teknik Informatika</h6>
                    <p>Website Sistem Pendukung Keputusan Rekomendasi Produk Reksa Dana Obligasi Terbaik dengan Metode Simple Additive Weighting (SAW)</p>
                    <!-- <h6>&copy; 2022 | SKRIPSI</h6> -->
                </div>
                <div class="col s2 offset-s1">
                    <h6>Kontak Developer :</h6>
                    <div class="sosmed">
                        <p>
                            <a href="mailto:rikitoro12@gmail.com?subject=subject text" target="_blank" class="black-text"><i class="fa fa-envelope"></i> rikitoro12@gmail.com</a>
                        </p>
                        <p>
                            <a href="https://github.com/rikiwidiantoro" target="_blank" class="black-text"><i class="fab fa-github"></i> rikiwidiantoro </a>
                        </p>
                        <p>
                            <a href="https://rikiwidiantoro.github.io/" target="_blank" class="black-text"><i class="fas fa-blog"></i> rikiwidiantoro.github.io</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-copyright grey lighten-3 black-text">
            &copy; 2022 | SKRIPSI
        </div>
        <!-- footer -->

        <!--JavaScript at end of body for optimized loading-->
        <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>