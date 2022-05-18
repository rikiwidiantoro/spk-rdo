<?php
    error_reporting(0);
    session_start();

    // session
    session_start();

    if( isset($_SESSION['login']) ) {
        header("Location: index.php");
        exit;
    }
    // session

    include_once('koneksi.php');

    if( isset($_POST['login']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row['password']) ) {

                // cek session
                $_SESSION['login'] = true;

                header("Location: index.php");
                exit;
            }
        }
    }

    $pass = password_hash('admin1234', PASSWORD_DEFAULT);

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
        <title>Masuk</title>
        <style>
            .container {
                /* border: 1px solid black; */
                margin-top: 110px;
                padding-bottom: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 5px black;
            }
            h5 {
                font-size: 19px;
                margin-top: 17px;
            }
        </style>
    </head>

    <body>

        <div class="container grey lighten-2">
            <div class="row">
                <div class="col m8 offset-m2">
                    <h3 class="center">SPK Reksa Dana Obligasi</h3>
                    <br>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col s2 offset-s1">
                                <h5 for="username">Username : </h5>
                            </div>
                            <div class="col s8">
                                <input id="text" type="text" name="username">
                            </div>
                            <!-- <div class="input-field col s8">
                                <input id="text" type="text" class="validate">
                                <label for="text">Username</label>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col s2 offset-s1">
                                <h5 for="password">Password : </h5>
                            </div>
                            <div class="col s8">
                                <input id="password" type="password" name="password">
                            </div>
                            <!-- <div class="input-field col s12">
                                <input id="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div> -->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col s3 offset-s5">
                                <button class="btn grey darken-2 waves-effect waves-light" type="submit" name="login">login
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col m4 offset-m2">
                    <p>username admin : admin</p>
                    <p>username : rikiwidiantoro</p>
                </div>
                <div class="col m4">
                    <p>password admin : admin1234</p>
                    <p>password : rikiwidiantoro</p>
                </div>
            </div>
        </div>


        <!--JavaScript at end of body for optimized loading-->
        <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>