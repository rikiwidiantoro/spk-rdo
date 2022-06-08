<?php
    // koneksi
    include_once('../koneksi.php');

    $dataUsers = mysqli_query($koneksi, "SELECT * FROM login");

    // menghilangkan pesan error
    error_reporting(0);
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
    <title>Data History</title>

    <!-- css sendiri -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <style>
        footer {
            margin-top: 20px;
            padding: 20px 100px;
        }
        .footer-copyright {
            padding: 10px 85px;
            text-align: center;
        }
        footer a:hover {
            text-decoration: underline;
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
                    <li><a href="dataHistoryAdmin.php">data history</a></li>
                    <li><a href="dataPengunjung.php">data pengunjung</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- navbar -->


    <!-- welcome -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- <h4>Selamat Datang, <?php 
                    // foreach($ucapan as $nama) {
                    //     echo $nama['nama'];
                    // }
                ?>!</h3> -->
                <h4>Data Pengunjung</h4>
                <hr>
            </div>
        </div>
    </div>
    
    <!-- welcome -->


    <!-- data pengunjung -->
    <div class="data-pengunjung">
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <table>
                        <thead>
                            <th class="center">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($dataUsers as $user) {
                                    if($user['username'] !== 'admin') {
                                        $no++;
                                        echo "
                                            <tr>
                                                <td class='center'>". $no ."</td>
                                                <td>". $user['nama'] ."</td>
                                                <td>". $user['username'] ."</td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- data pengunjung -->



    <!-- footer -->
    <footer class="grey darken-2 white-text">
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
    <div class="footer-copyright grey darken-3 white-text">
        &copy; 2022 | SKRIPSI
    </div>
    <!-- footer -->


    <!--JavaScript at end of body for optimized loading-->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('.mei').css('display', 'none');
            // $('.data-mei').click(function() {
            //     $('.mei').fadeToggle(2000);
            // });
            // console.log('ok');
        });
    </script>

</body>
</html>